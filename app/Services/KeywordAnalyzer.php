<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Str;

class KeywordAnalyzer
{
    protected Post $post;
    protected string $keyword = '';
    protected array $analysis = [];

    /**
     * Analyze keyword usage in a post
     */
    public function analyze(Post $post, ?string $keyword = null): array
    {
        $this->post = $post;
        $this->keyword = $keyword ?: ($post->focus_keyword ?? '');
        $this->analysis = [];

        if (empty($this->keyword)) {
            return [
                'keyword' => '',
                'density' => 0,
                'analysis' => [
                    'error' => 'No focus keyword specified'
                ],
                'suggestions' => [],
                'score' => 0
            ];
        }

        // Perform analysis
        $density = $this->calculateDensity();
        $this->checkKeywordInTitle();
        $this->checkKeywordInSlug();
        $this->checkKeywordInMetaDescription();
        $this->checkKeywordInFirstParagraph();
        $this->checkKeywordDistribution();

        // Calculate overall score
        $score = $this->calculateScore();

        // Generate suggestions
        $suggestions = $this->generateSuggestions($density);

        return [
            'keyword' => $this->keyword,
            'density' => $density,
            'analysis' => $this->analysis,
            'suggestions' => $suggestions,
            'score' => $score,
            'related_keywords' => $this->findRelatedKeywords()
        ];
    }

    /**
     * Calculate keyword density in content
     */
    protected function calculateDensity(): float
    {
        $content = strip_tags($this->post->body ?? '');
        $content = preg_replace('/\s+/', ' ', $content); // Normalize whitespace

        if (empty($content)) {
            return 0;
        }

        $wordCount = str_word_count($content);
        if ($wordCount === 0) {
            return 0;
        }

        // Count keyword occurrences (case-insensitive)
        $keywordCount = substr_count(
            Str::lower($content),
            Str::lower($this->keyword)
        );

        $density = ($keywordCount / $wordCount) * 100;

        // Store analysis
        $this->analysis['density'] = [
            'value' => round($density, 2),
            'keyword_count' => $keywordCount,
            'word_count' => $wordCount,
            'optimal' => $density >= 1.5 && $density <= 3.5,
            'message' => $this->getDensityMessage($density)
        ];

        return round($density, 2);
    }

    /**
     * Get message for keyword density
     */
    protected function getDensityMessage(float $density): string
    {
        if ($density < 0.5) return 'Very low - keyword rarely appears';
        if ($density < 1.5) return 'Low - consider using keyword more often';
        if ($density <= 3.5) return 'Optimal - good keyword density';
        if ($density <= 5) return 'High - might be over-optimized';
        return 'Too high - risk of keyword stuffing';
    }

    /**
     * Check if keyword appears in title
     */
    protected function checkKeywordInTitle(): void
    {
        $title = Str::lower($this->post->title ?? '');
        $keyword = Str::lower($this->keyword);
        $found = Str::contains($title, $keyword);

        // Check position (better if at beginning)
        $position = strpos($title, $keyword);
        $atBeginning = $position !== false && $position < 10;

        $this->analysis['in_title'] = [
            'found' => $found,
            'position' => $position !== false ? $position : null,
            'at_beginning' => $atBeginning,
            'message' => $found
                ? ($atBeginning ? 'Keyword found at beginning of title (excellent)' : 'Keyword found in title')
                : 'Keyword not found in title'
        ];
    }

    /**
     * Check if keyword appears in URL/slug
     */
    protected function checkKeywordInSlug(): void
    {
        $slug = Str::lower($this->post->slug ?? '');
        $keyword = Str::slug($this->keyword);
        $found = Str::contains($slug, $keyword);

        $this->analysis['in_slug'] = [
            'found' => $found,
            'message' => $found
                ? 'Keyword found in URL'
                : 'Keyword not found in URL'
        ];
    }

    /**
     * Check if keyword appears in meta description
     */
    protected function checkKeywordInMetaDescription(): void
    {
        $meta = $this->post->meta ?? [];
        $description = Str::lower($meta['meta_description'] ?? '');
        $keyword = Str::lower($this->keyword);
        $found = Str::contains($description, $keyword);

        $this->analysis['in_meta_description'] = [
            'found' => $found,
            'message' => $found
                ? 'Keyword found in meta description'
                : 'Keyword not found in meta description'
        ];
    }

    /**
     * Check if keyword appears in first paragraph
     */
    protected function checkKeywordInFirstParagraph(): void
    {
        $content = strip_tags($this->post->body ?? '');
        $firstParagraph = Str::limit($content, 150, '');
        $firstParagraphLower = Str::lower($firstParagraph);
        $keyword = Str::lower($this->keyword);
        $found = Str::contains($firstParagraphLower, $keyword);

        $this->analysis['in_first_paragraph'] = [
            'found' => $found,
            'message' => $found
                ? 'Keyword found in opening paragraph'
                : 'Keyword not found in opening paragraph - important for SEO'
        ];
    }

    /**
     * Check keyword distribution throughout content
     */
    protected function checkKeywordDistribution(): void
    {
        $content = strip_tags($this->post->body ?? '');
        if (empty($content)) {
            $this->analysis['distribution'] = [
                'good' => false,
                'message' => 'No content to analyze'
            ];
            return;
        }

        // Split content into sections
        $sections = str_split($content, (int)(strlen($content) / 4));
        $keywordLower = Str::lower($this->keyword);
        $distribution = [];

        foreach ($sections as $index => $section) {
            $sectionLower = Str::lower($section);
            $count = substr_count($sectionLower, $keywordLower);
            $distribution[] = [
                'section' => $index + 1,
                'count' => $count
            ];
        }

        // Check if distribution is relatively even
        $counts = array_column($distribution, 'count');
        $avg = array_sum($counts) / count($counts);
        $variance = 0;
        foreach ($counts as $count) {
            $variance += pow($count - $avg, 2);
        }
        $variance = $variance / count($counts);

        $goodDistribution = $variance < ($avg * 2); // Not too uneven

        $this->analysis['distribution'] = [
            'sections' => $distribution,
            'good' => $goodDistribution,
            'message' => $goodDistribution
                ? 'Keyword is well distributed throughout content'
                : 'Keyword distribution is uneven - spread usage more evenly'
        ];
    }

    /**
     * Calculate overall keyword optimization score
     */
    protected function calculateScore(): int
    {
        $score = 0;
        $checks = 0;

        // Density (30 points)
        if (isset($this->analysis['density']['optimal']) && $this->analysis['density']['optimal']) {
            $score += 30;
        } elseif (isset($this->analysis['density']['value'])) {
            $density = $this->analysis['density']['value'];
            if ($density >= 1 && $density <= 4) {
                $score += 15; // Partial credit
            }
        }
        $checks += 30;

        // In title (20 points, +5 bonus if at beginning)
        if (isset($this->analysis['in_title']['found']) && $this->analysis['in_title']['found']) {
            $score += 20;
            if ($this->analysis['in_title']['at_beginning']) {
                $score += 5; // Bonus
            }
        }
        $checks += 20;

        // In slug (15 points)
        if (isset($this->analysis['in_slug']['found']) && $this->analysis['in_slug']['found']) {
            $score += 15;
        }
        $checks += 15;

        // In meta description (15 points)
        if (isset($this->analysis['in_meta_description']['found']) && $this->analysis['in_meta_description']['found']) {
            $score += 15;
        }
        $checks += 15;

        // In first paragraph (10 points)
        if (isset($this->analysis['in_first_paragraph']['found']) && $this->analysis['in_first_paragraph']['found']) {
            $score += 10;
        }
        $checks += 10;

        // Distribution (10 points)
        if (isset($this->analysis['distribution']['good']) && $this->analysis['distribution']['good']) {
            $score += 10;
        }
        $checks += 10;

        // Return percentage score
        return min(100, (int)(($score / $checks) * 100));
    }

    /**
     * Generate suggestions based on analysis
     */
    protected function generateSuggestions(float $density): array
    {
        $suggestions = [];

        // Density suggestions
        if ($density < 1.5) {
            $suggestions[] = [
                'type' => 'density_low',
                'priority' => 'high',
                'message' => "Increase keyword usage to 2-3% density (currently {$density}%)"
            ];
        } elseif ($density > 3.5) {
            $suggestions[] = [
                'type' => 'density_high',
                'priority' => 'high',
                'message' => "Reduce keyword usage to avoid over-optimization (currently {$density}%)"
            ];
        }

        // Title suggestions
        if (isset($this->analysis['in_title']['found']) && !$this->analysis['in_title']['found']) {
            $suggestions[] = [
                'type' => 'title',
                'priority' => 'high',
                'message' => 'Add focus keyword to title for better SEO'
            ];
        } elseif (isset($this->analysis['in_title']['at_beginning']) && !$this->analysis['in_title']['at_beginning']) {
            $suggestions[] = [
                'type' => 'title_position',
                'priority' => 'medium',
                'message' => 'Move keyword closer to beginning of title'
            ];
        }

        // URL suggestions
        if (isset($this->analysis['in_slug']['found']) && !$this->analysis['in_slug']['found']) {
            $suggestions[] = [
                'type' => 'slug',
                'priority' => 'medium',
                'message' => 'Include keyword in URL slug'
            ];
        }

        // Meta description suggestions
        if (isset($this->analysis['in_meta_description']['found']) && !$this->analysis['in_meta_description']['found']) {
            $suggestions[] = [
                'type' => 'meta_description',
                'priority' => 'high',
                'message' => 'Add keyword to meta description'
            ];
        }

        // First paragraph suggestions
        if (isset($this->analysis['in_first_paragraph']['found']) && !$this->analysis['in_first_paragraph']['found']) {
            $suggestions[] = [
                'type' => 'first_paragraph',
                'priority' => 'high',
                'message' => 'Include keyword in the first 150 characters'
            ];
        }

        // Distribution suggestions
        if (isset($this->analysis['distribution']['good']) && !$this->analysis['distribution']['good']) {
            $suggestions[] = [
                'type' => 'distribution',
                'priority' => 'medium',
                'message' => 'Distribute keyword more evenly throughout content'
            ];
        }

        return $suggestions;
    }

    /**
     * Find related keywords based on content
     */
    protected function findRelatedKeywords(): array
    {
        $content = strip_tags($this->post->body ?? '');
        $title = $this->post->title ?? '';
        $fullText = $title . ' ' . $content;

        // Common sports-related terms that might be relevant
        $sportsTerms = [
            'fotbal', 'meci', 'victorie', 'gol', 'jucător', 'echipă',
            'antrenor', 'campionat', 'ligă', 'stadion', 'antrenament',
            'strategie', 'tactică', 'performanță', 'rezultat', 'scor',
            'sport', 'competiție', 'turneu', 'sezon', 'clasament'
        ];

        $related = [];
        $textLower = Str::lower($fullText);

        // Find which sports terms appear in content
        foreach ($sportsTerms as $term) {
            if (Str::contains($textLower, $term) && $term !== Str::lower($this->keyword)) {
                $count = substr_count($textLower, $term);
                if ($count > 1) { // Only include if mentioned multiple times
                    $related[] = [
                        'keyword' => $term,
                        'count' => $count,
                        'relevance' => min(100, $count * 10)
                    ];
                }
            }
        }

        // Sort by relevance
        usort($related, fn($a, $b) => $b['relevance'] <=> $a['relevance']);

        // Return top 5
        return array_slice($related, 0, 5);
    }

    /**
     * Save analysis to post
     */
    public function analyzeAndSave(Post $post, ?string $keyword = null): array
    {
        $result = $this->analyze($post, $keyword);

        // Save to database
        if ($keyword) {
            $post->focus_keyword = $keyword;
        }
        $post->keyword_density = $result['density'];
        $post->keyword_analysis = $result;
        $post->save();

        return $result;
    }
}