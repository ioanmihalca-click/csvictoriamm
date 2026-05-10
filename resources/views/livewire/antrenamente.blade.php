<div>
    @php
        $sezonStart = now()->month >= 9 ? now()->year : now()->year - 1;
        $sezon = $sezonStart.'/'.substr((string) ($sezonStart + 1), -2);
    @endphp
    {{-- ============ PAGE HERO ============ --}}
    <section class="phero">
        <div class="section-meta">
            <span class="num">◆ 01 / PAGINĂ</span>
            <span>ANTRENAMENTE · KICKBOX · MUAY THAI · BJJ · FITNESS FUNCȚIONAL</span>
            <span>BAIA MARE · PETROVA · POIENILE DE SUB MUNTE</span>
        </div>
        <div class="phero-grid">
            <div class="phero-l">
                <div class="phero-crumb">
                    <a wire:navigate href="{{ route('prima-pagina') }}">/ acasă</a> → <span class="on">/ antrenamente</span>
                </div>
                <h1>Antrenament.<br><em>Fără scurtături.</em></h1>
                <p class="lead">
                    <strong>4 discipline · 3 locații · 100+ sportivi activi.</strong> Programe pentru copii, juniori și adulți, predate de antrenori certificați, afiliați Federației Române de Freestyle Kickboxing. Fiecare sesiune e construită pe repetiție, tehnică și respect.
                </p>
                <div class="phero-cta">
                    <a wire:navigate href="{{ route('contact') }}" class="btn btn-red">Rezervă sesiune gratuită<span class="arr"></span></a>
                    <a href="#orar" class="btn btn-ghost">Vezi orarul complet</a>
                </div>
            </div>
            <div class="phero-r">
                <div class="ph">
                    <img src="{{ asset('assets/hero-ok.webp') }}" alt="Antrenamente CS Victoria Maramureș" class="ph-img">
                </div>
            </div>
        </div>
    </section>

    {{-- ============ MARQUEE ============ --}}
    <div class="marquee">
        <div class="marquee-track">
            <span>SESIUNI DE PROBĂ GRATUITE</span><span class="dot">◆</span>
            <span>COPII 6+</span><span class="dot">◆</span>
            <span>ADULȚI · JUNIORI</span><span class="dot">◆</span>
            <span>KICKBOX · MUAY THAI · BJJ · FITNESS</span><span class="dot">◆</span>
            <span>BAIA MARE · PETROVA · POIENILE DE SUB MUNTE</span><span class="dot">◆</span>
            <span>SESIUNI DE PROBĂ GRATUITE</span><span class="dot">◆</span>
            <span>COPII 6+</span><span class="dot">◆</span>
            <span>ADULȚI · JUNIORI</span><span class="dot">◆</span>
            <span>KICKBOX · MUAY THAI · BJJ · FITNESS</span><span class="dot">◆</span>
        </div>
    </div>

    {{-- ============ FACTS ============ --}}
    <section class="facts">
        <div class="facts-grid">
            <div class="fact"><div class="k">Disciplinele</div><div class="v">04</div></div>
            <div class="fact"><div class="k">Sesiuni / săpt</div><div class="v">06</div></div>
            <div class="fact"><div class="k">Vârsta minimă</div><div class="v">06 <em>ani</em></div></div>
            <div class="fact"><div class="k">Sportivi activi</div><div class="v">100<em>+</em></div></div>
            <div class="fact"><div class="k">Probă · cost</div><div class="v">00 <em>RON</em></div></div>
        </div>
    </section>

    {{-- ============ PROGRAMS ============ --}}
    <section class="programs">
        <div class="section-meta">
            <span class="num">◆ 02 / 05</span>
            <span>PROGRAME · CE ANTRENĂM</span>
            <span>04 DISCIPLINE · NIVEL ÎNCEPĂTOR → AVANSAT</span>
        </div>
        <div class="prog-head">
            <div>
                <div class="tag">Disciplinele</div>
                <h2>Programele<br><em>noastre.</em></h2>
            </div>
            <p>Fiecare program e construit în jurul a trei lucruri: tehnica corectă, condiția fizică și atitudinea potrivită. Lucrăm diferențiat pe grupe de vârstă și nivel — fără lecții copy-paste.</p>
        </div>

        <div class="prog-list">
            <article class="prog-row">
                <div class="idx"><div class="cat">STAND-UP</div><div class="n">01</div></div>
                <div class="title-col">
                    <div>
                        <div class="kind">◆ STRIKING · FULL CONTACT</div>
                        <h3>Freestyle<br>Kickboxing</h3>
                    </div>
                    <div class="tags"><span class="t">6–12 ani</span><span class="t">13+</span><span class="t">adulți</span><span class="t">competiție</span></div>
                </div>
                <div class="desc-col">
                    <p>Box, lovituri de picior, combinații și libertate tehnică. Bază pentru toți sportivii care vor competiție sau doar un stand-up solid.</p>
                    <ul>
                        <li><strong>Durată</strong><span>60–85 min</span></li>
                        <li><strong>Frecvență</strong><span>2×/săpt</span></li>
                        <li><strong>Nivel</strong><span>Începător → avansat</span></li>
                        <li><strong>Echipament</strong><span>Mănuși · bandaj · ș. b.</span></li>
                    </ul>
                </div>
                <div class="meta-col">
                    <div class="price">BM<small>· Baia Mare · Luni/Mie</small></div>
                    <a wire:navigate href="{{ route('contact') }}" class="btn btn-red">Programează<span class="arr"></span></a>
                </div>
            </article>

            <article class="prog-row">
                <div class="idx"><div class="cat">STAND-UP</div><div class="n">02</div></div>
                <div class="title-col">
                    <div>
                        <div class="kind">◆ STRIKING · CLINCH · ARTĂ DE 8 MEMBRE</div>
                        <h3>Muay<br>Thai</h3>
                    </div>
                    <div class="tags"><span class="t">13+</span><span class="t">adulți</span><span class="t">intermediari+</span></div>
                </div>
                <div class="desc-col">
                    <p>„Arta celor opt membre": pumni, picioare, genunchi, coate. Clinch, condiție și tehnică sudată prin repetiție thailandeză clasică.</p>
                    <ul>
                        <li><strong>Durată</strong><span>90 min</span></li>
                        <li><strong>Frecvență</strong><span>2×/săpt</span></li>
                        <li><strong>Nivel</strong><span>Intermediar+</span></li>
                        <li><strong>Echipament</strong><span>Mănuși · tibiere</span></li>
                    </ul>
                </div>
                <div class="meta-col">
                    <div class="price">BM<small>· Baia Mare · integrat</small></div>
                    <a wire:navigate href="{{ route('contact') }}" class="btn btn-red">Programează<span class="arr"></span></a>
                </div>
            </article>

            <article class="prog-row">
                <div class="idx"><div class="cat">GRAPPLING</div><div class="n">03</div></div>
                <div class="title-col">
                    <div>
                        <div class="kind">◆ LUPTĂ LA SOL · CONTROL · SUBMISIE</div>
                        <h3>Brazilian<br>Jiu-Jitsu</h3>
                    </div>
                    <div class="tags"><span class="t">juniori</span><span class="t">adulți</span><span class="t">gi + no-gi</span></div>
                </div>
                <div class="desc-col">
                    <p>Controlul prin tehnică, nu prin forță. Poziții, tranziții, submisii — știința care transformă diferența de forță într-un detaliu irelevant.</p>
                    <ul>
                        <li><strong>Durată</strong><span>90 min</span></li>
                        <li><strong>Frecvență</strong><span>1–2×/săpt</span></li>
                        <li><strong>Nivel</strong><span>Toate nivelurile</span></li>
                        <li><strong>Echipament</strong><span>Gi sau rash guard</span></li>
                    </ul>
                </div>
                <div class="meta-col">
                    <div class="price">BM<small>· Baia Mare · integrat</small></div>
                    <a wire:navigate href="{{ route('contact') }}" class="btn btn-red">Programează<span class="arr"></span></a>
                </div>
            </article>

            <article class="prog-row">
                <div class="idx"><div class="cat">CONDIȚIE</div><div class="n">04</div></div>
                <div class="title-col">
                    <div>
                        <div class="kind">◆ CORP ÎNTREG · FORȚĂ · AGILITATE</div>
                        <h3>Fitness<br>Funcțional</h3>
                    </div>
                    <div class="tags"><span class="t">începători</span><span class="t">intermediari</span><span class="t">avansați</span><span class="t">grup + 1:1</span></div>
                </div>
                <div class="desc-col">
                    <p>45–60 min pentru corp întreg — forță, rezistență, agilitate și mobilitate. Sesiuni în grup sau personal, adaptate obiectivelor tale.</p>
                    <ul>
                        <li><strong>Durată</strong><span>45–60 min</span></li>
                        <li><strong>Frecvență</strong><span>2–3×/săpt</span></li>
                        <li><strong>Nivel</strong><span>Toate nivelurile</span></li>
                        <li><strong>Format</strong><span>Grup sau 1:1</span></li>
                    </ul>
                </div>
                <div class="meta-col">
                    <div class="price">BM<small>· la cerere</small></div>
                    <a wire:navigate href="{{ route('contact') }}" class="btn btn-red">Programează<span class="arr"></span></a>
                </div>
            </article>
        </div>
    </section>

    <div class="caution"></div>

    {{-- ============ WEEK GRID ============ --}}
    <section class="week" id="orar">
        <div class="section-meta" style="background:var(--bone);color:#525252;border-bottom:1px solid #d4d4d4">
            <span class="num" style="color:var(--red)">◆ 03 / 05</span>
            <span>ORAR VIZUAL · SĂPTĂMÂNAL</span>
            <span>SEZON · {{ $sezon }}</span>
        </div>
        <div class="week-head">
            <div>
                <div class="tag">Săptămâna ta</div>
                <h2>Orar<br><em>vizual.</em></h2>
            </div>
            <p>Uite toată săptămâna. Luni și miercuri la Baia Mare, vineri în Petrova, sâmbătă în Poienile de sub Munte. Culoarea roșie = sesiuni de striking; negru = grupe mixte și fitness.</p>
        </div>
        <div class="week-grid">
            <div class="h">Ora</div>
            <div class="h">Luni</div>
            <div class="h">Marți</div>
            <div class="h">Miercuri</div>
            <div class="h">Joi</div>
            <div class="h">Vineri</div>
            <div class="h">Sâmbătă</div>

            <div class="time-lbl">13:00</div>
            <div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>
            <div class="cell active"><strong>Grupă mixtă</strong><span>Poienile · toate vârstele</span></div>

            <div class="time-lbl">18:30</div>
            <div class="cell active red"><strong>Kickbox · Copii</strong><span>BM · 6–12 ani</span></div>
            <div class="cell"></div>
            <div class="cell active red"><strong>Kickbox · Copii</strong><span>BM · 6–12 ani</span></div>
            <div class="cell"></div>
            <div class="cell active"><strong>Grupă mixtă</strong><span>Petrova</span></div>
            <div class="cell"></div>

            <div class="time-lbl">19:35</div>
            <div class="cell active red"><strong>Kickbox + MT</strong><span>BM · adulți · jr. mari</span></div>
            <div class="cell"></div>
            <div class="cell active red"><strong>Kickbox + MT</strong><span>BM · adulți · jr. mari</span></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
        </div>
    </section>

    {{-- ============ METHOD ============ --}}
    <section class="method">
        <div class="section-meta">
            <span class="num">◆ 04 / 05</span>
            <span>METODĂ · CUM ARATĂ O SESIUNE</span>
            <span>90 MIN · 5 FAZE</span>
        </div>
        <div class="method-grid">
            <div class="method-l">
                <div class="tag">Structura sesiunii</div>
                <h2>Același cadru.<br><em>Rezultate reale.</em></h2>
                <p>
                    Orice sesiune la Victoria urmează aceeași structură — ca să progresezi constant, nu în salturi aleatorii. <strong>Încălzirea e obligatorie.</strong> Tehnica vine înaintea vitezei. Sparringul e controlat, supravegheat, niciodată pripit.
                </p>
                <p>
                    Antrenorul corectează individual, nu doar anunță exerciții. La final, feedback scurt — ce ai făcut bine, ce lucrezi data viitoare.
                </p>
            </div>
            <div class="method-r">
                <div class="m-step"><div class="n">01</div><div><h3>Încălzire dinamică</h3><p>Mobilitate, cardio ușor, pregătirea articulațiilor.</p></div><div class="dur">10 MIN</div></div>
                <div class="m-step"><div class="n">02</div><div><h3>Tehnică · drills</h3><p>Un subiect pe sesiune — repetiție, corectare, repetiție.</p></div><div class="dur">25 MIN</div></div>
                <div class="m-step"><div class="n">03</div><div><h3>Combinații · padwork</h3><p>Aplicarea tehnicii la țintă, cu partener sau antrenor.</p></div><div class="dur">25 MIN</div></div>
                <div class="m-step"><div class="n">04</div><div><h3>Sparring controlat</h3><p>Intensitate adaptată nivelului. Supravegheat îndeaproape.</p></div><div class="dur">15 MIN</div></div>
                <div class="m-step"><div class="n">05</div><div><h3>Condiție · cool-down</h3><p>Forță specifică, abdomen, stretching. Feedback individual.</p></div><div class="dur">15 MIN</div></div>
            </div>
        </div>
    </section>

    {{-- ============ FAQ (Alpine) ============ --}}
    <section class="faq">
        <div class="section-meta">
            <span class="num">◆ 05 / 05</span>
            <span>ÎNTREBĂRI FRECVENTE</span>
            <span>06 · CELE MAI DESE</span>
        </div>
        <div class="faq-head">
            <div class="tag">Întrebări</div>
            <h2>Ce ne întreabă<br>oamenii.</h2>
        </div>
        <div class="faq-list">
            <div class="faq-item" x-data="{ open: true }" :class="{ 'open': open }" @click="open = !open" role="button" tabindex="0" @keydown.enter="open = !open" @keydown.space.prevent="open = !open">
                <div class="n">Q · 01</div>
                <div>
                    <h3>Trebuie să am experiență înainte să vin?</h3>
                    <div class="body">Nu. Majoritatea membrilor au început de la zero. Prima sesiune e de observație și acomodare — te obișnuiești cu sala, cu ritmul și cu antrenorul. De la a doua începi tehnica de bază.</div>
                </div>
                <div class="plus">+</div>
            </div>
            <div class="faq-item" x-data="{ open: false }" :class="{ 'open': open }" @click="open = !open" role="button" tabindex="0" @keydown.enter="open = !open" @keydown.space.prevent="open = !open">
                <div class="n">Q · 02</div>
                <div>
                    <h3>De la ce vârstă pot veni copiii?</h3>
                    <div class="body">Primim copii de la 6 ani. Grupa copii (6–12 ani) lucrează separat de adulți, cu metode adaptate — joc, coordonare, tehnică de bază, fără sparring adevărat.</div>
                </div>
                <div class="plus">+</div>
            </div>
            <div class="faq-item" x-data="{ open: false }" :class="{ 'open': open }" @click="open = !open" role="button" tabindex="0" @keydown.enter="open = !open" @keydown.space.prevent="open = !open">
                <div class="n">Q · 03</div>
                <div>
                    <h3>Cât costă o sesiune de probă?</h3>
                    <div class="body">0 RON. Organizăm sesiuni de probă gratuite în fiecare zi în care avem antrenament. Suni sau scrii, stabilim ziua, și vii.</div>
                </div>
                <div class="plus">+</div>
            </div>
            <div class="faq-item" x-data="{ open: false }" :class="{ 'open': open }" @click="open = !open" role="button" tabindex="0" @keydown.enter="open = !open" @keydown.space.prevent="open = !open">
                <div class="n">Q · 04</div>
                <div>
                    <h3>De ce echipament am nevoie la început?</h3>
                    <div class="body">La prima sesiune — doar haine sport și apă. Dacă rămâi, îți recomandăm mănuși și bandaj (te ghidăm noi). Pentru BJJ — gi sau rash guard, după caz.</div>
                </div>
                <div class="plus">+</div>
            </div>
            <div class="faq-item" x-data="{ open: false }" :class="{ 'open': open }" @click="open = !open" role="button" tabindex="0" @keydown.enter="open = !open" @keydown.space.prevent="open = !open">
                <div class="n">Q · 05</div>
                <div>
                    <h3>Voi face sparring din prima?</h3>
                    <div class="body">Nu. Sparringul e controlat și se introduce gradual, după ce stăpânești tehnica de bază. Siguranța ta și a partenerilor e pe primul loc.</div>
                </div>
                <div class="plus">+</div>
            </div>
            <div class="faq-item" x-data="{ open: false }" :class="{ 'open': open }" @click="open = !open" role="button" tabindex="0" @keydown.enter="open = !open" @keydown.space.prevent="open = !open">
                <div class="n">Q · 06</div>
                <div>
                    <h3>Pot veni doar pentru condiție fizică, fără competiție?</h3>
                    <div class="body">Absolut. Cei mai mulți membri vin pentru sport, condiție și comunitate. Competiția e opțiunea celor care și-o doresc și sunt pregătiți.</div>
                </div>
                <div class="plus">+</div>
            </div>
        </div>
    </section>

    {{-- ============ CTA BANNER ============ --}}
    <section class="cta-banner" id="cta">
        <div class="cta-grid">
            <div>
                <h2>Ai întrebări?<br><span>Vino la o sesiune.</span></h2>
                <div class="sub">Gratuit · fără abonament · fără obligații · oricând</div>
            </div>
            <div style="display:flex;gap:12px;flex-wrap:wrap">
                <a class="btn" href="tel:+40734411115">Sună · 0734 411 115<span class="arr"></span></a>
                <a class="btn" wire:navigate href="{{ route('contact') }}" style="background:transparent;border-color:var(--bone);color:var(--bone)">Formular contact</a>
            </div>
        </div>
    </section>
</div>
