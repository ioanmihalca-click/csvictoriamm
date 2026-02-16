<?php

namespace App\Console\Commands;

use App\Models\Competition;
use App\Models\Gallery;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class MigrateCloudinaryImages extends Command
{
    protected $signature = 'app:migrate-cloudinary-images';

    protected $description = 'Migrate all Cloudinary images to local storage';

    public function handle(): int
    {
        $this->info('Starting Cloudinary image migration...');

        $failed = [];

        // Migrate gallery images
        $galleries = Gallery::where('photo_url', 'like', '%cloudinary%')->get();
        $this->info("Found {$galleries->count()} gallery images to migrate.");

        if ($galleries->isNotEmpty()) {
            $bar = $this->output->createProgressBar($galleries->count());
            $bar->start();

            foreach ($galleries as $gallery) {
                $result = $this->downloadAndStore($gallery->photo_url, 'gallery');

                if ($result) {
                    $gallery->updateQuietly(['photo_url' => $result]);
                } else {
                    $failed[] = "Gallery #{$gallery->id}: {$gallery->photo_url}";
                }

                $bar->advance();
            }

            $bar->finish();
            $this->newLine();
        }

        // Migrate competition images
        $competitions = Competition::whereRaw("LOWER(image_url) LIKE '%cloudinary%'")->get();
        $this->info("Found {$competitions->count()} competition images to migrate.");

        if ($competitions->isNotEmpty()) {
            $bar = $this->output->createProgressBar($competitions->count());
            $bar->start();

            foreach ($competitions as $competition) {
                $rawImageUrl = $competition->getRawOriginal('image_url');
                $result = $this->downloadAndStore($rawImageUrl, 'competition-images');

                if ($result) {
                    $competition->updateQuietly(['image_url' => $result]);
                } else {
                    $failed[] = "Competition #{$competition->id}: {$rawImageUrl}";
                }

                $bar->advance();
            }

            $bar->finish();
            $this->newLine();
        }

        // Migrate hardcoded site images
        $siteImages = [
            [
                'url' => 'https://res.cloudinary.com/dadjiwkkf/image/upload/v1727107335/antrenamente_bcsnj1.jpg',
                'filename' => 'antrenamente.jpg',
            ],
            [
                'url' => 'https://res.cloudinary.com/dadjiwkkf/image/upload/v1726502392/fzevluuvlbkfdgia7epy.jpg',
                'filename' => 'contact.jpg',
            ],
        ];

        $this->info('Migrating site images...');

        foreach ($siteImages as $image) {
            $result = $this->downloadAndStore($image['url'], 'site-images', $image['filename']);

            if ($result) {
                $this->info("  Saved: {$result}");
            } else {
                $failed[] = "Site image: {$image['url']}";
            }
        }

        // Summary
        if (count($failed) > 0) {
            $this->newLine();
            $this->warn('Failed downloads:');
            foreach ($failed as $fail) {
                $this->error("  - {$fail}");
            }

            return self::FAILURE;
        }

        $this->newLine();
        $this->info('All images migrated successfully!');

        return self::SUCCESS;
    }

    private function downloadAndStore(string $url, string $directory, ?string $filename = null): ?string
    {
        try {
            $response = Http::timeout(30)->get($url);

            if (! $response->successful()) {
                $this->warn("  HTTP {$response->status()} for: {$url}");

                return null;
            }

            if (! $filename) {
                $parsed = parse_url($url, PHP_URL_PATH);
                $filename = basename($parsed);
            }

            $path = "{$directory}/{$filename}";

            // Avoid overwriting existing files with the same name
            if (Storage::disk('public')->exists($path)) {
                $name = pathinfo($filename, PATHINFO_FILENAME);
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $filename = $name.'_'.uniqid().'.'.$ext;
                $path = "{$directory}/{$filename}";
            }

            Storage::disk('public')->put($path, $response->body());

            return $path;
        } catch (\Exception $e) {
            $this->warn("  Error downloading {$url}: {$e->getMessage()}");

            return null;
        }
    }
}
