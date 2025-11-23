<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'canvas_posts';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'title', 'slug', 'body', 'meta', 'featured_image', 'published_at',
        'views_count', 'unique_views', 'shares_count', 'average_time_on_page',
        'last_viewed_at', 'reading_time',
    ];

    protected $casts = [
        'meta' => 'array',
        'published_at' => 'datetime',
        'last_viewed_at' => 'datetime',
        'unique_views' => 'array',
        'shares_count' => 'array',
    ];

    protected $appends = ['read_time'];

    // Automatically generate slug on save
    protected static function booted()
    {
        parent::boot();

        static::saving(function (Post $post) {
            $post->slug = Str::slug($post->title);
        });
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    // Accessors
    public function getReadTimeAttribute()
    {
        $words = str_word_count(strip_tags($this->body));
        $minutes = ceil($words / 200); // Average reading speed: 200 words/minute

        return $minutes.' min read';
    }

    public function getSummaryAttribute()
    {
        // Convert markdown to HTML first, then strip tags
        return Str::words(strip_tags(Str::markdown($this->body)), 30); // Show the first 30 words as summary
    }

    public function getUrlAttribute()
    {
        return route('blog.show', $this->slug);
    }

    // Statistics Methods
    public function trackView(\Illuminate\Http\Request $request): void
    {
        $tracker = new \App\Services\PostStatsTracker;
        $tracker->trackView($this, $request);
    }

    public function trackShare(string $platform): void
    {
        $tracker = new \App\Services\PostStatsTracker;
        $tracker->trackShare($this, $platform);
    }

    public function getStatsSummary(): array
    {
        $tracker = new \App\Services\PostStatsTracker;

        return $tracker->getStatsSummary($this);
    }

    public function getTotalSharesAttribute(): int
    {
        $shares = $this->shares_count ?? [];

        return $shares['total'] ?? 0;
    }

    public function getFormattedViewsAttribute(): string
    {
        $views = $this->views_count ?? 0;
        if ($views > 1000000) {
            return number_format($views / 1000000, 1).'M';
        } elseif ($views > 1000) {
            return number_format($views / 1000, 1).'K';
        }

        return (string) $views;
    }

    // Scopes for popular and trending posts
    public function scopePopular($query)
    {
        return $query->orderByDesc('views_count');
    }

    public function scopeTrending($query)
    {
        return $query->where('last_viewed_at', '>=', now()->subDays(7))
            ->orderByDesc('views_count');
    }
}
