<footer class="relative pt-16 pb-8 bg-gray-900">
    <!-- Decorative top border -->
    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-red-900 via-red-600 to-red-900"></div>

    <div class="container px-4 mx-auto">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-4">
            <!-- Brand Section -->
            <div class="text-center lg:text-left">
                <a href="/" class="inline-block mb-6">
                    <img src="/assets/CS-Victoria-Maramures.webp" alt="Logo CS Victoria Maramureș"
                        class="w-auto h-20 mx-auto lg:mx-0">
                </a>
                <p class="mb-6 text-gray-400">
                    Clubul Sportiv Victoria Maramureș - promovăm sportul de performanță și sportul pentru toți în Baia
                    Mare și Maramureș.
                </p>
                <!-- Social Media Links -->
                <div class="flex justify-center space-x-4 lg:justify-start">
                    <a href="https://www.tiktok.com/@csvictoriamm" target="_blank" rel="noopener noreferrer"
                        class="flex items-center justify-center w-10 h-10 text-gray-400 transition-all duration-300 bg-gray-800 rounded-full hover:bg-red-700 hover:text-white hover:scale-110">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UCFfZgsuQCT8nPSY8DvcqZhw" target="_blank"
                        rel="noopener noreferrer"
                        class="flex items-center justify-center w-10 h-10 text-gray-400 transition-all duration-300 bg-gray-800 rounded-full hover:bg-red-700 hover:text-white hover:scale-110">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="https://www.facebook.com/victoriamaramures" target="_blank" rel="noopener noreferrer"
                        class="flex items-center justify-center w-10 h-10 text-gray-400 transition-all duration-300 bg-gray-800 rounded-full hover:bg-red-700 hover:text-white hover:scale-110">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/csvictoriamm" target="_blank" rel="noopener noreferrer"
                        class="flex items-center justify-center w-10 h-10 text-gray-400 transition-all duration-300 bg-gray-800 rounded-full hover:bg-red-700 hover:text-white hover:scale-110">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="text-center lg:text-left">
                <h3 class="mb-6 text-lg font-bold text-white">Link-uri Rapide</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('prima-pagina') }}"
                            class="text-gray-400 transition-colors duration-300 hover:text-red-400">
                            <i class="mr-2 text-xs fas fa-chevron-right"></i>Prima pagină
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('antrenamente') }}"
                            class="text-gray-400 transition-colors duration-300 hover:text-red-400">
                            <i class="mr-2 text-xs fas fa-chevron-right"></i>Antrenamente
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('galerie') }}"
                            class="text-gray-400 transition-colors duration-300 hover:text-red-400">
                            <i class="mr-2 text-xs fas fa-chevron-right"></i>Galerie
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('competitii') }}"
                            class="text-gray-400 transition-colors duration-300 hover:text-red-400">
                            <i class="mr-2 text-xs fas fa-chevron-right"></i>Competiții
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blog.index') }}"
                            class="text-gray-400 transition-colors duration-300 hover:text-red-400">
                            <i class="mr-2 text-xs fas fa-chevron-right"></i>Blog
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Information -->
            <div class="text-center lg:text-left">
                <h3 class="mb-6 text-lg font-bold text-white">Contact</h3>
                <ul class="space-y-4">
                    <li class="flex items-start justify-center lg:justify-start">
                        <div
                            class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-1 bg-gray-800 rounded-full">
                            <i class="text-red-500 fas fa-map-marker-alt"></i>
                        </div>
                        <div class="ml-4 text-left">
                            <p class="text-gray-400">Str. Vasile Lucaciu</p>
                            <p class="text-gray-400">Baia Mare, Maramureș</p>
                        </div>
                    </li>
                    <li class="flex items-center justify-center lg:justify-start">
                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-gray-800 rounded-full">
                            <i class="text-red-500 fas fa-phone"></i>
                        </div>
                        <div class="ml-4">
                            <a href="tel:0734411115"
                                class="text-gray-400 transition-colors duration-300 hover:text-red-400">0734 411 115</a>
                        </div>
                    </li>
                    <li class="flex items-center justify-center lg:justify-start">
                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-gray-800 rounded-full">
                            <i class="text-red-500 fas fa-envelope"></i>
                        </div>
                        <div class="ml-4">
                            <a href="mailto:csvictoriamm@gmail.com"
                                class="text-gray-400 transition-colors duration-300 hover:text-red-400">csvictoriamm@gmail.com</a>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Training Locations -->
            <div class="text-center lg:text-left">
                <h3 class="mb-6 text-lg font-bold text-white">Locații Antrenamente</h3>
                <ul class="space-y-4">
                    <li class="flex items-start justify-center lg:justify-start">
                        <div
                            class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-1 bg-gray-800 rounded-full">
                            <i class="text-red-500 fas fa-dumbbell"></i>
                        </div>
                        <div class="ml-4 text-left">
                            <p class="font-semibold text-white">Baia Mare</p>
                            <p class="text-sm text-gray-400">Luni & Miercuri, 18:30 & 19:35</p>
                        </div>
                    </li>
                    <li class="flex items-start justify-center lg:justify-start">
                        <div
                            class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-1 bg-gray-800 rounded-full">
                            <i class="text-red-500 fas fa-dumbbell"></i>
                        </div>
                        <div class="ml-4 text-left">
                            <p class="font-semibold text-white">Petrova</p>
                            <p class="text-sm text-gray-400">Vineri, 18:30 - Grupa mixtă</p>
                        </div>
                    </li>
                    <li class="flex items-start justify-center lg:justify-start">
                        <div
                            class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-1 bg-gray-800 rounded-full">
                            <i class="text-red-500 fas fa-dumbbell"></i>
                        </div>
                        <div class="ml-4 text-left">
                            <p class="font-semibold text-white">Poienile de sub Munte</p>
                            <p class="text-sm text-gray-400">Sâmbătă, 13:00 - Grupa mixtă</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <div class="h-px my-12 bg-gray-800"></div>

        <!-- Bottom Footer -->
        <div class="flex flex-col items-center justify-between space-y-4 md:flex-row md:space-y-0">
            <p class="text-sm text-center text-gray-500 md:text-left">
                &copy; {{ date('Y') }} <span class="font-semibold text-gray-400">CS Victoria MM</span>. Toate
                drepturile rezervate.
            </p>
            <p class="text-sm text-center text-gray-500 md:text-right">
                Website dezvoltat de
                <a href="https://clickstudios-digital.com" target="_blank" rel="noopener noreferrer"
                    class="font-semibold text-red-500 transition-colors duration-300 hover:text-red-400">
                    Click Studios Digital
                </a>
            </p>
        </div>
    </div>
</footer>
