 <header class="top-0 left-0 z-50 w-full bg-white bg-opacity-75 shadow">


     <!-- Navigation -->
     <nav x-data="{ isOpen: false }" class="top-0 left-0 z-50 w-full bg-white bg-opacity-95">

         <div class="container flex items-center justify-between px-4 py-2 mx-auto">
             <a href="/" class="flex items-center">
                 <img src="/assets/CS-Victoria-Maramures.webp" alt="Logo Click Music" class="w-auto h-28">
             </a>
             <!-- Hamburger menu button (visible on mobile) -->
             <button x-cloak @click="isOpen = !isOpen" class="relative w-8 h-8 text-black md:hidden">
                 <svg class="absolute w-8 h-8 transition-all duration-300 ease-in-out transform"
                     :class="{ 'rotate-0 opacity-100': !isOpen, '-rotate-90 opacity-0': isOpen }" fill="none"
                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                     </path>
                 </svg>
                 <svg class="absolute w-8 h-8 transition-all duration-300 ease-in-out transform"
                     :class="{ 'rotate-90 opacity-0': !isOpen, 'rotate-0 opacity-100': isOpen }" fill="none"
                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                     </path>
                 </svg>
             </button>


             <!-- Desktop menu -->
             <div class="hidden space-x-8 md:flex">
                 <a wire:navigate href="{{ route('prima-pagina') }}"
                     class="text-lg font-semibold text-black hover:text-red-900 font-roboto-condensed">Prima pagină
                 </a>
                 <a wire:navigate href="{{ route('antrenamente') }}"
                     class="text-lg font-semibold text-black hover:text-red-900 font-roboto-condensed">Antrenamente</a>
                 <a wire:navigate href="{{ route('galerie') }}"
                     class="text-lg font-semibold text-black hover:text-red-900 font-roboto-condensed">Galerie</a
                     wire:navigate>
                 <a wire:navigate href="{{ route('competitii') }}"
                     class="text-lg font-semibold text-black hover:text-red-900 font-roboto-condensed">Competitii</a
                     wire:navigate>
                 <a wire:navigate href="{{ route('sponsori') }}"
                     class="text-lg font-semibold text-black hover:text-red-900 font-roboto-condensed">Sponsori</a
                     wire:navigate>
                 <a wire:navigate href="{{ route('blog.index') }}"
                     class="text-lg font-semibold text-black hover:text-red-900 font-roboto-condensed">Blog</a
                     wire:navigate>
                 <a wire:navigate href="{{ route('echipa') }}"
                     class="text-lg font-semibold text-black hover:text-red-900 font-roboto-condensed">Echipa</a
                     wire:navigate>
                 <a wire:navigate href="{{ route('contact') }}"
                     class="text-lg font-semibold text-black hover:text-red-900 font-roboto-condensed">Contact</a>
             </div>
         </div>

         <!-- Mobile menu -->
         <div x-show="isOpen" @click.away="isOpen = false" x-cloak class="md:hidden">
             <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                 <a wire:navigate href="{{ route('prima-pagina') }}" @click="isOpen = false"
                     class="block px-3 py-2 text-lg text-black font-roboto-condensed">Prima pagină</a>
                 <a wire:navigate href="{{ route('antrenamente') }}" @click="isOpen = false"
                     class="block px-3 py-2 text-lg text-black font-roboto-condensed">Antrenamente</a wire:navigate>
                 <a wire:navigate href="{{ route('galerie') }}" @click="isOpen = false"
                     class="block px-3 py-2 text-lg text-black font-roboto-condensed">Galerie</a wire:navigate>
                 <a wire:navigate href="{{ route('competitii') }}" @click="isOpen = false"
                     class="block px-3 py-2 text-lg text-black font-roboto-condensed">Competitii</a wire:navigate>
                 <a wire:navigate href="{{ route('sponsori') }}" @click="isOpen = false"
                     class="block px-3 py-2 text-lg text-black font-roboto-condensed">Sponsori</a wire:navigate>
                 <a wire:navigate href="{{ route('blog.index') }}" @click="isOpen = false"
                     class="block px-3 py-2 text-lg text-black font-roboto-condensed">Blog</a wire:navigate>
                 <a wire:navigate href="{{ route('echipa') }}" @click="isOpen = false"
                     class="block px-3 py-2 text-lg text-black font-roboto-condensed">Echipa</a wire:navigate>
                 <a wire:navigate href="{{ route('contact') }}" @click="isOpen = false"
                     class="block px-3 py-2 text-lg text-black font-roboto-condensed">Contact</a>
             </div>
         </div>
     </nav>


 </header>
