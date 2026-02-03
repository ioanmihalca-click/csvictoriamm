<div class="bg-gray-50">
    <!-- Hero Section -->
    <section class="relative py-24 bg-center bg-cover md:py-32"
        style="background-image: url('/assets/unsplash-image.webp')">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 via-gray-900/60 to-transparent"></div>
        <div class="container relative z-10 px-4 mx-auto">
            <div class="max-w-3xl">
                <span
                    class="inline-block px-4 py-2 mb-6 text-sm font-bold tracking-wider text-white uppercase bg-red-700 rounded-full">
                    Antrenamente în Baia Mare
                </span>
                <h1 class="mb-6 text-5xl font-bold leading-tight text-white md:text-6xl font-roboto-condensed">
                    Freestyle Kickboxing &<br>
                    <span class="text-red-400">Muay Thai</span>
                </h1>
                <p class="max-w-2xl mb-8 text-xl text-gray-200">
                    Antrenamente pentru toate vârstele și nivelurile în Baia-Mare, Poienile de sub Munte și Petrova.
                    Descoperă puterea artelor marțiale alături de instructori certificați.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#orar"
                        class="inline-flex items-center px-8 py-4 text-lg font-bold text-white transition-all duration-300 bg-red-700 rounded-lg hover:bg-red-800 hover:scale-105 hover:shadow-lg">
                        <i class="mr-2 fas fa-calendar-alt"></i>
                        Vezi Orarul
                    </a>
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center px-8 py-4 text-lg font-bold text-red-700 transition-all duration-300 bg-white rounded-lg hover:bg-gray-100 hover:scale-105">
                        <i class="mr-2 fas fa-envelope"></i>
                        Contactează-ne
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="py-16">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-12 text-center">
                <span class="text-sm font-bold tracking-wider text-red-700 uppercase">Ce oferim</span>
                <h2 class="mt-2 text-4xl font-bold text-gray-900 md:text-5xl font-roboto-condensed">Antrenamente de
                    Freestyle Kickboxing</h2>
                <div class="w-24 h-1 mx-auto mt-4 bg-red-700 rounded"></div>
            </div>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                <!-- Coloana stângă -->
                <div class="space-y-6">
                    <div
                        class="p-8 transition-all duration-300 bg-white shadow-lg rounded-2xl hover:shadow-xl hover:-translate-y-1">
                        <div class="flex items-center justify-center w-16 h-16 mb-6 bg-red-100 rounded-xl">
                            <i class="text-3xl text-red-700 fas fa-fist-raised"></i>
                        </div>
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Freestyle Kickboxing</h3>
                        <p class="mb-4 leading-relaxed text-gray-600">Freestyle Kickboxing este o formă de arte marțiale
                            care combină tehnici de box și lovituri cu piciorul. Acest stil de luptă este caracterizat
                            de libertatea și creativitatea luptătorilor în a folosi diverse tehnici și mișcări pentru
                            a-și învinge adversarii.</p>
                        <p class="leading-relaxed text-gray-600">Deși este similar cu alte stiluri de arte marțiale,
                            precum kickboxingul și Muay Thai, Freestyle Kickboxing permite luptătorilor să-și dezvolte
                            propriul stil și să experimenteze cu diverse tehnici și strategii.</p>
                    </div>

                    <div class="overflow-hidden shadow-lg rounded-2xl">
                        <img src="/assets/Kickboxing-Baia-Mare.webp" alt="Kickboxing în Baia Mare"
                            class="object-cover w-full h-64">
                    </div>
                </div>

                <!-- Coloana dreaptă -->
                <div class="space-y-6">
                    <div class="overflow-hidden shadow-lg rounded-2xl">
                        <img src="/assets/antrenamente.webp" alt="Antrenamente Kickboxing"
                            class="object-cover w-full h-64">
                    </div>

                    <div
                        class="p-8 transition-all duration-300 bg-white shadow-lg rounded-2xl hover:shadow-xl hover:-translate-y-1">
                        <div class="flex items-center justify-center w-16 h-16 mb-6 bg-red-100 rounded-xl">
                            <i class="text-3xl text-red-700 fas fa-users"></i>
                        </div>
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Pentru Copii și Adulți</h3>
                        <p class="leading-relaxed text-gray-600">Freestyle Kickboxing este practicat în scopuri
                            recreative și de fitness, dar și în competiții sportive, inclusiv în evenimente
                            profesioniste. La Clubul Sportiv Victoria Maramureș, oferim programe adaptate pentru toate
                            vârstele și nivelurile.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Orar Section -->
    <section id="orar" class="py-16 bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-12 text-center">
                <span class="text-sm font-bold tracking-wider text-red-700 uppercase">Program</span>
                <h2 class="mt-2 text-4xl font-bold text-gray-900 md:text-5xl font-roboto-condensed">Orar Antrenamente
                </h2>
                <div class="w-24 h-1 mx-auto mt-4 bg-red-700 rounded"></div>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Baia Mare -->
                <div
                    class="overflow-hidden transition-all duration-300 bg-white shadow-lg rounded-2xl hover:shadow-xl hover:-translate-y-2">
                    <div class="p-6 text-white bg-gradient-to-r from-red-900 to-red-700">
                        <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-white/20">
                            <i class="text-3xl fas fa-map-marker-alt"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-center">Baia Mare</h3>
                        <p class="mt-2 text-center text-red-100">Str. Vasile Lucaciu</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-start p-4 rounded-lg bg-gray-50">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-red-100 rounded-full">
                                <i class="text-red-700 fas fa-child"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold text-gray-900">Grupa Copii</h4>
                                <p class="text-gray-600">6-12 ani</p>
                                <p class="mt-1 font-semibold text-red-700">Luni & Miercuri, 18:30</p>
                            </div>
                        </div>
                        <div class="flex items-start p-4 rounded-lg bg-gray-50">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-red-100 rounded-full">
                                <i class="text-red-700 fas fa-user"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold text-gray-900">Grupa Adulți & Juniori Mari</h4>
                                <p class="text-gray-600">13+ ani</p>
                                <p class="mt-1 font-semibold text-red-700">Luni & Miercuri, 19:35</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Petrova -->
                <div
                    class="overflow-hidden transition-all duration-300 bg-white shadow-lg rounded-2xl hover:shadow-xl hover:-translate-y-2">
                    <div class="p-6 text-white bg-gradient-to-r from-gray-800 to-gray-600">
                        <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-white/20">
                            <i class="text-3xl fas fa-map-marker-alt"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-center">Petrova</h3>
                        <p class="mt-2 text-center text-gray-200">Sala de sport</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-start p-4 rounded-lg bg-gray-50">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-gray-200 rounded-full">
                                <i class="text-gray-700 fas fa-users"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold text-gray-900">Grupa Mixtă</h4>
                                <p class="text-gray-600">Toate vârstele</p>
                                <p class="mt-1 font-semibold text-red-700">Vineri, 18:30</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Poienile de sub Munte -->
                <div
                    class="overflow-hidden transition-all duration-300 bg-white shadow-lg rounded-2xl hover:shadow-xl hover:-translate-y-2">
                    <div class="p-6 text-white bg-gradient-to-r from-gray-800 to-gray-600">
                        <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-white/20">
                            <i class="text-3xl fas fa-map-marker-alt"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-center">Poienile de sub Munte</h3>
                        <p class="mt-2 text-center text-gray-200">Sala de sport</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-start p-4 rounded-lg bg-gray-50">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-gray-200 rounded-full">
                                <i class="text-gray-700 fas fa-users"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold text-gray-900">Grupa Mixtă</h4>
                                <p class="text-gray-600">Toate vârstele</p>
                                <p class="mt-1 font-semibold text-red-700">Sâmbătă, 13:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instructor Section -->
    <section class="py-16 bg-gray-900">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                <div class="flex items-center justify-center">
                    <div class="relative">
                        <div class="absolute inset-0 transform bg-red-600 rounded-2xl rotate-3 opacity-30"></div>
                        <img src="https://res.cloudinary.com/dadjiwkkf/image/upload/v1727107335/antrenamente_bcsnj1.jpg"
                            alt="Antrenor Ioan Mihalca" class="relative shadow-2xl rounded-2xl">
                    </div>
                </div>

                <div class="text-white">
                    <span class="text-sm font-bold tracking-wider text-red-400 uppercase">Instructor</span>
                    <h2 class="mt-2 text-4xl font-bold md:text-5xl font-roboto-condensed">Ioan Mihalca</h2>
                    <div class="w-24 h-1 mt-4 bg-red-600 rounded"></div>

                    <p class="mt-6 text-lg text-gray-300">Fondator și antrenor principal al Clubului Sportiv Victoria
                        Maramureș, cu o experiență de peste 10 ani în domeniul artelor marțiale și al fitness-ului
                        funcțional.</p>

                    <div class="mt-8 space-y-4">
                        <h3 class="text-xl font-bold">Certificări:</h3>

                        <div class="flex items-start p-4 bg-white/10 rounded-xl backdrop-blur-sm">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-red-600 rounded-full">
                                <i class="fas fa-certificate"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold">Instructor Sportiv</h4>
                                <p class="text-gray-400">Asociația Internațională Jissen Do</p>
                            </div>
                        </div>

                        <div class="flex items-start p-4 bg-white/10 rounded-xl backdrop-blur-sm">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-red-600 rounded-full">
                                <i class="fas fa-dumbbell"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold">Fitness & Functional Fitness</h4>
                                <p class="text-gray-400">Fitness Education School</p>
                            </div>
                        </div>

                        <div class="flex items-start p-4 bg-white/10 rounded-xl backdrop-blur-sm">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-red-600 rounded-full">
                                <i class="fas fa-belt"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold">Freestyle Kickboxing Centură Neagră 2 Dan</h4>
                                <p class="text-gray-400">Federația Română de Freestyle Kickboxing (FRFK)</p>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('echipa') }}"
                        class="inline-flex items-center mt-8 text-lg font-semibold text-red-400 transition-colors duration-300 hover:text-red-300">
                        Vezi întreaga echipă
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitness Functional Section -->
    <section class="py-16 bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-12 text-center">
                <span class="text-sm font-bold tracking-wider text-red-700 uppercase">Fitness</span>
                <h2 class="mt-2 text-4xl font-bold text-gray-900 md:text-5xl font-roboto-condensed">Fitness Funcțional
                    în Baia Mare</h2>
                <div class="w-24 h-1 mx-auto mt-4 bg-red-700 rounded"></div>
            </div>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                <div class="space-y-6">
                    <div class="p-8 transition-all duration-300 shadow-lg bg-gray-50 rounded-2xl hover:shadow-xl">
                        <div class="flex items-center justify-center w-16 h-16 mb-6 bg-red-100 rounded-xl">
                            <i class="text-3xl text-red-700 fas fa-heartbeat"></i>
                        </div>
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Pregătire Personalizată</h3>
                        <p class="leading-relaxed text-gray-600">La Clubul Sportiv Victoria Maramureș, programele
                            noastre de Fitness Funcțional sunt concepute pentru a satisface nevoile tuturor, de la
                            amatori de sport și mișcare până la atleți de elită. Oferim pregătire fizică adaptată și
                            personalizată.</p>
                    </div>

                    <div class="p-8 transition-all duration-300 shadow-lg bg-gray-50 rounded-2xl hover:shadow-xl">
                        <div class="flex items-center justify-center w-16 h-16 mb-6 bg-red-100 rounded-xl">
                            <i class="text-3xl text-red-700 fas fa-clock"></i>
                        </div>
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Sesiuni Full-Body</h3>
                        <p class="leading-relaxed text-gray-600">Sesiunile noastre full-body, cu durata de 45-60 de
                            minute, sunt concepute special pentru a lucra întregul corp și a accelera procesul de
                            slăbire și tonifiere. Pe lângă dezvoltarea forței și rezistenței, vei îmbunătăți
                            semnificativ coordonarea motorie și agilitatea.</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="p-8 transition-all duration-300 bg-red-900 shadow-lg rounded-2xl hover:shadow-xl">
                        <h3 class="flex items-center mb-6 text-2xl font-bold text-white">
                            <i class="mr-3 fas fa-star"></i>
                            Beneficii
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-start text-white">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-8 h-8 mr-4 rounded-full bg-white/20">
                                    <i class="text-sm fas fa-check"></i>
                                </div>
                                <span>Îmbunătățirea condiției fizice și mentale</span>
                            </li>
                            <li class="flex items-start text-white">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-8 h-8 mr-4 rounded-full bg-white/20">
                                    <i class="text-sm fas fa-check"></i>
                                </div>
                                <span>Dezvoltarea forței, rezistenței, agilității și flexibilității</span>
                            </li>
                            <li class="flex items-start text-white">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-8 h-8 mr-4 rounded-full bg-white/20">
                                    <i class="text-sm fas fa-check"></i>
                                </div>
                                <span>Accelerarea procesului de slăbire și tonifiere</span>
                            </li>
                            <li class="flex items-start text-white">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-8 h-8 mr-4 rounded-full bg-white/20">
                                    <i class="text-sm fas fa-check"></i>
                                </div>
                                <span>Îmbunătățirea coordonării motorii și agilității</span>
                            </li>
                            <li class="flex items-start text-white">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-8 h-8 mr-4 rounded-full bg-white/20">
                                    <i class="text-sm fas fa-check"></i>
                                </div>
                                <span>Reducerea stresului și creșterea stimei de sine</span>
                            </li>
                        </ul>
                    </div>

                    <div
                        class="p-8 text-center text-white shadow-lg bg-gradient-to-r from-gray-800 to-gray-700 rounded-2xl">
                        <h3 class="mb-4 text-2xl font-bold">Pentru Cine?</h3>
                        <p class="text-lg text-gray-200">Indiferent de nivelul tău de formă fizică sau de obiectivele
                            pe care le ai, clasele de grup și antrenamentele personale de Fitness Funcțional sunt
                            potrivite pentru oricine dorește să-și îmbunătățească calitatea vieții și performanțele
                            fizice.</p>
                        <a href="{{ route('contact') }}"
                            class="inline-flex items-center px-6 py-3 mt-6 font-bold text-gray-800 transition-all duration-300 bg-white rounded-lg hover:bg-gray-100 hover:scale-105">
                            Programează o ședință de probă
                            <i class="ml-2 fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-red-900">
        <div class="px-4 mx-auto text-center max-w-7xl sm:px-6 lg:px-8">
            <h2 class="mb-4 text-4xl font-bold text-white md:text-5xl font-roboto-condensed">Începe călătoria ta
                astăzi!</h2>
            <p class="max-w-2xl mx-auto mb-8 text-xl text-red-100">Organizăm sesiuni de probă gratuite în fiecare zi.
                Vino să ne cunoști și să descoperi beneficiile artelor marțiale și ale fitness-ului funcțional.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center px-8 py-4 text-lg font-bold text-red-900 transition-all duration-300 bg-white rounded-lg hover:bg-gray-100 hover:scale-105 hover:shadow-lg">
                    <i class="mr-2 fas fa-calendar-check"></i>
                    Rezervă o ședință
                </a>
                <a href="tel:0734411115"
                    class="inline-flex items-center px-8 py-4 text-lg font-bold text-white transition-all duration-300 border-2 border-white rounded-lg hover:bg-white hover:text-red-900">
                    <i class="mr-2 fas fa-phone"></i>
                    Sună acum
                </a>
            </div>
        </div>
    </section>
</div>
