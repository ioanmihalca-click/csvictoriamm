<?php

namespace Tests\Feature;

use App\Livewire\Blog\Index as BlogIndex;
use App\Livewire\Blog\Show as BlogShow;
use App\Models\Post;
use Tests\TestCase;

class BlogPageTest extends TestCase
{
    public function test_blog_index_renders_brutalist(): void
    {
        $response = $this->get('/blog');

        $response->assertOk()
            ->assertSeeLivewire(BlogIndex::class)
            ->assertSee('Cuvinte')
            ->assertSee('din ring')
            ->assertDontSee('rounded-2xl')
            ->assertDontSee('font-roboto-condensed');
    }

    public function test_blog_show_renders_when_post_exists(): void
    {
        $post = Post::published()->orderByDesc('published_at')->first();

        if (! $post) {
            $this->markTestSkipped('No published post in database to test against.');
        }

        $this->get(route('blog.show', $post->slug))
            ->assertOk()
            ->assertSeeLivewire(BlogShow::class)
            ->assertSee($post->title)
            ->assertSee('Distribuie articolul')
            ->assertSee('Înapoi la blog')
            ->assertDontSee('rounded-lg shadow-md')
            ->assertDontSee('font-roboto-condensed');
    }

    public function test_blog_show_emits_valid_json_ld_for_ai_crawlers(): void
    {
        $post = Post::published()->orderByDesc('published_at')->first();

        if (! $post) {
            $this->markTestSkipped('No published post in database to test against.');
        }

        $html = $this->get(route('blog.show', $post->slug))->getContent();

        // Extrage toate blocurile <script type="application/ld+json">…</script>
        preg_match_all(
            '#<script type="application/ld\+json">\s*(.+?)\s*</script>#s',
            $html,
            $matches,
        );

        $this->assertNotEmpty($matches[1], 'No JSON-LD blocks found on blog post page.');

        $foundBlogPosting = false;
        $foundBreadcrumb = false;

        foreach ($matches[1] as $jsonRaw) {
            $decoded = json_decode($jsonRaw, true);
            $this->assertSame(JSON_ERROR_NONE, json_last_error(),
                'Invalid JSON-LD payload: '.json_last_error_msg()."\n--- raw ---\n".$jsonRaw);

            $type = $decoded['@type'] ?? null;
            if ($type === 'BlogPosting') {
                $foundBlogPosting = true;
                $this->assertSame($post->title, $decoded['headline'] ?? null);
                $this->assertNotEmpty($decoded['articleBody'] ?? '');
                $this->assertNotEmpty($decoded['datePublished'] ?? '');
                $this->assertSame('ro-RO', $decoded['inLanguage'] ?? null);
            }
            if ($type === 'BreadcrumbList') {
                $foundBreadcrumb = true;
                $this->assertCount(3, $decoded['itemListElement']);
            }
        }

        $this->assertTrue($foundBlogPosting, 'BlogPosting JSON-LD missing on post page.');
        $this->assertTrue($foundBreadcrumb, 'BreadcrumbList JSON-LD missing on post page.');
    }
}
