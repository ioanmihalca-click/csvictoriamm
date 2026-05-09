<header class="nav"
        x-data="{ isOpen: false, scrolled: window.scrollY > 20 }"
        x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 20, { passive: true })"
        :class="{ 'scrolled': scrolled }"
        @keydown.escape.window="isOpen = false">
    <div class="nav-inner">
        <a wire:navigate href="{{ route('prima-pagina') }}" class="nav-brand">
            <img src="{{ asset('assets/CS-Victoria-Maramures.webp') }}" alt="CS Victoria Maramureș" class="nav-logo">
            <div class="nav-brand-text">Victoria<br><small>CS · MARAMUREȘ · EST. 2021</small></div>
        </a>

        <nav class="nav-links">
            <a wire:navigate href="{{ route('prima-pagina') }}" class="{{ request()->routeIs('prima-pagina') ? 'on' : '' }}">Prima pagină</a>
            <a wire:navigate href="{{ route('antrenamente') }}" class="{{ request()->routeIs('antrenamente') ? 'on' : '' }}">Antrenamente</a>
            <a wire:navigate href="{{ route('galerie') }}" class="{{ request()->routeIs('galerie') ? 'on' : '' }}">Galerie</a>
            <a wire:navigate href="{{ route('competitii') }}" class="{{ request()->routeIs('competitii') ? 'on' : '' }}">Competiții</a>
            <a wire:navigate href="{{ route('echipa') }}" class="{{ request()->routeIs('echipa') ? 'on' : '' }}">Echipa</a>
            <a wire:navigate href="{{ route('sponsori') }}" class="{{ request()->routeIs('sponsori') ? 'on' : '' }}">Sponsori</a>
            <a wire:navigate href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'on' : '' }}">Blog</a>
        </nav>

        <div class="nav-cta">
            <a href="tel:+40734411115" class="phone">+40 734 411 115</a>
            <a wire:navigate href="{{ route('contact') }}" class="btn btn-red">Sesiune probă<span class="arr"></span></a>
            <button type="button" class="nav-burger" @click="isOpen = !isOpen" :aria-expanded="isOpen" aria-label="Meniu">
                <svg x-show="!isOpen" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="square" d="M3 6h18M3 12h18M3 18h18"></path>
                </svg>
                <svg x-show="isOpen" x-cloak viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="square" d="M5 5l14 14M19 5L5 19"></path>
                </svg>
            </button>
        </div>
    </div>

    <template x-teleport="body">
        <div x-show="isOpen" x-cloak x-transition.opacity.duration.200ms class="nav-mobile" @click.self="isOpen = false">
            <a wire:navigate href="{{ route('prima-pagina') }}" @click="isOpen = false" class="{{ request()->routeIs('prima-pagina') ? 'on' : '' }}">Prima pagină<span>◆</span></a>
            <a wire:navigate href="{{ route('antrenamente') }}" @click="isOpen = false" class="{{ request()->routeIs('antrenamente') ? 'on' : '' }}">Antrenamente<span>◆</span></a>
            <a wire:navigate href="{{ route('galerie') }}" @click="isOpen = false" class="{{ request()->routeIs('galerie') ? 'on' : '' }}">Galerie<span>◆</span></a>
            <a wire:navigate href="{{ route('competitii') }}" @click="isOpen = false" class="{{ request()->routeIs('competitii') ? 'on' : '' }}">Competiții<span>◆</span></a>
            <a wire:navigate href="{{ route('echipa') }}" @click="isOpen = false" class="{{ request()->routeIs('echipa') ? 'on' : '' }}">Echipa<span>◆</span></a>
            <a wire:navigate href="{{ route('sponsori') }}" @click="isOpen = false" class="{{ request()->routeIs('sponsori') ? 'on' : '' }}">Sponsori<span>◆</span></a>
            <a wire:navigate href="{{ route('blog.index') }}" @click="isOpen = false" class="{{ request()->routeIs('blog.*') ? 'on' : '' }}">Blog<span>◆</span></a>
            <a href="tel:+40734411115" class="nav-mobile-phone">+40 734 411 115</a>
            <a wire:navigate href="{{ route('contact') }}" @click="isOpen = false" class="nav-mobile-cta">Sesiune probă gratuită</a>
        </div>
    </template>
</header>
