<?php

namespace App\Services;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PostStatsTracker
{
    /**
     * Track a post view
     */
    public function trackView(Post $post, Request $request): void
    {
        // Increment total views
        $post->increment('views_count');
        $post->last_viewed_at = now();

        // Track unique views
        $this->trackUniqueView($post, $request);

        $post->save();
    }

    /**
     * Track unique views using cookies and IP
     */
    protected function trackUniqueView(Post $post, Request $request): void
    {
        $uniqueViews = $post->unique_views ?? [];
        $today = now()->format('Y-m-d');

        // Initialize today's data if not exists
        if (!isset($uniqueViews[$today])) {
            $uniqueViews[$today] = [
                'count' => 0,
                'ips' => []
            ];
        }

        // Check if this IP has already viewed today
        $ip = $request->ip();
        $cookieName = 'post_view_' . $post->id;
        $hasViewed = Cookie::get($cookieName) || in_array($ip, $uniqueViews[$today]['ips']);

        if (!$hasViewed) {
            // New unique view
            $uniqueViews[$today]['count']++;
            $uniqueViews[$today]['ips'][] = $ip;

            // Set cookie for 24 hours
            Cookie::queue($cookieName, true, 60 * 24);

            // Keep only last 30 days of data
            $uniqueViews = $this->pruneOldData($uniqueViews, 30);

            $post->unique_views = $uniqueViews;
        }
    }

    /**
     * Track a share event
     */
    public function trackShare(Post $post, string $platform): void
    {
        $sharesCount = $post->shares_count ?? [];

        if (!isset($sharesCount[$platform])) {
            $sharesCount[$platform] = 0;
        }

        $sharesCount[$platform]++;
        $sharesCount['total'] = array_sum(array_filter($sharesCount, fn($key) => $key !== 'total', ARRAY_FILTER_USE_KEY));

        $post->shares_count = $sharesCount;
        $post->save();
    }

    /**
     * Track time spent on page
     */
    public function trackTimeOnPage(Post $post, int $seconds): void
    {
        // Calculate new average
        $currentAverage = $post->average_time_on_page ?? 0;
        $viewsCount = $post->views_count ?? 1;

        // Weighted average calculation
        $newAverage = (($currentAverage * ($viewsCount - 1)) + $seconds) / $viewsCount;

        $post->average_time_on_page = (int) $newAverage;
        $post->save();
    }

    /**
     * Calculate and update reading time
     */
    public function calculateReadingTime(Post $post): int
    {
        $content = strip_tags($post->body ?? '');
        $wordCount = str_word_count($content);

        // Average reading speed: 250 words per minute
        $readingTime = max(1, ceil($wordCount / 250));

        $post->reading_time = $readingTime;
        $post->save();

        return $readingTime;
    }

    /**
     * Get statistics summary for a post
     */
    public function getStatsSummary(Post $post): array
    {
        $uniqueViews = $post->unique_views ?? [];
        $totalUniqueViews = 0;

        foreach ($uniqueViews as $dayData) {
            $totalUniqueViews += $dayData['count'] ?? 0;
        }

        $sharesCount = $post->shares_count ?? [];
        $totalShares = $sharesCount['total'] ?? 0;

        return [
            'views' => [
                'total' => $post->views_count ?? 0,
                'unique' => $totalUniqueViews,
                'today' => $uniqueViews[now()->format('Y-m-d')]['count'] ?? 0,
                'this_week' => $this->getViewsForPeriod($uniqueViews, 7),
                'this_month' => $this->getViewsForPeriod($uniqueViews, 30)
            ],
            'shares' => [
                'total' => $totalShares,
                'facebook' => $sharesCount['facebook'] ?? 0,
                'whatsapp' => $sharesCount['whatsapp'] ?? 0,
                'linkedin' => $sharesCount['linkedin'] ?? 0
            ],
            'engagement' => [
                'average_time' => $this->formatTime($post->average_time_on_page ?? 0),
                'reading_time' => $post->reading_time ?? 0,
                'engagement_rate' => $this->calculateEngagementRate($post),
                'last_viewed' => $post->last_viewed_at ? Carbon::parse($post->last_viewed_at)->diffForHumans() : 'Never'
            ]
        ];
    }

    /**
     * Get views for a specific period
     */
    protected function getViewsForPeriod(array $uniqueViews, int $days): int
    {
        $count = 0;
        $startDate = now()->subDays($days);

        foreach ($uniqueViews as $date => $data) {
            if (Carbon::parse($date)->gte($startDate)) {
                $count += $data['count'] ?? 0;
            }
        }

        return $count;
    }

    /**
     * Format time in seconds to human-readable format
     */
    protected function formatTime(int $seconds): string
    {
        if ($seconds < 60) {
            return $seconds . ' seconds';
        } elseif ($seconds < 3600) {
            return round($seconds / 60, 1) . ' minutes';
        } else {
            return round($seconds / 3600, 1) . ' hours';
        }
    }

    /**
     * Calculate engagement rate based on various metrics
     */
    protected function calculateEngagementRate(Post $post): float
    {
        $views = $post->views_count ?? 0;
        if ($views === 0) {
            return 0;
        }

        $sharesCount = $post->shares_count ?? [];
        $totalShares = $sharesCount['total'] ?? 0;

        $avgTime = $post->average_time_on_page ?? 0;
        $readingTime = ($post->reading_time ?? 1) * 60; // Convert to seconds

        // Calculate engagement factors
        $shareRate = ($totalShares / $views) * 100; // Weight: 40%
        $timeEngagement = min(100, ($avgTime / $readingTime) * 100); // Weight: 60%

        // Weighted average
        $engagementRate = ($shareRate * 0.4) + ($timeEngagement * 0.6);

        return min(100, round($engagementRate, 1));
    }

    /**
     * Prune old data from tracking arrays
     */
    protected function pruneOldData(array $data, int $daysToKeep): array
    {
        $cutoffDate = now()->subDays($daysToKeep);
        $pruned = [];

        foreach ($data as $date => $value) {
            if (Carbon::parse($date)->gte($cutoffDate)) {
                $pruned[$date] = $value;
            }
        }

        return $pruned;
    }

    /**
     * Get trending posts based on recent activity
     */
    public static function getTrendingPosts(int $limit = 5): \Illuminate\Database\Eloquent\Collection
    {
        return Post::query()
            ->where('published_at', '<=', now())
            ->where('last_viewed_at', '>=', now()->subDays(7))
            ->orderByDesc('views_count')
            ->limit($limit)
            ->get();
    }

    /**
     * Get popular posts based on all-time views
     */
    public static function getPopularPosts(int $limit = 5): \Illuminate\Database\Eloquent\Collection
    {
        return Post::query()
            ->where('published_at', '<=', now())
            ->orderByDesc('views_count')
            ->limit($limit)
            ->get();
    }
}