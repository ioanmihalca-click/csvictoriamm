<div x-data="{ isScrolled: false, isOpen: false }" x-init="window.addEventListener('scroll', () => { isScrolled = window.scrollY > 20 })"
    :class="isScrolled ? 'bg-white/95 backdrop-blur-md shadow-lg' : 'bg-white/75'"
    class="fixed top-0 left-0 z-50 w-full transition-all duration-300">

    <!-- Navigation -->
    <nav class="container flex items-center justify-between px-4 py-3 mx-auto">
        <a href="/" class="flex items-center transition-transform duration-300 hover:scale-105">
            <img src="/assets/CS-Victoria-Maramures.webp" alt="Logo CS Victoria Maramureș" class="w-auto h-20 md:h-24">
        </a>

        <!-- Hamburger menu button (visible on mobile) -->
        <button x-cloak @click="isOpen = !isOpen"
            class="relative z-50 w-10 h-10 text-gray-800 transition-colors duration-300 md:hidden hover:text-red-700 focus:outline-none">
            <svg class="absolute w-6 h-6 transition-all duration-300 ease-in-out transform top-2 left-2"
                :class="{ 'rotate-0 opacity-100': !isOpen, '-rotate-90 opacity-0': isOpen }" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
            <svg class="absolute w-6 h-6 transition-all duration-300 ease-in-out transform top-2 left-2"
                :class="{ 'rotate-90 opacity-0': !isOpen, 'rotate-0 opacity-100': isOpen }" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>


        <!-- Desktop menu -->
        <div class="hidden space-x-1 lg:space-x-2 md:flex">
            <a wire:navigate href="{{ route('prima-pagina') }}"
                class="px-3 py-2 text-base font-semibold text-gray-800 transition-all duration-300 rounded-lg hover:text-red-700 hover:bg-red-50 font-roboto-condensed lg:text-lg">
                Prima pagină
            </a>
            <a wire:navigate href="{{ route('antrenamente') }}"
                class="px-3 py-2 text-base font-semibold text-gray-800 transition-all duration-300 rounded-lg hover:text-red-700 hover:bg-red-50 font-roboto-condensed lg:text-lg">
                Antrenamente
            </a>
            <a wire:navigate href="{{ route('galerie') }}"
                class="px-3 py-2 text-base font-semibold text-gray-800 transition-all duration-300 rounded-lg hover:text-red-700 hover:bg-red-50 font-roboto-condensed lg:text-lg">
                Galerie
            </a>
            <a wire:navigate href="{{ route('competitii') }}"
                class="px-3 py-2 text-base font-semibold text-gray-800 transition-all duration-300 rounded-lg hover:text-red-700 hover:bg-red-50 font-roboto-condensed lg:text-lg">
                Competiții
            </a>
            <a wire:navigate href="{{ route('sponsori') }}"
                class="px-3 py-2 text-base font-semibold text-gray-800 transition-all duration-300 rounded-lg hover:text-red-700 hover:bg-red-50 font-roboto-condensed lg:text-lg">
                Sponsori
            </a>
            <a wire:navigate href="{{ route('blog.index') }}"
                class="px-3 py-2 text-base font-semibold text-gray-800 transition-all duration-300 rounded-lg hover:text-red-700 hover:bg-red-50 font-roboto-condensed lg:text-lg">
                Blog
            </a>
            <a wire:navigate href="{{ route('echipa') }}"
                class="px-3 py-2 text-base font-semibold text-gray-800 transition-all duration-300 rounded-lg hover:text-red-700 hover:bg-red-50 font-roboto-condensed lg:text-lg">
                Echipa
            </a>
            <a wire:navigate href="{{ route('contact') }}"
                class="px-4 py-2 text-base font-semibold text-white transition-all duration-300 bg-red-700 rounded-lg hover:bg-red-800 hover:shadow-lg font-roboto-condensed lg:text-lg">
                Contact
            </a>
        </div>
    </nav>

    <!-- Mobile menu -->
    <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4" @click.away="isOpen = false" x-cloak
        class="absolute left-0 right-0 bg-white border-t border-gray-100 shadow-xl top-full md:hidden">
        <div class="px-4 py-4 space-y-1">
            <a wire:navigate href="{{ route('prima-pagina') }}" @click="isOpen = false"
                class="flex items-center px-4 py-3 text-lg font-medium text-gray-800 transition-colors duration-200 rounded-lg hover:bg-red-50 hover:text-red-700 font-roboto-condensed">
                <i class="w-6 mr-3 fas fa-home"></i>Prima pagină
            </a>
            <a wire:navigate href="{{ route('antrenamente') }}" @click="isOpen = false"
                class="flex items-center px-4 py-3 text-lg font-medium text-gray-800 transition-colors duration-200 rounded-lg hover:bg-red-50 hover:text-red-700 font-roboto-condensed">
                <i class="w-6 mr-3 fas fa-dumbbell"></i>Antrenamente
            </a>
            <a wire:navigate href="{{ route('galerie') }}" @click="isOpen = false"
                class="flex items-center px-4 py-3 text-lg font-medium text-gray-800 transition-colors duration-200 rounded-lg hover:bg-red-50 hover:text-red-700 font-roboto-condensed">
                <i class="w-6 mr-3 fas fa-images"></i>Galerie
            </a>
            <a wire:navigate href="{{ route('competitii') }}" @click="isOpen = false"
                class="flex items-center px-4 py-3 text-lg font-medium text-gray-800 transition-colors duration-200 rounded-lg hover:bg-red-50 hover:text-red-700 font-roboto-condensed">
                <i class="w-6 mr-3 fas fa-trophy"></i>Competiții
            </a>
            <a wire:navigate href="{{ route('sponsori') }}" @click="isOpen = false"
                class="flex items-center px-4 py-3 text-lg font-medium text-gray-800 transition-colors duration-200 rounded-lg hover:bg-red-50 hover:text-red-700 font-roboto-condensed">
                <i class="w-6 mr-3 fas fa-handshake"></i>Sponsori
            </a>
            <a wire:navigate href="{{ route('blog.index') }}" @click="isOpen = false"
                class="flex items-center px-4 py-3 text-lg font-medium text-gray-800 transition-colors duration-200 rounded-lg hover:bg-red-50 hover:text-red-700 font-roboto-condensed">
                <i class="w-6 mr-3 fas fa-blog"></i>Blog
            </a>
            <a wire:navigate href="{{ route('echipa') }}" @click="isOpen = false"
                class="flex items-center px-4 py-3 text-lg font-medium text-gray-800 transition-colors duration-200 rounded-lg hover:bg-red-50 hover:text-red-700 font-roboto-condensed">
                <i class="w-6 mr-3 fas fa-users"></i>Echipa
            </a>
            <a wire:navigate href="{{ route('contact') }}" @click="isOpen = false"
                class="flex items-center px-4 py-3 mt-2 text-lg font-bold text-white transition-colors duration-200 bg-red-700 rounded-lg hover:bg-red-800 font-roboto-condensed">
                <i class="w-6 mr-3 fas fa-envelope"></i>Contact
            </a>
        </div>
    </div>

    <!-- Spacer for fixed header - included inside the single root element -->
    <div class="h-0 md:h-0"></div>
</div>
