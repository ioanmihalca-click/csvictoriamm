<?php

namespace App\Models;

use App\Services\PostStatsTracker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Spatie\LaravelMarkdown\MarkdownRenderer;

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

    // Automatically generate slug on save & invalidate plain-body cache
    protected static function booted()
    {
        parent::boot();

        static::saving(function (Post $post) {
            $post->slug = Str::slug($post->title);
        });

        static::saved(function (Post $post) {
            Cache::forget("post:{$post->id}:plain-body");
        });

        static::deleted(function (Post $post) {
            Cache::forget("post:{$post->id}:plain-body");
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
        $words = Str::wordCount(strip_tags($this->body ?? ''));
        $minutes = max(1, (int) ceil($words / 200)); // Average reading speed: 200 words/minute

        return $minutes.' min read';
    }

    /**
     * First 30 words of the article body as plain text (markdown stripped).
     * Memoized per request via once() to avoid repeated cache lookups when the
     * accessor is read multiple times in the same response cycle.
     */
    public function getSummaryAttribute(): string
    {
        return once(fn () => Str::words($this->plain_body, 30));
    }

    /**
     * The article body rendered to HTML, then stripped to plain text — used
     * for OG/Twitter meta tags, JSON-LD `articleBody`, and word counts.
     * Cached with stale-while-revalidate (fresh 1h, stale up to 24h).
     */
    public function getPlainBodyAttribute(): string
    {
        return once(fn () => Cache::flexible(
            "post:{$this->id}:plain-body",
            [3600, 86400],
            fn () => trim(strip_tags(
                app(MarkdownRenderer::class)
                    ->disableAnchors()
                    ->toHtml($this->body ?? '')
            ))
        ));
    }

    public function getUrlAttribute()
    {
        return route('blog.show', $this->slug);
    }

    // Statistics Methods
    public function trackView(Request $request): void
    {
        $tracker = new PostStatsTracker;
        $tracker->trackView($this, $request);
    }

    public function trackShare(string $platform): void
    {
        $tracker = new PostStatsTracker;
        $tracker->trackShare($this, $platform);
    }

    public function getStatsSummary(): array
    {
        $tracker = new PostStatsTracker;

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
