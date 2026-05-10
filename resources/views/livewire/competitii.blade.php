<div>
    {{-- ============ PAGE HERO ============ --}}
    <section class="phero">
        <div class="section-meta">
            <span class="num">◆ 03 / PAGINĂ</span>
            <span>COMPETIȚII · GALE · CUPE · TURNEE</span>
            <span>{{ $total }} EVENIMENTE · {{ count($years) }} ANI</span>
        </div>
        <div class="phero-grid">
            <div class="phero-l">
                <div class="phero-crumb">
                    <a wire:navigate href="{{ route('prima-pagina') }}">/ acasă</a> → <span class="on">/ competiții</span>
                </div>
                <h1>Pe ring.<br><em>Pe podium.</em></h1>
                <p class="lead">
                    <strong>{{ $total }} competiții · {{ count($years) }} ani · zeci de medalii.</strong> Sportivii Victoria au urcat pe ring la gale și turnee naționale și internaționale. Fiecare meci e o lecție — fiecare medalie, o consecință a antrenamentului constant.
                </p>
                <div class="phero-cta">
                    <a wire:navigate href="{{ route('contact') }}" class="btn btn-red">Vino la performanță<span class="arr"></span></a>
                    @if (count($years))
                        <a href="#an-{{ $years[0] }}" class="btn btn-ghost">Vezi anul {{ $years[0] }}</a>
                    @endif
                </div>
            </div>
            <div class="phero-r">
                <div class="ph">
                    <img src="{{ asset('assets/Kickboxing-Baia-Mare.webp') }}" alt="Competiții CS Victoria Maramureș" class="ph-img">
                </div>
                <div class="overlay">
                    <div style="display:flex;justify-content:flex-end">
                        <span class="chip chip-red">PALMARES · LIVE</span>
                    </div>
                    <div class="big-side">
                        <div>VICTORIA</div>
                        <div class="stroke">PE</div>
                        <div><em>RING.</em></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ MARQUEE ============ --}}
    <div class="marquee">
        <div class="marquee-track">
            <span>GALE NAȚIONALE</span><span class="dot">◆</span>
            <span>CUPE INTERNAȚIONALE</span><span class="dot">◆</span>
            <span>FREESTYLE KICKBOXING</span><span class="dot">◆</span>
            <span>MEDALII · PODIUMURI</span><span class="dot">◆</span>
            <span>VICTORIA · MARAMUREȘ</span><span class="dot">◆</span>
            <span>GALE NAȚIONALE</span><span class="dot">◆</span>
            <span>CUPE INTERNAȚIONALE</span><span class="dot">◆</span>
            <span>FREESTYLE KICKBOXING</span><span class="dot">◆</span>
        </div>
    </div>

    {{-- ============ FACTS ============ --}}
    <section class="facts">
        <div class="facts-grid facts-grid-4">
            <div class="fact"><div class="k">Competiții total</div><div class="v">{{ str_pad((string) $total, 2, '0', STR_PAD_LEFT) }}</div></div>
            <div class="fact"><div class="k">Ani de palmares</div><div class="v">{{ str_pad((string) count($years), 2, '0', STR_PAD_LEFT) }}</div></div>
            <div class="fact"><div class="k">Sportivi prezenți</div><div class="v">21<em>+</em></div></div>
            <div class="fact"><div class="k">Categorii</div><div class="v">GALE<em>·</em>CUPE</div></div>
        </div>
    </section>

    {{-- ============ YEAR INDEX ============ --}}
    @if (count($years) > 1)
        <section class="year-index">
            <div class="yi-inner">
                <div class="yi-label">◆ NAVIGHEAZĂ PE AN</div>
                <div class="yi-list">
                    @foreach ($byYear as $year => $items)
                        <a href="#an-{{ $year }}">
                            <span class="yr">{{ $year }}</span>
                            <span class="ct">{{ str_pad((string) $items->count(), 2, '0', STR_PAD_LEFT) }} <small>evenimente</small></span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ============ COMPETITIONS BY YEAR ============ --}}
    @forelse ($byYear as $year => $yearCompetitions)
        <section class="comp-year" id="an-{{ $year }}">
            <div class="cy-head">
                <div class="cy-h-l">
                    <div class="cy-tag">◆ Sezon {{ $year }}</div>
                    <div class="cy-yr">{{ $year }}</div>
                </div>
                <div class="cy-h-r">
                    <div class="cy-count">{{ str_pad((string) $yearCompetitions->count(), 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="cy-count-l">{{ $yearCompetitions->count() === 1 ? 'eveniment' : 'evenimente' }}</div>
                </div>
            </div>

            <div class="comp-list">
                @foreach ($yearCompetitions as $competition)
                    <x-competition-schema :competition="$competition" />

                    <article class="comp-row" itemscope itemtype="https://schema.org/SportsEvent">
                        <div class="comp-img">
                            @if ($competition->image_url)
                                <img src="{{ $competition->image_url }}" alt="{{ $competition->title }}" loading="lazy" itemprop="image">
                            @else
                                <div class="ph">
                                    <span class="ph-label">◆ {{ \Carbon\Carbon::parse($competition->date)->format('d.m') }}</span>
                                </div>
                            @endif
                            <div class="comp-img-overlay">
                                <span class="chip chip-red">{{ \Carbon\Carbon::parse($competition->date)->isoFormat('MMM YYYY') }}</span>
                            </div>
                        </div>

                        <div class="comp-body">
                            <div class="comp-meta">
                                <time datetime="{{ \Carbon\Carbon::parse($competition->date)->format('Y-m-d') }}" itemprop="startDate" class="comp-date">
                                    {{ \Carbon\Carbon::parse($competition->date)->isoFormat('DD MMMM YYYY') }}
                                </time>
                                <span class="comp-loc" itemprop="location" itemscope itemtype="https://schema.org/Place">
                                    ◆ <span itemprop="name">{{ $competition->location }}</span>
                                </span>
                            </div>
                            <h2 class="comp-title" itemprop="name">{{ $competition->title }}</h2>

                            <div class="comp-desc" itemprop="description">
                                {!! $competition->description !!}
                            </div>

                            @if ($competition->results)
                                <div class="comp-results">
                                    <div class="cr-label">◆ Rezultate</div>
                                    <div class="cr-body">
                                        {!! $competition->results !!}
                                    </div>
                                </div>
                            @endif

                            @if ($competition->notes)
                                <div class="comp-notes">
                                    {!! $competition->notes !!}
                                </div>
                            @endif

                            @if ($competition->details_url)
                                <a href="{{ $competition->details_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-ghost comp-cta">
                                    Vezi detalii<span class="arr"></span>
                                </a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @empty
        <section class="comp-empty">
            <div class="ce-inner">
                <div class="mono" style="color:var(--red);font-size:11px;letter-spacing:.2em;margin-bottom:14px">◆ ARHIVĂ GOALĂ</div>
                <h2>Nu există competiții<br><em>înregistrate încă.</em></h2>
                <p>Revino în curând — sezonul de competiții urmează.</p>
            </div>
        </section>
    @endforelse

    {{-- ============ CTA BANNER ============ --}}
    <section class="cta-banner">
        <div class="cta-grid">
            <div>
                <h2>Vrei să concurezi<br><span>pentru Victoria?</span></h2>
                <div class="sub">Grupa de performanță · cantonament · gale · cupe</div>
            </div>
            <div style="display:flex;gap:12px;flex-wrap:wrap">
                <a class="btn" wire:navigate href="{{ route('contact') }}">Programează<span class="arr"></span></a>
                <a class="btn" wire:navigate href="{{ route('echipa') }}" style="background:transparent;border-color:var(--bone);color:var(--bone)">Vezi grupa</a>
            </div>
        </div>
    </section>
</div>
