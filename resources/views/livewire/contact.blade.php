<div>
    {{-- ============ PAGE HERO ============ --}}
    <section class="phero">
        <div class="section-meta">
            <span class="num">◆ 06 / PAGINĂ</span>
            <span>CONTACT · PROGRAMEAZĂ-ȚI SESIUNEA DE PROBĂ</span>
            <span>RĂSPUNDEM ÎN MAX. 24H</span>
        </div>
        <div class="phero-grid">
            <div class="phero-l">
                <div class="phero-crumb">
                    <a wire:navigate href="{{ route('prima-pagina') }}">/ acasă</a> → <span class="on">/ contact</span>
                </div>
                <h1>Vorbește cu noi.<br><em>Direct.</em></h1>
                <p class="lead">
                    <strong>Sună · scrie · vino.</strong> Răspundem rapid la telefon, email și formular. Sesiunea de probă e gratuită — fără abonament, fără obligații. Spune-ne ce te interesează și stabilim ziua.
                </p>
                <div class="phero-cta">
                    <a href="tel:+40734411115" class="btn btn-red">Sună · 0734 411 115<span class="arr"></span></a>
                    <a href="#formular" class="btn btn-ghost">Trimite mesaj</a>
                </div>
            </div>
            <div class="phero-r">
                <div class="ph">
                    <img src="{{ asset('assets/Kickboxing-Baia-Mare.webp') }}" alt="CS Victoria Maramureș — antrenament" class="ph-img">
                </div>
                <div class="overlay">
                    <div style="display:flex;justify-content:flex-end">
                        <span class="chip chip-red">RĂSPUNS RAPID · 24H</span>
                    </div>
                    <div class="big-side">
                        <div>SCRIE-NE.</div>
                        <div class="stroke">VINO.</div>
                        <div><em>ANTRENEAZĂ.</em></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ MARQUEE ============ --}}
    <div class="marquee">
        <div class="marquee-track">
            <span>SESIUNI DE PROBĂ GRATUITE</span><span class="dot">◆</span>
            <span>RĂSPUNDEM ÎN 24H</span><span class="dot">◆</span>
            <span>0734 411 115</span><span class="dot">◆</span>
            <span>CSVICTORIAMM@GMAIL.COM</span><span class="dot">◆</span>
            <span>BAIA MARE · PETROVA · POIENILE DE SUB MUNTE</span><span class="dot">◆</span>
            <span>SESIUNI DE PROBĂ GRATUITE</span><span class="dot">◆</span>
            <span>RĂSPUNDEM ÎN 24H</span><span class="dot">◆</span>
            <span>0734 411 115</span><span class="dot">◆</span>
        </div>
    </div>

    {{-- ============ QUICK CONTACT ============ --}}
    <section class="qc">
        <div class="qc-grid">
            <a class="qc-cell" href="tel:+40734411115">
                <div class="k">◆ TELEFON · LUNI – SÂMBĂTĂ</div>
                <div class="v">0734<br><em>411 115</em></div>
                <div class="hint">Apel direct · cel mai rapid răspuns</div>
            </a>
            <a class="qc-cell" href="mailto:csvictoriamm@gmail.com">
                <div class="k">◆ EMAIL · 24/7</div>
                <div class="v">csvictoriamm<br><em>@gmail.com</em></div>
                <div class="hint">Răspuns în max. 24h lucrătoare</div>
            </a>
            <div class="qc-cell qc-social">
                <div class="k">◆ SOCIAL · @CSVICTORIAMM</div>
                <div class="v">DM ne ajunge<br><em>și pe social.</em></div>
                <div class="qc-icons">
                    <a href="https://www.facebook.com/victoriamaramures" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 7h3V3h-3a4 4 0 0 0-4 4v3H7v4h3v7h4v-7h3l1-4h-4V7Z"/></svg>
                    </a>
                    <a href="https://www.instagram.com/csvictoriamm" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                    </a>
                    <a href="https://www.tiktok.com/@csvictoriamm" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16 3v3.3a4.7 4.7 0 0 0 4.7 4.7V14a7.6 7.6 0 0 1-4.7-1.6v5.9a5.5 5.5 0 1 1-5.5-5.5v3a2.5 2.5 0 1 0 2.5 2.5V3Z"/></svg>
                    </a>
                    <a href="https://www.youtube.com/channel/UCFfZgsuQCT8nPSY8DvcqZhw" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="5" width="20" height="14" rx="3"/><path d="m10 9 5 3-5 3V9Z" fill="currentColor" stroke="none"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ FORM + LOCATIONS ============ --}}
    <section class="contact" id="formular">
        <div class="section-meta">
            <span class="num">◆ 02 / 04</span>
            <span>FORMULAR · TRIMITE-NE UN MESAJ</span>
            <span>VALIDAT · GDPR · 24H</span>
        </div>
        <div class="contact-grid">
            <div class="contact-form">
                <div class="cf-head">
                    <div class="tag">Formular</div>
                    <h2>Scrie-ne.<br><em>Răspundem.</em></h2>
                    <p>Completează formularul, iar noi te contactăm pentru a stabili o sesiune de probă sau pentru a-ți răspunde la întrebări.</p>
                </div>

                @if ($sent)
                    <div class="cf-success" wire:transition>
                        <div class="cf-success-mark">◆</div>
                        <div class="cf-success-body">
                            <h3>Mesaj trimis cu succes.</h3>
                            <p>Mulțumim! Te contactăm cât de repede putem — de regulă în maxim 24 de ore lucrătoare. Verifică și folder-ul de spam dacă răspunsul întârzie.</p>
                            <button type="button" class="btn btn-ghost" wire:click="resetForm">Trimite alt mesaj</button>
                        </div>
                    </div>
                @else
                    <form wire:submit="submit" class="cf-form" novalidate>
                        <div class="cf-row">
                            <label class="cf-field">
                                <span class="cf-label">Nume <em>*</em></span>
                                <input type="text" wire:model.blur="name" autocomplete="name" placeholder="Numele tău complet" maxlength="100">
                                @error('name') <span class="cf-err">{{ $message }}</span> @enderror
                            </label>
                            <label class="cf-field">
                                <span class="cf-label">Email <em>*</em></span>
                                <input type="email" wire:model.blur="email" autocomplete="email" placeholder="email@exemplu.ro" maxlength="150">
                                @error('email') <span class="cf-err">{{ $message }}</span> @enderror
                            </label>
                        </div>

                        <div class="cf-row">
                            <label class="cf-field">
                                <span class="cf-label">Telefon <small>opțional</small></span>
                                <input type="tel" wire:model.blur="phone" autocomplete="tel" placeholder="07xx xxx xxx" maxlength="30">
                                @error('phone') <span class="cf-err">{{ $message }}</span> @enderror
                            </label>
                            <label class="cf-field">
                                <span class="cf-label">Mă interesează <small>opțional</small></span>
                                <select wire:model.blur="discipline">
                                    <option value="">— alege o opțiune —</option>
                                    <option value="Freestyle Kickboxing">Freestyle Kickboxing</option>
                                    <option value="Muay Thai">Muay Thai</option>
                                    <option value="Brazilian Jiu-Jitsu">Brazilian Jiu-Jitsu</option>
                                    <option value="Fitness Funcțional">Fitness Funcțional</option>
                                    <option value="Grupa copii (6–12 ani)">Grupa copii (6–12 ani)</option>
                                    <option value="Personal training 1:1">Personal training 1:1</option>
                                    <option value="Sesiune de probă">Sesiune de probă (orice disciplină)</option>
                                    <option value="Altceva">Altceva</option>
                                </select>
                                @error('discipline') <span class="cf-err">{{ $message }}</span> @enderror
                            </label>
                        </div>

                        <label class="cf-field">
                            <span class="cf-label">Mesaj <em>*</em></span>
                            <textarea wire:model.blur="message" rows="6" placeholder="Spune-ne ce te interesează — vârstă, experiență, obiectiv, locația preferată." maxlength="2000"></textarea>
                            @error('message') <span class="cf-err">{{ $message }}</span> @enderror
                        </label>

                        <label class="cf-check">
                            <input type="checkbox" wire:model.live="gdpr">
                            <span>Sunt de acord cu prelucrarea datelor personale în scopul de a fi contactat de Club Sportiv Victoria Maramureș. Datele nu sunt partajate cu terți.</span>
                        </label>
                        @error('gdpr') <span class="cf-err">{{ $message }}</span> @enderror

                        <div class="cf-submit">
                            <button type="submit" class="btn btn-red" wire:loading.attr="disabled" wire:target="submit">
                                <span wire:loading.remove wire:target="submit">Trimite mesajul<span class="arr"></span></span>
                                <span wire:loading wire:target="submit">Se trimite...</span>
                            </button>
                            <span class="cf-note">Răspundem în maxim 24h lucrătoare.</span>
                        </div>
                    </form>
                @endif
            </div>

            <aside class="contact-side">
                <div class="cs-head">
                    <div class="tag">Locații</div>
                    <h3>Unde<br><em>ne găsești.</em></h3>
                </div>

                <article class="cs-loc">
                    <div class="cs-num"><em>◆</em> 01</div>
                    <h4>Baia Mare</h4>
                    <div class="cs-addr">str. Vasile Lucaciu · sala principală</div>
                    <div class="cs-slot"><strong>Luni · Miercuri · 18:30</strong><span>COPII</span></div>
                    <div class="cs-slot"><strong>Luni · Miercuri · 19:35</strong><span>ADULȚI</span></div>
                </article>

                <article class="cs-loc">
                    <div class="cs-num"><em>◆</em> 02</div>
                    <h4>Petrova</h4>
                    <div class="cs-addr">sala de sport · com. Petrova, MM</div>
                    <div class="cs-slot"><strong>Vineri · 18:30</strong><span>MIXT</span></div>
                </article>

                <article class="cs-loc">
                    <div class="cs-num"><em>◆</em> 03</div>
                    <h4>Poienile de sub Munte</h4>
                    <div class="cs-addr">sala de sport · com. Poienile, MM</div>
                    <div class="cs-slot"><strong>Sâmbătă · 13:00</strong><span>MIXT</span></div>
                </article>

                <div class="cs-foot">
                    <span class="mono">◆ AFILIAT FRFK</span>
                    <span class="mono">EST. 2021</span>
                </div>
            </aside>
        </div>
    </section>

    {{-- ============ FAQ (Alpine) ============ --}}
    <section class="faq">
        <div class="section-meta">
            <span class="num">◆ 03 / 04</span>
            <span>ÎNTREBĂRI DESPRE PRIMUL CONTACT</span>
            <span>04 · CELE MAI DESE</span>
        </div>
        <div class="faq-head">
            <div class="tag">Întrebări</div>
            <h2>Înainte<br>să scrii.</h2>
        </div>
        <div class="faq-list">
            <div class="faq-item" x-data="{ open: true }" :class="{ 'open': open }" @click="open = !open" role="button" tabindex="0" @keydown.enter="open = !open" @keydown.space.prevent="open = !open">
                <div class="n">Q · 01</div>
                <div>
                    <h3>Cât durează până primesc răspuns?</h3>
                    <div class="body">Sub 24h lucrătoare la email și formular. La telefon — direct, în program. Dacă scrii sâmbătă seara, te căutăm luni dimineață.</div>
                </div>
                <div class="plus">+</div>
            </div>
            <div class="faq-item" x-data="{ open: false }" :class="{ 'open': open }" @click="open = !open" role="button" tabindex="0" @keydown.enter="open = !open" @keydown.space.prevent="open = !open">
                <div class="n">Q · 02</div>
                <div>
                    <h3>Trebuie să rezerv înainte să vin la sesiunea de probă?</h3>
                    <div class="body">Da — un mesaj scurt sau un telefon ne ajută să fim pregătiți și să-ți confirmăm ziua + ora exactă. Sesiunea de probă rămâne gratuită, fără obligație.</div>
                </div>
                <div class="plus">+</div>
            </div>
            <div class="faq-item" x-data="{ open: false }" :class="{ 'open': open }" @click="open = !open" role="button" tabindex="0" @keydown.enter="open = !open" @keydown.space.prevent="open = !open">
                <div class="n">Q · 03</div>
                <div>
                    <h3>Pot înscrie copilul fără să vin eu prima dată?</h3>
                    <div class="body">Recomandăm să veniți împreună la prima sesiune — cunoști antrenorul, vezi sala și răspundem la întrebări direct. Fără presiune, fără semnături în prima zi.</div>
                </div>
                <div class="plus">+</div>
            </div>
            <div class="faq-item" x-data="{ open: false }" :class="{ 'open': open }" @click="open = !open" role="button" tabindex="0" @keydown.enter="open = !open" @keydown.space.prevent="open = !open">
                <div class="n">Q · 04</div>
                <div>
                    <h3>Ce informații e bine să adaug în mesaj?</h3>
                    <div class="body">Vârsta sportivului, experiența anterioară (dacă există), disciplina sau obiectivul tău (condiție, autoapărare, competiție) și locația preferată — Baia Mare, Petrova sau Poienile.</div>
                </div>
                <div class="plus">+</div>
            </div>
        </div>
    </section>

    {{-- ============ REVIEWS ============ --}}
    <section class="reviews">
        <div class="section-meta">
            <span class="num">◆ 04 / 04</span>
            <span>RECENZII GOOGLE · CE SPUN MEMBRII</span>
            <span>VERIFICATE · LIVE</span>
        </div>
        <div class="reviews-inner">
            <div class="elfsight-app-630db31d-36a2-4674-90a9-e4b40d06b39e" data-elfsight-app-lazy></div>
        </div>
    </section>

    {{-- ============ CTA BANNER ============ --}}
    <section class="cta-banner">
        <div class="cta-grid">
            <div>
                <h2>Ești gata?<br><span>Vino la sală.</span></h2>
                <div class="sub">Gratuit · fără abonament · fără obligații · oricând</div>
            </div>
            <div style="display:flex;gap:12px;flex-wrap:wrap">
                <a class="btn" href="tel:+40734411115">Sună · 0734 411 115<span class="arr"></span></a>
                <a class="btn" href="mailto:csvictoriamm@gmail.com" style="background:transparent;border-color:var(--bone);color:var(--bone)">Email direct</a>
            </div>
        </div>
    </section>
</div>
