<?php

namespace App\Console\Commands;

use App\Models\Competition;
use Carbon\Carbon;
use DOMDocument;
use DOMXPath;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImportCompetitions extends Command
{
    protected $signature = 'import:competitions';
    protected $description = 'Import competitions from the existing Livewire component';

    public function handle()
    {
        $this->info('Starting competitions import...');

        // Path to the Blade file containing the competitions
        $filePath = resource_path('views/livewire/competitii.blade.php');
        
        if (!File::exists($filePath)) {
            $this->error("File not found: $filePath");
            return 1;
        }

        // Load the blade file content
        $content = File::get($filePath);
        
        // Parse the HTML to extract competition data
        $competitions = $this->parseCompetitionsFromHTML($content);
        
        if (empty($competitions)) {
            $this->warn('No competitions found in the file.');
            return 0;
        }

        $this->info('Found ' . count($competitions) . ' competitions.');
        
        // Import competitions to the database
        $importedCount = 0;
        foreach ($competitions as $competition) {
            // Check if a competition with the same title and date already exists
            $existing = Competition::where('title', $competition['title'])
                ->where('date', $competition['date'])
                ->first();
            
            if ($existing) {
                $this->info("Competition already exists: {$competition['title']} ({$competition['date']})");
                continue;
            }
            
            Competition::create($competition);
            $importedCount++;
            $this->info("Imported: {$competition['title']} ({$competition['date']})");
        }

        $this->info("Import completed. Imported $importedCount new competitions.");
        return 0;
    }

    private function parseCompetitionsFromHTML($html)
    {
        $competitions = [];
        
        // Create a new DOM document
        $dom = new DOMDocument();
        
        // Suppress errors for HTML5 tags
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        libxml_clear_errors();
        
        $xpath = new DOMXPath($dom);
        
        // Find all article elements (competitions)
        $articles = $xpath->query('//article');
        
        foreach ($articles as $article) {
            $competition = [
                'title' => '',
                'location' => '',
                'date' => null,
                'description' => '',
                'results' => '',
                'team_composition' => '',
                'notes' => '',
                'image_url' => '',
                'details_url' => '',
                'is_active' => true,
                'order' => 0
            ];
                  // Extract image URL
            $imgElements = $xpath->query('.//img', $article);
            if ($imgElements->length > 0) {
                $competition['image_url'] = $imgElements->item(0)->getAttribute('src') ?: '';
            }
            
            // Extract title and date/location
            $h3Elements = $xpath->query('.//h3', $article);
            if ($h3Elements->length > 0) {
                $competition['title'] = trim($h3Elements->item(0)->textContent);
            }
            
            // Extract date and location
            $dateElements = $xpath->query('.//div[contains(@class, "absolute")]//p[contains(@class, "text-sm")]', $article);
            if ($dateElements->length > 0) {
                $dateText = trim($dateElements->item(0)->textContent);
                
                // Try to parse the date in format like "24 mai 2025 @ Baia Mare"
                if (preg_match('/(\d+)\s+([a-zA-Z]+)\s+(\d{4})\s+@\s+(.+)/', $dateText, $matches)) {
                    $day = $matches[1];
                    $month = $this->translateRomanianMonth($matches[2]);
                    $year = $matches[3];
                    $location = $matches[4];
                    
                    try {
                        $competition['date'] = Carbon::createFromDate($year, $month, $day)->format('Y-m-d');
                        $competition['location'] = trim($location);
                    } catch (\Exception $e) {
                        // Fallback to current date if parsing fails
                        $competition['date'] = Carbon::now()->format('Y-m-d');
                    }
                } else {
                    // If we can't parse the date properly, set it to today
                    $competition['date'] = Carbon::now()->format('Y-m-d');
                    
                    // Try to extract any location information
                    if (Str::contains($dateText, '@')) {
                        $competition['location'] = trim(Str::after($dateText, '@'));
                    } else {
                        $competition['location'] = 'Nedefinit';
                    }
                }
            }
            
            // Extract description
            $descriptionElements = $xpath->query('.//div[contains(@class, "p-6")]//p[1]', $article);
            if ($descriptionElements->length > 0) {
                $competition['description'] = trim($descriptionElements->item(0)->textContent);
            }
            
            // Extract results
            $resultsSection = $xpath->query('.//h4[contains(text(), "Rezultate")]', $article);
            if ($resultsSection->length > 0) {
                $resultsLists = $xpath->query('following-sibling::ul', $resultsSection->item(0));
                if ($resultsLists->length > 0) {
                    $competition['results'] = trim($resultsLists->item(0)->textContent);
                }
            }
            
            // Extract team composition
            $teamSection = $xpath->query('.//h4[contains(text(), "Componența")]', $article);
            if ($teamSection->length > 0) {
                $teamLists = $xpath->query('following-sibling::ul', $teamSection->item(0));
                if ($teamLists->length > 0) {
                    $competition['team_composition'] = trim($teamLists->item(0)->textContent);
                }
            }
            
            // Extract notes (italic text)
            $notesElements = $xpath->query('.//p[contains(@class, "italic")]', $article);
            if ($notesElements->length > 0) {
                $competition['notes'] = trim($notesElements->item(0)->textContent);
            }
            
            // Extract details URL
            $linkElements = $xpath->query('.//a[contains(@href, "blog") or contains(@href, "facebook")]', $article);
            if ($linkElements->length > 0) {
                $competition['details_url'] = $linkElements->item(0)->getAttribute('href');
            }
            
            $competitions[] = $competition;
        }
        
        return $competitions;
    }
    
    private function translateRomanianMonth($romanianMonth)
    {
        $months = [
            'ianuarie' => 1,
            'februarie' => 2, 
            'martie' => 3,
            'aprilie' => 4,
            'mai' => 5,
            'iunie' => 6,
            'iulie' => 7,
            'august' => 8,
            'septembrie' => 9,
            'octombrie' => 10,
            'noiembrie' => 11,
            'decembrie' => 12
        ];
        
        $romanianMonth = mb_strtolower($romanianMonth);
        
        return $months[$romanianMonth] ?? 1; // Default to January if not found
    }
}
