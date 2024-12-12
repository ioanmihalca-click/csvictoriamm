<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap';

    public function handle()
    {
        $this->info('Generating sitemap...');

        $sitemap = Sitemap::create();

        // Adăugăm paginile statice
        $staticPages = [
            ['url' => '/', 'priority' => '1.00'],
            ['url' => '/antrenamente', 'priority' => '0.90'],
            ['url' => '/blog', 'priority' => '0.90'],
            ['url' => '/galerie', 'priority' => '0.80'],
            ['url' => '/competitii', 'priority' => '0.80'],
            ['url' => '/sponsori', 'priority' => '0.80'],
            ['url' => '/echipa', 'priority' => '0.80'],
            ['url' => '/contact', 'priority' => '0.80'],
        ];

        foreach ($staticPages as $page) {
            $sitemap->add(Url::create(config('app.url') . $page['url'])
                ->setPriority($page['priority'])
                ->setLastModificationDate(now()));
        }

        // Adăugăm postările de blog publicate
        Post::query()
            ->published()
            ->orderBy('published_at', 'desc')
            ->each(function (Post $post) use ($sitemap) {
                $sitemap->add(
                    Url::create(config('app.url') . '/blog/' . $post->slug)
                        ->setPriority('0.80')
                        ->setLastModificationDate($post->published_at ?? $post->updated_at)
                );
            });

        // Salvăm sitemapul
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}