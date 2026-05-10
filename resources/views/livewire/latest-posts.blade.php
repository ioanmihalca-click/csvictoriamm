<div>
    @if ($latestPosts->isEmpty())
        <div class="bl-empty">
            <div class="mono" style="color:var(--red);font-size:11px;letter-spacing:.2em;margin-bottom:14px">◆ ARHIVĂ
                GOALĂ</div>
            <h2>Nu există articole<br><em>publicate încă.</em></h2>
            <p>Revino în curând — pregătim primele articole.</p>
        </div>
    @else
        <div class="bl-grid">
            @foreach ($latestPosts as $post)
                <article class="bl-card">
                    <a wire:navigate href="{{ route('blog.show', $post->slug) }}" class="bl-card-link">
                        <div class="bl-card-img">
                            @if ($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                                    loading="lazy">
                            @else
                                <div class="ph">
                                    <span
                                        class="ph-label">◆ {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="bl-card-body">
                            <div class="bl-card-meta">
                                <time datetime="{{ $post->published_at->toDateString() }}" itemprop="datePublished">
                                    ◆ {{ $post->published_at->isoFormat('DD MMM YYYY') }}
                                </time>
                                <span
                                    class="bl-card-num">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <h3 class="bl-card-title" itemprop="headline">{{ $post->title }}</h3>
                            <p class="bl-card-summary" itemprop="description">{{ $post->summary }}</p>
                            <span class="bl-card-cta">Citește articolul<span class="arr"></span></span>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>

        <div class="lp-foot">
            <a wire:navigate href="{{ route('blog.index') }}" class="btn btn-ghost">Vezi toate articolele<span
                    class="arr"></span></a>
        </div>
    @endif
</div>
