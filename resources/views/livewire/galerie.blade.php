<div>
    {{-- ============ PAGE HERO ============ --}}
    <section class="phero">
        <div class="section-meta">
            <span class="num">◆ 05 / PAGINĂ</span>
            <span>GALERIE · DIN SALĂ · DIN RING · DIN COMPETIȚII</span>
            <span>{{ $galleryItems->count() }} IMAGINI</span>
        </div>
        <div class="phero-grid">
            <div class="phero-l">
                <div class="phero-crumb">
                    <a wire:navigate href="{{ route('prima-pagina') }}">/ acasă</a> → <span class="on">/ galerie</span>
                </div>
                <h1>Din sală.<br><em>Din ring.</em></h1>
                <p class="lead">
                    <strong>{{ $galleryItems->count() }} de momente.</strong> Antrenamente, gale, podiumuri, echipă. Fără filtre, fără pose. Doar muncă, sportivi și clubul în acțiune.
                </p>
                <div class="phero-cta">
                    <a wire:navigate href="{{ route('contact') }}" class="btn btn-red">Vino în echipă<span class="arr"></span></a>
                    <a href="#galerie-grid" class="btn btn-ghost">Vezi galeria</a>
                </div>
            </div>
            <div class="phero-r">
                <div class="ph">
                    <img src="{{ asset('assets/hero-ok.webp') }}" alt="Galerie CS Victoria Maramureș" class="ph-img">
                </div>
            </div>
        </div>
    </section>

    {{-- ============ MARQUEE ============ --}}
    <div class="marquee">
        <div class="marquee-track">
            <span>ANTRENAMENT · COMPETIȚII · GALE</span><span class="dot">◆</span>
            <span>{{ $galleryItems->count() }} IMAGINI</span><span class="dot">◆</span>
            <span>BAIA MARE · PETROVA · POIENILE</span><span class="dot">◆</span>
            <span>CLICK PE IMAGINE PENTRU ZOOM</span><span class="dot">◆</span>
            <span>ANTRENAMENT · COMPETIȚII · GALE</span><span class="dot">◆</span>
            <span>{{ $galleryItems->count() }} IMAGINI</span><span class="dot">◆</span>
        </div>
    </div>

    {{-- ============ GALLERY GRID ============ --}}
    <section class="gal" id="galerie-grid"
        x-data="{
            opened: false,
            activeUrl: null,
            index: null,
            total: {{ $galleryItems->count() }},
            open(event) {
                const t = event.currentTarget;
                this.index = parseInt(t.dataset.index);
                this.activeUrl = t.dataset.fullsize;
                this.opened = true;
            },
            close() {
                this.opened = false;
                setTimeout(() => this.activeUrl = null, 300);
            },
            goTo(i) {
                this.index = i;
                const el = document.querySelector(`#galerie-grid [data-index='${i}']`);
                if (el) this.activeUrl = el.dataset.fullsize;
            },
            next() { this.goTo(this.index >= this.total ? 1 : this.index + 1); },
            prev() { this.goTo(this.index <= 1 ? this.total : this.index - 1); }
        }"
        @keyup.right.window="opened && next()"
        @keyup.left.window="opened && prev()"
        @keydown.escape.window="opened && close()">

        <div class="section-meta">
            <span class="num">◆ 02 / 02</span>
            <span>TOATE IMAGINILE · CLICK PENTRU ZOOM</span>
            <span>NAVIGHEAZĂ CU ← →</span>
        </div>

        @if ($galleryItems->isEmpty())
            <div class="gal-empty">
                <div class="mono" style="color:var(--red);font-size:11px;letter-spacing:.2em;margin-bottom:14px">◆ GALERIE GOALĂ</div>
                <h2>Nu există imagini<br><em>încă încărcate.</em></h2>
                <p>Revino în curând — adăugăm conținut în mod regulat.</p>
            </div>
        @else
            <div class="gal-grid">
                @foreach ($galleryItems as $item)
                    <button type="button"
                        class="gal-cell"
                        @click="open"
                        data-index="{{ $loop->iteration }}"
                        data-fullsize="{{ $item->photo_url }}">
                        <img src="{{ $item->photo_url }}"
                            alt="{{ $item->alt_text ?? 'Galerie CS Victoria Maramureș' }}"
                            data-index="{{ $loop->iteration }}"
                            data-fullsize="{{ $item->photo_url }}"
                            loading="lazy">
                        <span class="gal-num">◆ {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    </button>
                @endforeach
            </div>
        @endif

        {{-- ============ LIGHTBOX ============ --}}
        <template x-teleport="body">
            <div x-show="opened"
                x-cloak
                x-transition:enter="transition ease-in-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:leave="transition ease-in-in duration-300"
                x-transition:leave-end="opacity-0"
                @click="close"
                x-trap.inert.noscroll="opened"
                class="gal-lightbox">

                <div class="gal-lb-meta">
                    <span class="mono">◆ <span x-text="index"></span> / <span x-text="items.length"></span></span>
                    <button type="button" class="gal-lb-close" @click.stop="close" aria-label="Închide">×</button>
                </div>

                <button type="button" class="gal-lb-nav gal-lb-prev"
                    @click.stop="prev" aria-label="Imaginea anterioară">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M15 5L8 12l7 7"/></svg>
                </button>

                <img x-show="opened"
                    x-transition:enter="transition ease-in-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:leave="transition ease-in-in duration-300"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="gal-lb-img"
                    :src="activeUrl"
                    alt=""
                    @click.stop>

                <button type="button" class="gal-lb-nav gal-lb-next"
                    @click.stop="next" aria-label="Imaginea următoare">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </template>
    </section>

</div>
