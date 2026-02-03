<div>
    <!-- Hero Section -->
    <section class="relative min-h-[85vh] bg-center bg-cover flex items-center"
        style="background-image: url('assets/unsplash-image.webp')">
        <div class="absolute inset-0 bg-gray-900/25"></div>
        <div class="container relative z-10 px-4 py-16 mx-auto">
            <div class="max-w-2xl p-2 shadow-2xl bg-black/35 backdrop-blur-sm rounded-2xl">
                <h1
                    class="mb-6 text-4xl font-bold leading-tight text-white md:text-7xl font-roboto-condensed animate-fade-in-up">
                    Club Sportiv <br>
                    Victoria Maramureș
                </h1>

                <h2 class="max-w-2xl mb-8 text-xl font-medium leading-relaxed text-white md:text-2xl">
                    Promovăm sportul de
                    <span class="font-bold text-red-500">performanță</span> și sportul pentru toți în Baia-Mare, Poienile
                    de
                    sub Munte și Petrova. Antrenamente de
                    <span class="font-bold text-red-500">Kickboxing & Muay Thai</span>, <span
                        class="font-bold text-red-500">BJJ</span> și Fitness Funcțional în Baia Mare |
                    Grupe de copii și adulți.
                </h2>



                <div class="flex flex-col gap-6 sm:flex-row sm:items-center">
                    <a href="#despre-noi"
                        class="inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-300 bg-red-700 rounded-lg hover:bg-red-800 hover:scale-105 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-red-500/50">
                        Descoperă mai multe
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </a>

                    <div class="flex items-center space-x-6">
                        <a href="https://www.tiktok.com/@csvictoriamm" target="_blank" rel="noopener noreferrer"
                            class="text-white transition-all duration-300 hover:text-red-700 hover:scale-110">
                            <i class="fa-brands fa-tiktok fa-2x"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCFfZgsuQCT8nPSY8DvcqZhw" target="_blank"
                            rel="noopener noreferrer"
                            class="text-white transition-all duration-300 hover:text-red-700 hover:scale-110">
                            <i class="fa-brands fa-youtube fa-2x"></i>
                        </a>
                        <a href="https://www.facebook.com/victoriamaramures" target="_blank" rel="noopener noreferrer"
                            class="text-white transition-all duration-300 hover:text-red-700 hover:scale-110">
                            <i class="fa-brands fa-facebook fa-2x"></i>
                        </a>
                        <a href="https://www.instagram.com/csvictoriamm" target="_blank" rel="noopener noreferrer"
                            class="text-white transition-all duration-300 hover:text-red-700 hover:scale-110">
                            <i class="fa-brands fa-instagram fa-2x"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Scroll indicator -->
        <div class="absolute transform -translate-x-1/2 bottom-8 left-1/2 animate-bounce">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3">
                </path>
            </svg>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-red-900">
        <div class="container px-4 mx-auto">
            <div class="grid grid-cols-2 gap-8 md:grid-cols-4">
                <div class="text-center">
                    <div class="text-4xl font-bold text-white md:text-5xl font-roboto-condensed">5+</div>
                    <div class="mt-2 text-red-200">Ani de experiență</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-white md:text-5xl font-roboto-condensed">100+</div>
                    <div class="mt-2 text-red-200">Sportivi activi</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-white md:text-5xl font-roboto-condensed">3</div>
                    <div class="mt-2 text-red-200">Locații</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-white md:text-5xl font-roboto-condensed">100+</div>
                    <div class="mt-2 text-red-200">Medalii câștigate</div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col gap-12 lg:flex-row lg:gap-16">
                <!-- Coloana stângă (imagini) -->
                <div class="w-full lg:w-2/5">
                    <div x-data="{ currentImage: 0 }" class="sticky top-24">
                        <div class="relative overflow-hidden bg-white shadow-2xl rounded-2xl aspect-square">
                            <img src="/assets/antrenamente.webp" alt="Antrenamente Kickbox Baia Mare" width="800"
                                height="800" loading="eager"
                                class="absolute inset-0 object-cover w-full h-full transition-all duration-700 ease-in-out"
                                :class="{
                                    'opacity-100 scale-100': currentImage === 0,
                                    'opacity-0 scale-105': currentImage ===
                                        1
                                }">
                            <img src="/assets/antrenamente-copii.webp" alt="Antrenamente Kickbox Baia Mare pentru copii"
                                width="800" height="800" loading="lazy"
                                class="absolute inset-0 object-cover w-full h-full transition-all duration-700 ease-in-out"
                                :class="{
                                    'opacity-100 scale-100': currentImage === 1,
                                    'opacity-0 scale-105': currentImage ===
                                        0
                                }">

                            <!-- Image overlay gradient -->
                            <div
                                class="absolute inset-0 pointer-events-none bg-gradient-to-t from-black/30 to-transparent">
                            </div>
                        </div>

                        <div class="flex flex-col justify-center mt-6 space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                            <button @click="currentImage = 0"
                                class="px-6 py-3 text-sm font-semibold transition-all duration-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-800"
                                :class="{
                                    'bg-red-900 text-white shadow-lg': currentImage === 0,
                                    'bg-white text-gray-700 hover:bg-gray-100 shadow': currentImage !== 0
                                }">
                                <i class="mr-2 fas fa-user"></i>Antrenamente Adulți
                            </button>
                            <button @click="currentImage = 1"
                                class="px-6 py-3 text-sm font-semibold transition-all duration-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-800"
                                :class="{
                                    'bg-red-900 text-white shadow-lg': currentImage === 1,
                                    'bg-white text-gray-700 hover:bg-gray-100 shadow': currentImage !== 1
                                }">
                                <i class="mr-2 fas fa-child"></i>Antrenamente Copii
                            </button>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-3/5">
                    <div class="mb-8">
                        <span class="text-sm font-bold tracking-wider text-red-700 uppercase">Despre Clubul
                            Nostru</span>
                        <h2 class="mt-2 text-4xl font-bold text-gray-900 md:text-5xl font-roboto-condensed"
                            id="despre-noi">Despre noi</h2>
                        <div class="w-24 h-1 mt-4 bg-red-700 rounded"></div>
                    </div>

                    <div class="space-y-6 text-lg leading-relaxed text-gray-700" x-data="{ expanded: false }">
                        <p class="text-xl"><strong class="text-gray-900">Clubul Sportiv Victoria Maramureș</strong> a
                            fost înființat în
                            2021 și își desfășoară activitatea în Baia Mare, Poienile de Sub Munte și Petrova, având
                            scopul de a promova sportul și un stil de viață sănătos în comunitatea locală.</p>
                        <p class="text-xl">Ceea ce a început ca un club mic, pasionat de artele marțiale, a evoluat
                            rapid într-o comunitate puternică de atleți dedicați, cuprinzând atât copii, cât și adulți.
                        </p>
                        <div x-show="expanded" x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 transform -translate-y-4"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                            <p class="mb-4 text-xl">Suntem afiliați ai <strong>Federației Române de Freestyle
                                    Kickboxing</strong> și participăm anual la competiții naționale și internaționale.
                                Am câștigat multe medalii și trofee prețioase, dar cea mai mare realizare a noastră
                                rămâne impactul pozitiv asupra vieților tinerilor și adulților care s-au alăturat
                                clubului de-a lungul timpului.</p>
                            <p class="mb-4 text-xl">Clubul nostru promovează valorile <strong>respectului</strong> și
                                ale <strong>disciplinei personale.</strong></p>
                            <p class="mb-4 text-xl">Suntem profesioniști dedicați, cu experiență în domeniu și
                                certificări naționale relevante. Ne concentrăm pe furnizarea celor mai bune sesiuni de
                                antrenament pentru toți membrii clubului, indiferent de vârstă sau nivel.</p>
                            <p class="mb-4 text-xl">Promovăm <strong>kickboxingul</strong> de
                                <strong>performanță</strong> și <strong>sportul pentru toți</strong>, promovând în
                                comunitatea noastră un stil de viață mai sănătos și activ prin antrenamente de
                                autoapărare. Ne găsești în Baia-Mare, Poienile de sub Munte și Petrova.
                            </p>
                            <p class="mb-4 text-xl">Organizăm sesiuni de probă gratuite în fiecare zi.</p>
                        </div>
                        <button @click="expanded = !expanded"
                            class="inline-flex items-center px-6 py-3 mt-4 text-white transition-all duration-300 bg-red-900 rounded-lg hover:bg-red-800 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-red-500/50 group">
                            <span x-text="expanded ? 'Citește mai puțin' : 'Citește mai mult'"></span>
                            <svg class="w-4 h-4 ml-2 transition-transform duration-300"
                                :class="{ 'rotate-180': expanded }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Schedule Card -->
                    <div class="mt-12 overflow-hidden bg-white shadow-xl rounded-2xl">
                        <div class="p-6 bg-gradient-to-r from-red-900 to-red-800">
                            <h3 class="flex items-center text-2xl font-bold text-white">
                                <i class="mr-3 fas fa-calendar-alt"></i>Orar Antrenamente
                            </h3>
                        </div>
                        <div class="p-6 space-y-6">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-red-100 rounded-full">
                                    <i class="text-red-700 fas fa-map-marker-alt"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold text-gray-900">Baia Mare</h4>
                                    <ul class="mt-2 space-y-2 text-gray-600">
                                        <li class="flex items-center">
                                            <i class="mr-2 text-red-600 fas fa-clock"></i>
                                            Luni și Miercuri, 18:30 - Grupa copii (6-12 ani)
                                        </li>
                                        <li class="flex items-center">
                                            <i class="mr-2 text-red-600 fas fa-clock"></i>
                                            Luni și Miercuri, 19:35 - Grupa adulți și juniori mari
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="h-px bg-gray-200"></div>

                            <div class="flex items-start space-x-4">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-red-100 rounded-full">
                                    <i class="text-red-700 fas fa-map-marker-alt"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold text-gray-900">Petrova</h4>
                                    <p class="flex items-center mt-2 text-gray-600">
                                        <i class="mr-2 text-red-600 fas fa-clock"></i>
                                        Vineri, 18:30 - Grupa mixtă
                                    </p>
                                </div>
                            </div>

                            <div class="h-px bg-gray-200"></div>

                            <div class="flex items-start space-x-4">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-red-100 rounded-full">
                                    <i class="text-red-700 fas fa-map-marker-alt"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold text-gray-900">Poienile de sub Munte</h4>
                                    <p class="flex items-center mt-2 text-gray-600">
                                        <i class="mr-2 text-red-600 fas fa-clock"></i>
                                        Sâmbătă, 13:00 - Grupa mixtă
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center mt-8 space-x-4">
                        <div class="w-16 h-16 overflow-hidden border-4 border-red-900 rounded-full">
                            <img src="/assets/placeholder_athlete.jpg" alt="Ioan Mihalca"
                                class="object-cover w-full h-full">
                        </div>
                        <div>
                            <p class="text-lg font-bold text-gray-900">Ioan Mihalca</p>
                            <p class="text-red-700">Antrenor Principal & Fondator</p>
                        </div>
                    </div>
                </div>
            </div>

            <!--Google Reviews -->
            <div class="mt-16">
                <div class="mb-8 text-center">
                    <h3 class="text-3xl font-bold text-gray-900 font-roboto-condensed">Ce spun membrii noștri</h3>
                    <div class="w-24 h-1 mx-auto mt-4 bg-red-700 rounded"></div>
                </div>
                <div class="elfsight-app-630db31d-36a2-4674-90a9-e4b40d06b39e" data-elfsight-app-lazy></div>
            </div>

            <livewire:latest-posts />

        </div>
    </section>

    <!-- Parallax Section -->
    <section class="relative bg-fixed bg-center bg-cover h-[500px] flex items-center justify-center"
        style="background-image: url('assets/OG-VictoriaMM.webp')">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/60"></div>
        <div class="container relative z-10 px-4 mx-auto text-center">
            <h2 class="mb-6 text-5xl font-bold text-white md:text-7xl font-roboto-condensed drop-shadow-lg"
                role="heading" aria-level="2">
                Performanță și Pasiune
            </h2>
            <p class="max-w-2xl mx-auto text-xl text-gray-200 md:text-2xl">
                Transformă-ți pasiunea în performanță alături de echipa noastră dedicată
            </p>
            <a href="{{ route('contact') }}"
                class="inline-flex items-center justify-center px-8 py-4 mt-8 text-lg font-bold text-red-900 transition-all duration-300 bg-white rounded-lg hover:bg-gray-100 hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-white/50">
                Începe acum
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </section>

    <!-- Why Us Section -->
    <section class="py-20 bg-white">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <span class="text-sm font-bold tracking-wider text-red-700 uppercase">De ce să ne alegi</span>
                <h2 class="mt-2 text-4xl font-bold text-gray-900 md:text-5xl font-roboto-condensed" id="de-ce-noi">De
                    ce noi?</h2>
                <div class="w-24 h-1 mx-auto mt-4 bg-red-700 rounded"></div>
            </div>

            <div class="grid items-center gap-8 lg:grid-cols-3 lg:gap-12">
                <!-- Left Column -->
                <div class="space-y-8">
                    <div
                        class="p-6 transition-all duration-300 bg-gray-50 rounded-xl hover:shadow-lg hover:-translate-y-1 group">
                        <div
                            class="flex items-center justify-center mb-4 transition-colors bg-red-100 rounded-lg w-14 h-14 group-hover:bg-red-200">
                            <i class="text-2xl text-red-700 fas fa-dumbbell"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Pregătiți Temeinic, Implicați Deplin</h3>
                        <p class="leading-relaxed text-gray-600">Pregătirea noastră temeinică, combinată cu pasiunea și
                            dăruirea, se reflectă
                            în fiecare sesiune de antrenament.</p>
                    </div>

                    <div
                        class="p-6 transition-all duration-300 bg-gray-50 rounded-xl hover:shadow-lg hover:-translate-y-1 group">
                        <div
                            class="flex items-center justify-center mb-4 transition-colors bg-red-100 rounded-lg w-14 h-14 group-hover:bg-red-200">
                            <i class="text-2xl text-red-700 fas fa-users"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Atmosferă Prietenoasă și Motivantă</h3>
                        <p class="leading-relaxed text-gray-600">Creăm o atmosferă bazată pe respect reciproc,
                            încurajând membrii să se simtă
                            confortabil și să se bucure de antrenamente.</p>
                    </div>
                </div>

                <!-- Center Image -->
                <div class="flex items-center justify-center order-first lg:order-none">
                    <div class="relative">
                        <div class="absolute inset-0 transform bg-red-900 rounded-2xl rotate-3 opacity-20"></div>
                        <img src="/assets/csvictoriamm-colaj.webp" alt="CS Victoria Colaj" width="600"
                            height="800" loading="lazy" class="relative shadow-2xl rounded-2xl">
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-8">
                    <div
                        class="p-6 transition-all duration-300 bg-gray-50 rounded-xl hover:shadow-lg hover:-translate-y-1 group">
                        <div
                            class="flex items-center justify-center mb-4 transition-colors bg-red-100 rounded-lg w-14 h-14 group-hover:bg-red-200">
                            <i class="text-2xl text-red-700 fas fa-building"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Sală de Kickboxing în Baia Mare</h3>
                        <p class="leading-relaxed text-gray-600">Oferim un mediu optim pentru antrenament și progres,
                            cu o sală special
                            amenajată și toate echipamentele necesare.</p>
                    </div>

                    <div
                        class="p-6 transition-all duration-300 bg-gray-50 rounded-xl hover:shadow-lg hover:-translate-y-1 group">
                        <div
                            class="flex items-center justify-center mb-4 transition-colors bg-red-100 rounded-lg w-14 h-14 group-hover:bg-red-200">
                            <i class="text-2xl text-red-700 fas fa-chart-line"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">Progres Constant și Dezvoltare Personală</h3>
                        <p class="leading-relaxed text-gray-600">Ne concentrăm pe dezvoltarea fiecărui sportiv,
                            îmbunătățind nu doar
                            abilitățile fizice, ci și încrederea în sine și disciplina personală.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Carousel -->
    <section class="py-16 bg-gray-100" x-data="carousel()">
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <span class="text-sm font-bold tracking-wider text-red-700 uppercase">Colaborări</span>
                <h2 class="mt-2 text-4xl font-bold text-gray-900 font-roboto-condensed" id="parteneri">Prietenii
                    Noștri</h2>
                <div class="w-24 h-1 mx-auto mt-4 bg-red-700 rounded"></div>
            </div>

            <div class="relative overflow-hidden">
                <div class="flex transition-transform duration-700 ease-out"
                    :style="{ transform: `translateX(-${currentTranslate}%)` }">
                    <template x-for="(image, index) in displayImages" :key="index">
                        <div class="flex-shrink-0 w-1/2 px-4 md:w-1/4 lg:w-1/5">
                            <div
                                class="flex items-center justify-center h-32 p-4 transition-shadow duration-300 bg-white rounded-lg shadow-sm hover:shadow-md">
                                <img :src="image" :alt="'Partener CS Victoria ' + (index + 1)" width="200"
                                    height="200" loading="lazy"
                                    class="object-contain w-auto transition-all duration-300 max-h-20 grayscale hover:grayscale-0">
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Carousel Indicators -->
            <div class="flex justify-center mt-8 space-x-2">
                <template x-for="(_, index) in images.slice(0, itemsToShow)" :key="index">
                    <button @click="goToSlide(index)" class="w-3 h-3 transition-all duration-300 rounded-full"
                        :class="currentIndex === index ? 'bg-red-900 w-8' : 'bg-gray-400 hover:bg-gray-500'">
                    </button>
                </template>
            </div>
        </div>
    </section>

    <script>
        function carousel() {
            return {
                currentIndex: 0,
                currentTranslate: 0,
                itemsToShow: window.innerWidth < 640 ? 2 : (window.innerWidth < 1024 ? 4 : 5),
                images: [
                    '/assets/logouri/ARMURA.webp',
                    '/assets/logouri/Federatia-Romana-de-Freestyle-Kickboxing.webp',
                    '/assets/logouri/Click-Music-Romania.jpg',
                    '/assets/logouri/Plai-Morosenesc.jpg',
                    '/assets/logouri/acs-kickbox-.webp',
                    '/assets/logouri/cs-dragonul-baia-mare.webp',
                    '/assets/logouri/clickstudiosdigital.jpg',
                ],
                get displayImages() {
                    return [...this.images, ...this.images.slice(0, this.itemsToShow)];
                },
                next() {
                    this.currentIndex = (this.currentIndex + 1) % this.images.length;
                    this.currentTranslate = (this.currentIndex * (100 / this.itemsToShow));

                    if (this.currentIndex === 0) {
                        setTimeout(() => {
                            this.currentTranslate = 0;
                            this.$el.querySelector('.flex').style.transition = 'none';
                            setTimeout(() => {
                                this.$el.querySelector('.flex').style.transition = '';
                            }, 50);
                        }, 700);
                    }
                },
                goToSlide(index) {
                    this.currentIndex = index;
                    this.currentTranslate = (this.currentIndex * (100 / this.itemsToShow));
                },
                init() {
                    setInterval(() => this.next(), 4000);
                    window.addEventListener('resize', () => {
                        const newItemsToShow = window.innerWidth < 640 ? 2 : (window.innerWidth < 1024 ? 4 : 5);
                        if (newItemsToShow !== this.itemsToShow) {
                            this.itemsToShow = newItemsToShow;
                            this.currentIndex = 0;
                            this.currentTranslate = 0;
                        }
                    });
                }
            }
        }
    </script>

</div>
