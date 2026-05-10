<div>
    {{-- ============ PAGE HERO ============ --}}
    <section class="phero">
        <div class="section-meta">
            <span class="num">◆ 07 / PAGINĂ</span>
            <span>BLOG · COMPETIȚII · REZULTATE · EVENIMENTE</span>
            <span>{{ $posts->total() }} ARTICOLE</span>
        </div>
        <div class="phero-grid">
            <div class="phero-l">
                <div class="phero-crumb">
                    <a wire:navigate href="{{ route('prima-pagina') }}">/ acasă</a> → <span class="on">/ blog</span>
                </div>
                <h1>Cuvinte<br><em>din ring.</em></h1>
                <p class="lead">
                    <strong>Rezultate, competiții, evenimente.</strong> Tot ce se întâmplă în jurul clubului — cupe naționale, campionate, seminarii și pregătirea sportivilor pentru sezonul următor. Direct de la sursă.
                </p>
                <div class="phero-cta">
                    <a wire:navigate href="{{ route('contact') }}" class="btn btn-red">Vino în sală<span class="arr"></span></a>
                    @if ($posts->isNotEmpty())
                        <a href="#articole" class="btn btn-ghost">Citește articolele</a>
                    @endif
                </div>
            </div>
            <div class="phero-r">
                <div class="ph">
                    <img src="{{ asset('assets/hero-ok.webp') }}" alt="Blog CS Victoria Maramureș" class="ph-img">
                </div>
            </div>
        </div>
    </section>

    {{-- ============ MARQUEE ============ --}}
    <div class="marquee">
        <div class="marquee-track">
            <span>COMPETIȚII · CUPE NAȚIONALE</span><span class="dot">◆</span>
            <span>REZULTATE · MEDALII</span><span class="dot">◆</span>
            <span>EVENIMENTE · SEMINARII</span><span class="dot">◆</span>
            <span>PALMARES · SPORTIVII NOȘTRI</span><span class="dot">◆</span>
            <span>COMPETIȚII · CUPE NAȚIONALE</span><span class="dot">◆</span>
            <span>REZULTATE · MEDALII</span><span class="dot">◆</span>
            <span>EVENIMENTE · SEMINARII</span><span class="dot">◆</span>
        </div>
    </div>

    {{-- ============ POSTS LIST ============ --}}
    <section class="blog-list" id="articole">
        <div class="section-meta">
            <span class="num">◆ 02 / 02</span>
            <span>TOATE ARTICOLELE · ORDINE CRONOLOGICĂ</span>
            <span>PAGINA {{ $posts->currentPage() }} / {{ $posts->lastPage() }}</span>
        </div>

        @if ($posts->isEmpty())
            <div class="bl-empty">
                <div class="mono" style="color:var(--red);font-size:11px;letter-spacing:.2em;margin-bottom:14px">◆ ARHIVĂ GOALĂ</div>
                <h2>Nu există articole<br><em>publicate încă.</em></h2>
                <p>Revino în curând — pregătim primele articole.</p>
            </div>
        @else
            <div class="bl-grid">
                @foreach ($posts as $post)
                    <article class="bl-card">
                        <a wire:navigate href="{{ route('blog.show', $post->slug) }}" class="bl-card-link">
                            <div class="bl-card-img">
                                @if ($post->featured_image)
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" loading="lazy">
                                @else
                                    <div class="ph">
                                        <span class="ph-label">◆ {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="bl-card-body">
                                <div class="bl-card-meta">
                                    <time datetime="{{ $post->published_at->toDateString() }}" itemprop="datePublished">
                                        ◆ {{ $post->published_at->isoFormat('DD MMM YYYY') }}
                                    </time>
                                    <span class="bl-card-num">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                </div>
                                <h2 class="bl-card-title" itemprop="headline">{{ $post->title }}</h2>
                                <p class="bl-card-summary" itemprop="description">{{ $post->summary }}</p>
                                <span class="bl-card-cta">Citește articolul<span class="arr"></span></span>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>

            <div class="bl-pagination">
                {{ $posts->links() }}
            </div>
        @endif
    </section>

</div>
