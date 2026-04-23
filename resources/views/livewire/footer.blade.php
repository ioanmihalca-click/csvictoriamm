<footer>
    <div class="foot-grid">
        <div>
            <div class="foot-big">CS<br>VICTORIA <em>MM</em></div>
            <p style="color:var(--mute-2);font-size:13px;max-width:380px;margin:0 0 20px">
                Club Sportiv Victoria Maramureș · înființat 2021 · afiliat Federația Română de Freestyle Kickboxing. Baia Mare · Petrova · Poienile de sub Munte.
            </p>
            <div class="foot-social">
                <a href="https://www.tiktok.com/@csvictoriamm" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16 3v3.3a4.7 4.7 0 0 0 4.7 4.7V14a7.6 7.6 0 0 1-4.7-1.6v5.9a5.5 5.5 0 1 1-5.5-5.5v3a2.5 2.5 0 1 0 2.5 2.5V3Z"/></svg>
                </a>
                <a href="https://www.youtube.com/channel/UCFfZgsuQCT8nPSY8DvcqZhw" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="5" width="20" height="14" rx="3"/><path d="m10 9 5 3-5 3V9Z" fill="currentColor" stroke="none"/></svg>
                </a>
                <a href="https://www.facebook.com/victoriamaramures" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 7h3V3h-3a4 4 0 0 0-4 4v3H7v4h3v7h4v-7h3l1-4h-4V7Z"/></svg>
                </a>
                <a href="https://www.instagram.com/csvictoriamm" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                </a>
            </div>
        </div>
        <div>
            <h4>Navigare</h4>
            <ul>
                <li><a wire:navigate href="{{ route('prima-pagina') }}">Prima pagină</a></li>
                <li><a wire:navigate href="{{ route('antrenamente') }}">Antrenamente</a></li>
                <li><a wire:navigate href="{{ route('galerie') }}">Galerie</a></li>
                <li><a wire:navigate href="{{ route('competitii') }}">Competiții</a></li>
                <li><a wire:navigate href="{{ route('echipa') }}">Echipa</a></li>
                <li><a wire:navigate href="{{ route('sponsori') }}">Sponsori</a></li>
                <li><a wire:navigate href="{{ route('blog.index') }}">Blog</a></li>
            </ul>
        </div>
        <div>
            <h4>Locații</h4>
            <ul>
                <li><strong style="color:var(--bone);font-family:'Oswald',sans-serif;font-size:16px">Baia Mare</strong></li>
                <li style="color:var(--mute-2);font-size:12px">Str. Vasile Lucaciu</li>
                <li style="color:var(--mute-2);font-size:12px">Luni & Miercuri · 18:30 / 19:35</li>
                <li style="height:10px"></li>
                <li><strong style="color:var(--bone);font-family:'Oswald',sans-serif;font-size:16px">Petrova</strong></li>
                <li style="color:var(--mute-2);font-size:12px">Sala de sport · Vineri · 18:30</li>
                <li style="height:10px"></li>
                <li><strong style="color:var(--bone);font-family:'Oswald',sans-serif;font-size:16px">Poienile de sub Munte</strong></li>
                <li style="color:var(--mute-2);font-size:12px">Sala de sport · Sâmbătă · 13:00</li>
            </ul>
        </div>
        <div>
            <h4>Contact</h4>
            <ul>
                <li><a href="tel:+40734411115">+40 734 411 115</a></li>
                <li><a href="mailto:csvictoriamm@gmail.com">csvictoriamm@gmail.com</a></li>
                <li><a wire:navigate href="{{ route('contact') }}">Formular contact</a></li>
            </ul>
        </div>
    </div>
    <div class="foot-bottom">
        <span>◆ CS VICTORIA MM · 2021 — {{ date('Y') }} · MARAMUREȘ</span>
        <span>Design · <a href="https://clickstudios-digital.com" target="_blank" rel="noopener noreferrer" style="color:var(--red)">Click Studios Digital</a></span>
    </div>
</footer>
