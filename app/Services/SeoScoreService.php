<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Str;

class SeoScoreService
{
    protected Post $post;
    protected array $analysis = [];
    protected int $score = 0;

    /**
     * Analyze a post and return SEO score with detailed analysis
     */
    public function analyze(Post $post): array
    {
        $this->post = $post;
        $this->analysis = [];
        $this->score = 0;

        // Run all checks
        $this->checkTitleLength();
        $this->checkMetaDescription();
        $this->checkFocusKeyword();
        $this->checkFeaturedImage();
        $this->checkContentLength();

        // Calculate final score
        $this->score = min(100, $this->score); // Cap at 100

        return [
            'score' => $this->score,
            'analysis' => $this->analysis,
            'level' => $this->getScoreLevel($this->score),
            'color' => $this->getScoreColor($this->score),
            'recommendations' => $this->getRecommendations()
        ];
    }

    /**
     * Check title length (30-60 characters ideal)
     */
    protected function checkTitleLength(): void
    {
        $titleLength = strlen($this->post->title ?? '');
        $passed = $titleLength >= 30 && $titleLength <= 60;

        $this->analysis['title_length'] = [
            'checked' => true,
            'passed' => $passed,
            'value' => $titleLength,
            'message' => $passed
                ? "Title length is optimal ({$titleLength} characters)"
                : "Title should be between 30-60 characters (current: {$titleLength})",
            'weight' => 20
        ];

        if ($passed) {
            $this->score += 20;
        } elseif ($titleLength >= 20 && $titleLength <= 70) {
            // Partial credit for acceptable but not optimal length
            $this->score += 10;
            $this->analysis['title_length']['partial'] = true;
        }
    }

    /**
     * Check meta description (120-160 characters ideal)
     */
    protected function checkMetaDescription(): void
    {
        $meta = $this->post->meta ?? [];
        $description = $meta['meta_description'] ?? '';
        $descLength = strlen($description);
        $passed = $descLength >= 120 && $descLength <= 160;

        $this->analysis['meta_description'] = [
            'checked' => true,
            'passed' => $passed,
            'value' => $descLength,
            'message' => $passed
                ? "Meta description length is optimal ({$descLength} characters)"
                : ($descLength === 0
                    ? "Meta description is missing"
                    : "Meta description should be between 120-160 characters (current: {$descLength})"),
            'weight' => 20
        ];

        if ($passed) {
            $this->score += 20;
        } elseif ($descLength >= 100 && $descLength <= 180) {
            // Partial credit
            $this->score += 10;
            $this->analysis['meta_description']['partial'] = true;
        }
    }

    /**
     * Check if focus keyword is present in title
     */
    protected function checkFocusKeyword(): void
    {
        $focusKeyword = $this->post->focus_keyword ?? '';
        $title = $this->post->title ?? '';

        if (empty($focusKeyword)) {
            $this->analysis['focus_keyword'] = [
                'checked' => true,
                'passed' => false,
                'message' => "No focus keyword set",
                'weight' => 20
            ];
            return;
        }

        $titleLower = Str::lower($title);
        $keywordLower = Str::lower($focusKeyword);
        $passed = Str::contains($titleLower, $keywordLower);

        $this->analysis['focus_keyword'] = [
            'checked' => true,
            'passed' => $passed,
            'keyword' => $focusKeyword,
            'message' => $passed
                ? "Focus keyword '{$focusKeyword}' found in title"
                : "Focus keyword '{$focusKeyword}' not found in title",
            'weight' => 20
        ];

        if ($passed) {
            $this->score += 20;
        }
    }

    /**
     * Check if featured image is present
     */
    protected function checkFeaturedImage(): void
    {
        $hasImage = !empty($this->post->featured_image);

        $this->analysis['featured_image'] = [
            'checked' => true,
            'passed' => $hasImage,
            'message' => $hasImage
                ? "Featured image is set"
                : "No featured image - images improve engagement",
            'weight' => 20
        ];

        if ($hasImage) {
            $this->score += 20;
        }
    }

    /**
     * Check content length (minimum 300 words)
     */
    protected function checkContentLength(): void
    {
        $content = strip_tags($this->post->body ?? '');
        $wordCount = str_word_count($content);
        $passed = $wordCount >= 300;

        $this->analysis['content_length'] = [
            'checked' => true,
            'passed' => $passed,
            'value' => $wordCount,
            'message' => $passed
                ? "Content length is good ({$wordCount} words)"
                : "Content should be at least 300 words (current: {$wordCount})",
            'weight' => 20
        ];

        if ($passed) {
            $this->score += 20;
        } elseif ($wordCount >= 200) {
            // Partial credit for shorter but acceptable content
            $this->score += 10;
            $this->analysis['content_length']['partial'] = true;
        }
    }

    /**
     * Get score level description
     */
    protected function getScoreLevel(int $score): string
    {
        if ($score >= 80) return 'Good';
        if ($score >= 60) return 'OK';
        if ($score >= 40) return 'Needs Work';
        return 'Poor';
    }

    /**
     * Get score color class for display
     */
    protected function getScoreColor(int $score): string
    {
        if ($score >= 80) return 'success'; // green
        if ($score >= 60) return 'warning'; // yellow
        if ($score >= 40) return 'warning'; // orange
        return 'danger'; // red
    }

    /**
     * Get recommendations based on failed checks
     */
    protected function getRecommendations(): array
    {
        $recommendations = [];

        foreach ($this->analysis as $key => $check) {
            if (!$check['passed'] && !($check['partial'] ?? false)) {
                $recommendations[] = [
                    'type' => $key,
                    'priority' => $check['weight'] ?? 10,
                    'message' => $check['message']
                ];
            }
        }

        // Sort by priority
        usort($recommendations, fn($a, $b) => $b['priority'] <=> $a['priority']);

        return $recommendations;
    }

    /**
     * Calculate and save SEO score for a post
     */
    public function calculateAndSave(Post $post): int
    {
        $result = $this->analyze($post);

        // Save to database
        $post->seo_score = $result['score'];
        $post->seo_analysis = $result;
        $post->save();

        return $result['score'];
    }
}