<div>
    {{-- ============ ARTICLE HERO ============ --}}
    <section class="post-hero">
        <div class="section-meta">
            <span class="num">◆ ARTICOL</span>
            <span>{{ $post->published_at->isoFormat('DD MMMM YYYY') }} · CS VICTORIA MM</span>
            <span>{{ \Illuminate\Support\Str::wordCount($post->plain_body) }} CUVINTE</span>
        </div>
        <div class="post-hero-inner" data-post-id="{{ $post->id }}" itemscope itemtype="https://schema.org/BlogPosting">
            <div class="post-crumb">
                <a wire:navigate href="{{ route('prima-pagina') }}">/ acasă</a> →
                <a wire:navigate href="{{ route('blog.index') }}">/ blog</a> →
                <span class="on">/ {{ \Illuminate\Support\Str::limit($post->title, 50) }}</span>
            </div>
            <h1 class="post-title" itemprop="headline">{{ $post->title }}</h1>
            <div class="post-meta">
                <span class="post-meta-item">
                    <span class="k">Publicat</span>
                    <time datetime="{{ $post->published_at->format('Y-m-d') }}" itemprop="datePublished">
                        {{ $post->published_at->isoFormat('DD MMMM YYYY') }}
                    </time>
                </span>
                <span class="post-meta-item">
                    <span class="k">Autor</span>
                    <span itemprop="author" itemscope itemtype="https://schema.org/Person">
                        <span itemprop="name">CS Victoria MM</span>
                    </span>
                </span>
                <meta itemprop="dateModified" content="{{ $post->updated_at->format('Y-m-d') }}">
            </div>
        </div>

        @if ($post->featured_image)
            <div class="post-cover">
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" width="1200" height="630" loading="eager" itemprop="image">
            </div>
        @endif
    </section>

    {{-- ============ ARTICLE BODY ============ --}}
    <article class="post-article" itemscope itemtype="https://schema.org/BlogPosting">
        <div class="post-body" itemprop="articleBody">
            {!! $post->rendered_body !!}
        </div>

        {{-- Share buttons --}}
        <div class="post-share">
            <div class="post-share-label">◆ Distribuie articolul</div>
            <div class="post-share-buttons" role="group" aria-label="Butoane distribuire">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}"
                   target="_blank" rel="noopener noreferrer" aria-label="Distribuie pe Facebook" data-share="facebook">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 7h3V3h-3a4 4 0 0 0-4 4v3H7v4h3v7h4v-7h3l1-4h-4V7Z"/></svg>
                    <span>Facebook</span>
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $post->slug)) }}"
                   target="_blank" rel="noopener noreferrer" aria-label="Distribuie pe LinkedIn" data-share="linkedin">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="1"/><line x1="8" y1="11" x2="8" y2="16"/><circle cx="8" cy="8" r="1" fill="currentColor" stroke="none"/><path d="M12 16v-5M12 13c0-1 1-2 2-2s2 1 2 2v3"/></svg>
                    <span>LinkedIn</span>
                </a>
                <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title) }} - {{ urlencode(route('blog.show', $post->slug)) }}"
                   target="_blank" rel="noopener noreferrer" aria-label="Distribuie pe WhatsApp" data-share="whatsapp">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 21l1.7-5A8.5 8.5 0 1 1 8 19.3L3 21z"/><path d="M9 9c0 0 1 4 4 5l1.5-1.5c.3-.3.7-.4 1-.2l1.5.8"/></svg>
                    <span>WhatsApp</span>
                </a>
            </div>
        </div>

        <div class="post-back">
            <a wire:navigate href="{{ route('blog.index') }}" class="btn btn-ghost">← Înapoi la blog</a>
        </div>
    </article>

    {{-- ============ RECOMMENDED ============ --}}
    @if ($recommendedPosts->isNotEmpty())
        <section class="post-related">
            <div class="section-meta">
                <span class="num">◆ ARTICOLE SIMILARE</span>
                <span>CONTINUĂ LECTURA</span>
                <span>{{ $recommendedPosts->count() }} RECOMANDĂRI</span>
            </div>
            <div class="bl-grid">
                @foreach ($recommendedPosts as $rp)
                    <article class="bl-card">
                        <a wire:navigate href="{{ route('blog.show', $rp->slug) }}" class="bl-card-link">
                            <div class="bl-card-img">
                                @if ($rp->featured_image)
                                    <img src="{{ asset('storage/' . $rp->featured_image) }}" alt="{{ $rp->title }}" loading="lazy">
                                @else
                                    <div class="ph">
                                        <span class="ph-label">◆ {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="bl-card-body">
                                <div class="bl-card-meta">
                                    <time datetime="{{ $rp->published_at->toDateString() }}">
                                        ◆ {{ $rp->published_at->isoFormat('DD MMM YYYY') }}
                                    </time>
                                </div>
                                <h3 class="bl-card-title">{{ $rp->title }}</h3>
                                <p class="bl-card-summary">{{ $rp->summary }}</p>
                                <span class="bl-card-cta">Citește<span class="arr"></span></span>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </section>
    @endif

    {{-- ============ CTA BANNER ============ --}}
    <section class="cta-banner">
        <div class="cta-grid">
            <div>
                <h2>Ți-a plăcut?<br><span>Vino în sală.</span></h2>
                <div class="sub">Sesiune probă gratuită · oricând · fără obligații</div>
            </div>
            <div style="display:flex;gap:12px;flex-wrap:wrap">
                <a class="btn" wire:navigate href="{{ route('contact') }}">Programează<span class="arr"></span></a>
                <a class="btn" wire:navigate href="{{ route('antrenamente') }}" style="background:transparent;border-color:var(--bone);color:var(--bone)">Vezi antrenamentele</a>
            </div>
        </div>
    </section>
</div>
