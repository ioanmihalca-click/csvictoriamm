<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\PostStatsTracker;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PostAnalyticsController extends Controller
{
    protected PostStatsTracker $tracker;

    public function __construct(PostStatsTracker $tracker)
    {
        $this->tracker = $tracker;
    }

    /**
     * Track a share event for a post
     */
    public function trackShare(Request $request, string $postId): JsonResponse
    {
        $request->validate([
            'platform' => 'required|string|in:facebook,whatsapp,linkedin,twitter,email'
        ]);

        $post = Post::findOrFail($postId);
        $this->tracker->trackShare($post, $request->input('platform'));

        return response()->json([
            'success' => true,
            'message' => 'Share tracked successfully'
        ]);
    }

    /**
     * Track time spent on a post
     */
    public function trackTime(Request $request, string $postId): JsonResponse
    {
        $request->validate([
            'time' => 'required|integer|min:0|max:86400' // Max 24 hours
        ]);

        $post = Post::findOrFail($postId);
        $this->tracker->trackTimeOnPage($post, $request->input('time'));

        return response()->json([
            'success' => true,
            'message' => 'Time tracked successfully'
        ]);
    }

    /**
     * Get post statistics (optional endpoint for displaying stats)
     */
    public function getStats(string $postId): JsonResponse
    {
        $post = Post::findOrFail($postId);
        $stats = $this->tracker->getStatsSummary($post);

        return response()->json([
            'success' => true,
            'stats' => $stats
        ]);
    }
}