<div>
    {{-- ============ PAGE HERO ============ --}}
    <section class="phero">
        <div class="section-meta">
            <span class="num">◆ 02 / PAGINĂ</span>
            <span>ECHIPA · CINE FACE VICTORIA SĂ FUNCȚIONEZE</span>
            <span>100+ SPORTIVI · {{ $athletes->count() }} ÎN PERFORMANȚĂ · 1 FAMILIE</span>
        </div>
        <div class="phero-grid">
            <div class="phero-l">
                <div class="phero-crumb">
                    <a wire:navigate href="{{ route('prima-pagina') }}">/ acasă</a> → <span class="on">/ echipa</span>
                </div>
                <h1>Oamenii din<br><em>spatele clubului.</em></h1>
                <p class="lead">
                    <strong>100+ sportivi activi, {{ $athletes->count() }} în grupa de performanță, antrenori certificați și conducere implicată.</strong> Echipa Victoria nu e doar grupa care urcă pe ring — e și conducerea, managementul și prietenii care țin clubul în picioare. Iată cine suntem.
                </p>
                <div class="phero-cta">
                    <a wire:navigate href="{{ route('contact') }}" class="btn btn-red">Vino în echipă<span class="arr"></span></a>
                    <a href="#performance" class="btn btn-ghost">Vezi grupa de performanță</a>
                </div>
            </div>
            <div class="phero-r">
                <div class="ph">
                    <img src="{{ asset('assets/csvictoriamm-colaj.webp') }}" alt="Echipa CS Victoria Maramureș" class="ph-img">
                </div>
                <div class="overlay">
                    <div style="display:flex;justify-content:flex-end">
                        <span class="chip chip-red">100+ SPORTIVI ACTIVI</span>
                    </div>
                    <div class="big-side">
                        <div>O ECHIPĂ.</div>
                        <div class="stroke">UN CLUB.</div>
                        <div><em>VICTORIA.</em></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ MARQUEE ============ --}}
    <div class="marquee">
        <div class="marquee-track">
            <span>GRUPA DE PERFORMANȚĂ</span><span class="dot">◆</span>
            <span>ANTRENORI CERTIFICAȚI FRFK</span><span class="dot">◆</span>
            <span>CONDUCERE · MANAGEMENT</span><span class="dot">◆</span>
            <span>MEMBRI DE ONOARE</span><span class="dot">◆</span>
            <span>BAIA MARE · MARAMUREȘ</span><span class="dot">◆</span>
            <span>GRUPA DE PERFORMANȚĂ</span><span class="dot">◆</span>
            <span>ANTRENORI CERTIFICAȚI FRFK</span><span class="dot">◆</span>
            <span>CONDUCERE · MANAGEMENT</span><span class="dot">◆</span>
        </div>
    </div>

    {{-- ============ FACTS ============ --}}
    <section class="facts">
        <div class="facts-grid facts-grid-6">
            <div class="fact"><div class="k">Practicanți total</div><div class="v">100<em>+</em></div></div>
            <div class="fact"><div class="k">Grupa performanță</div><div class="v">{{ str_pad((string) $athletes->count(), 2, '0', STR_PAD_LEFT) }}</div></div>
            <div class="fact"><div class="k">Antrenori</div><div class="v">02</div></div>
            <div class="fact"><div class="k">Conducere</div><div class="v">03</div></div>
            <div class="fact"><div class="k">Management</div><div class="v">02</div></div>
            <div class="fact"><div class="k">Membri onoare</div><div class="v">07<em>+</em></div></div>
        </div>
    </section>

    {{-- ============ PERFORMANCE ATHLETES ============ --}}
    <section class="athletes" id="performance">
        <div class="section-meta">
            <span class="num">◆ 02 / 04</span>
            <span>GRUPA DE PERFORMANȚĂ · SPORTIVII NOȘTRI</span>
            <span>VICTORIA · MARAMUREȘ</span>
        </div>
        <div class="ath-head">
            <div>
                <div class="tag">Cu ei ne mândrim</div>
                <h2>Grupa de<br><em>performanță.</em></h2>
            </div>
            <p>Ei sunt sportivii care duc culorile clubului pe ring și pe saltea — la cantonamente, gale și competiții naționale. Antrenament constant, atitudine corectă, rezultate.</p>
        </div>
        <div class="ath-grid">
            @foreach ($athletes as $athlete)
                <article class="ath-card">
                    <div class="ph">
                        @if ($athlete->photo_url)
                            <img src="{{ $athlete->photo_url }}" alt="{{ $athlete->name }}" class="ph-img" loading="lazy">
                        @else
                            <span class="ph-label">◆ {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        @endif
                    </div>
                    <div class="ath-body">
                        <div class="ath-num">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                        <h3>{{ $athlete->name }}</h3>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    {{-- ============ CREW (Conducere · Tehnică · Management · Onoare) ============ --}}
    <section class="crew">
        <div class="section-meta">
            <span class="num">◆ 03 / 04</span>
            <span>CONDUCERE · TEHNICĂ · MANAGEMENT · MEMBRI DE ONOARE</span>
            <span>04 GRUPURI</span>
        </div>
        <div class="crew-head">
            <div>
                <div class="tag">Coloana vertebrală</div>
                <h2>Cei care<br><em>țin totul în picioare.</em></h2>
            </div>
            <p>Dincolo de sportivi, clubul există pentru că sunt oameni care iau decizii, antrenează, organizează și sprijină. Aici sunt ei.</p>
        </div>

        <div class="crew-grid">
            <article class="crew-cell">
                <div class="crew-num">◆ 01</div>
                <div class="crew-cat">Conducere</div>
                <h3>Board-ul<br>clubului.</h3>
                <ul>
                    <li><span class="role">Președinte</span><strong>Ioan Mihalca</strong></li>
                    <li><span class="role">Vice-președinte</span><strong>Ioana Mihalca</strong></li>
                    <li><span class="role">Vice-președinte</span><strong>Andreea Mihalca</strong></li>
                </ul>
            </article>

            <article class="crew-cell">
                <div class="crew-num">◆ 02</div>
                <div class="crew-cat">Echipa tehnică</div>
                <h3>Antrenorii.</h3>
                <ul>
                    <li><span class="role">Antrenor principal</span><strong>Ioan Mihalca</strong></li>
                    <li><span class="role">Antrenor secund</span><strong>Stefan Benzar</strong></li>
                </ul>
            </article>

            <article class="crew-cell">
                <div class="crew-num">◆ 03</div>
                <div class="crew-cat">Management</div>
                <h3>Operațional.</h3>
                <ul>
                    <li><strong>Cristina Tăut</strong></li>
                    <li><strong>Andreea Mihalca</strong></li>
                </ul>
            </article>

            <article class="crew-cell">
                <div class="crew-num">◆ 04</div>
                <div class="crew-cat">Membri de onoare</div>
                <h3>Prietenii<br>clubului.</h3>
                <ul class="crew-honor">
                    <li><strong>Victor Cîmpian</strong></li>
                    <li><strong>Andrei Giurgiu</strong><span class="role">Refresh</span></li>
                    <li><strong>Alexandru Badea</strong></li>
                    <li><strong>Alin Buda</strong></li>
                    <li><strong>Călin Filip</strong></li>
                    <li><strong>Vasi Mihalca</strong></li>
                    <li><strong>Vasi Chindriș</strong></li>
                </ul>
            </article>
        </div>
    </section>

    {{-- ============ CTA BANNER ============ --}}
    <section class="cta-banner">
        <div class="cta-grid">
            <div>
                <h2>Vrei să faci<br><span>parte din echipă?</span></h2>
                <div class="sub">Sesiune probă gratuită · fără obligații · oricând</div>
            </div>
            <div style="display:flex;gap:12px;flex-wrap:wrap">
                <a class="btn" wire:navigate href="{{ route('contact') }}">Programează sesiunea<span class="arr"></span></a>
                <a class="btn" wire:navigate href="{{ route('antrenamente') }}" style="background:transparent;border-color:var(--bone);color:var(--bone)">Vezi antrenamentele</a>
            </div>
        </div>
    </section>
</div>
