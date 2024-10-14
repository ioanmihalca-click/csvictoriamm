<div>
   <!-- Hero Section -->
<section class="relative bg-center bg-cover" style="background-image: url('assets/unsplash-image.webp')">
    <div class="absolute inset-0 bg-white opacity-50"></div>
    <div class="container relative z-10 px-4 py-8 mx-auto">
        <h1 class="mb-4 text-4xl font-bold text-center text-black md:text-6xl md:text-left font-roboto-condensed">Club Sportiv <br class="md:hidden"> Victoria
            Maramureș</h1>
        <h2 class="max-w-2xl p-2 mb-8 text-xl font-semibold text-center text-black md:text-left md:text-2xl">Promovăm sportul de
            <span class="font-bold text-red-900">performanță</span> și sportul pentru toți în Baia-Mare, Poienile de sub Munte și Petrova. Antrenamente de
            <span class="font-bold text-red-900">Freestyle Kickboxing</span> și Fitness Funcțional în Baia Mare | Grupe de copii si adulti.</h2>

        <div class="flex justify-center px-4 space-x-8 md:justify-start">
            <a href="https://www.tiktok.com/@csvictoriamm" target="_blank" rel="noopener noreferrer"
                class="text-black hover:text-red-900"><i class="fa-brands fa-tiktok fa-2x"></i></a>
            <a href="https://www.youtube.com/channel/UCFfZgsuQCT8nPSY8DvcqZhw" target="_blank"
                rel="noopener noreferrer" class="text-black hover:text-red-900"><i
                    class="fa-brands fa-youtube fa-2x"></i></a>
            <a href="https://www.facebook.com/victoriamaramures" target="_blank" rel="noopener noreferrer"
                class="text-black hover:text-red-900"><i class="fa-brands fa-facebook fa-2x"></i></a>
            <a href="https://www.instagram.com/csvictoriamm" target="_blank" rel="noopener noreferrer"
                class="text-black hover:text-red-900"><i class="fa-brands fa-instagram fa-2x"></i></a>
        </div>
    </div>
</section>

<section class="py-8 bg-white">
    <div class="container px-4 mx-auto">
        <div class="flex flex-col md:flex-row md:space-x-12">
            <!-- Coloana stângă (imagini) -->
            <div class="w-full md:w-1/3 md:sticky md:top-8 md:self-start">
                <div x-data="{ currentImage: 0 }" class="space-y-8">
                    <div class="relative overflow-hidden rounded-lg shadow-xl aspect-square">
                        <img src="/assets/antrenamente.webp" 
                             alt="Antrenamente Kickbox Baia Mare" 
                             class="absolute inset-0 object-contain w-full h-full transition-opacity duration-500"
                             :class="{ 'opacity-100': currentImage === 0, 'opacity-0': currentImage === 1 }">
                        <img src="/assets/antrenamente-copii.webp" 
                             alt="Antrenamente Kickbox Baia Mare pentru copii" 
                             class="absolute inset-0 object-contain w-full h-full transition-opacity duration-500"
                             :class="{ 'opacity-100': currentImage === 1, 'opacity-0': currentImage === 0 }">
                    </div>
                    <div class="flex flex-col justify-center mt-4 space-y-2 sm:flex-row sm:space-y-0 sm:space-x-4">
                        <button @click="currentImage = 0" 
                                class="px-4 py-2 text-sm font-semibold transition-colors duration-300 rounded sm:text-base focus:outline-none focus:ring-2 focus:ring-red-800"
                                :class="{ 'bg-red-900 text-white': currentImage === 0, 'bg-gray-200 text-gray-700 hover:bg-gray-300': currentImage !== 0 }">
                            Antrenamente Adulți
                        </button>
                        <button @click="currentImage = 1" 
                                class="px-4 py-2 text-sm font-semibold transition-colors duration-300 rounded sm:text-base focus:outline-none focus:ring-2 focus:ring-red-800"
                                :class="{ 'bg-red-900 text-white': currentImage === 1, 'bg-gray-200 text-gray-700 hover:bg-gray-300': currentImage !== 1 }">
                            Antrenamente Copii
                        </button>
                    </div>
                </div>
            </div>
                <div class="w-full mt-8 md:w-2/3 md:mt-0">
                    <h2 class="mb-6 text-4xl font-bold text-red-900 font-roboto-condensed">Despre noi</h2>
                    <div class="space-y-4 text-lg" x-data="{ expanded: false }">
                        <p class="mb-4 text-xl"><strong>Clubul Sportiv Victoria Maramureș</strong> a fost înființat în 2021 și își desfășoară activitatea în Baia Mare, Poienile de Sub Munte și Petrova, având scopul de a promova sportul și un stil de viață sănătos în comunitatea locală.</p>
                        <p class="mb-4 text-xl">Ceea ce a început ca un club mic, pasionat de artele marțiale, a evoluat rapid într-o comunitate puternică de atleți dedicați, cuprinzând atât copii, cât și adulți.</p>
                        <div x-show="expanded" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0">
                            <p class="mb-4 text-xl">Suntem afiliati ai <strong>Federatiei Romane de Freestyle Kickboxing</strong> si participam anual la competitii nationale si internationale. Am castigat multe medalii și trofee prețioase, dar cea mai mare realizare a noastră rămâne impactul pozitiv asupra vieților tinerilor și adulților care s-au alăturat clubului de-a lungul timpului.</p>
                            <p class="mb-4 text-xl">Clubul nostru promovează valorile <strong>respectului</strong> și ale <strong>disciplinei personale.</strong></p>
                            <p class="mb-4 text-xl">Suntem profesioniști dedicați, cu experiență în domeniu si certificări naționale relevante. Ne concentram pe furnizarea celor mai bune sesiuni de antrenament pentru toți membrii clubului, indiferent de vârstă sau nivel.</p>
                            <p class="mb-4 text-xl">Promovăm <strong>kickboxingul</strong> de <strong>performanță</strong> și <strong>sportul pentru toți</strong>, promovăm in comunitatea noastra un stil de viață mai sănătos și activ prin antrenamente de autoaparare. Ne gasesti in Baia-Mare, Poienile de sub Munte si Petrova.</p>
                            <p class="mb-4 text-xl">Organizăm sesiuni de probă gratuite în fiecare zi.</p>
                        </div>
                        <button @click="expanded = !expanded" class="px-4 py-2 mt-4 text-white transition-colors duration-300 bg-red-900 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-opacity-50">
                            <span x-text="expanded ? 'Citește mai puțin' : 'Citește mai mult'"></span>
                        </button>
                    </div>
                    <div class="mt-8">
                        <h3 class="mb-4 text-2xl font-bold text-red-900">Orar</h3>
                        <div class="space-y-2">
                            <p><strong>Baia Mare:</strong></p>
                            <ul class="list-disc list-inside">
                                <li>Luni - Joi, 19:15 - Grupa adulți și juniori mari</li>
                                <li>Marți și Joi, 18:00 - Grupa copii (6-12 ani)</li>
                            </ul>
                            <p><strong>Petrova:</strong> Vineri, 18:30 - Grupa mixtă</p>
                            <p><strong>Poienile de sub Munte:</strong> Sâmbătă, 13:00 - Grupa mixtă</p>
                        </div>
                    </div>
                    <p class="mt-8 italic text-red-700">Ioan Mihalca, antrenor</p>
                </div>
            </div>
               <!--Google Reviews -->
            <div class="container p-8 mt-4">
                <div class="elfsight-app-630db31d-36a2-4674-90a9-e4b40d06b39e" data-elfsight-app-lazy></div>
            </div>
        </div>
    </section>

<!-- Parallax Section -->
<section class="relative bg-fixed bg-center bg-cover h-96" style="background-image: url('assets/OG-VictoriaMM.webp')">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="absolute inset-0 flex items-center justify-center">
        <h2 class="text-4xl font-bold text-white md:text-6xl font-roboto-condensed">Performanță și Pasiune</h2>
    </div>
</section>

<!-- Why Us Section -->
<section class="py-20 bg-white">
    <div class="container px-4 mx-auto">
        <h2 class="mb-12 text-4xl font-bold text-center text-red-900 font-roboto-condensed">De ce noi?</h2>
        <div class="grid gap-12 md:grid-cols-3">
            <div class="space-y-8">
                <div>
                    <h3 class="mb-3 text-2xl font-semibold text-red-900">Pregătiți Temeinic, Implicați Deplin</h3>
                    <p class="text-lg">Pregătirea noastră temeinică, combinată cu pasiunea și dăruirea, se reflectă în fiecare sesiune de antrenament.</p>
                </div>
                <div>
                    <h3 class="mb-3 text-2xl font-semibold text-red-900">Atmosferă Prietenoasă și Motivantă</h3>
                    <p class="text-lg">Creăm o atmosferă bazată pe respect reciproc, încurajând membrii să se simtă confortabil și să se bucure de antrenamente.</p>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <img src="/assets/csvictoriamm-colaj.webp" alt="CS Victoria Colaj" class="rounded-lg shadow-xl">
            </div>
            <div class="space-y-8">
                <div>
                    <h3 class="mb-3 text-2xl font-semibold text-red-900">Sală de Kickboxing în Baia Mare</h3>
                    <p class="text-lg">Oferim un mediu optim pentru antrenament și progres, cu o sală special amenajată și toate echipamentele necesare.</p>
                </div>
                <div>
                    <h3 class="mb-3 text-2xl font-semibold text-red-900">Progres Constant și Dezvoltare Personală</h3>
                    <p class="text-lg">Ne concentrăm pe dezvoltarea fiecărui sportiv, îmbunătățind nu doar abilitățile fizice, ci și încrederea în sine și disciplina personală.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partners Carousel -->
<section class="py-16 bg-gray-100" x-data="carousel()">
    <div class="container px-4 mx-auto">
        <h2 class="mb-12 text-4xl font-bold text-center text-red-900 font-roboto-condensed">Prietenii Noștri</h2>
        <div class="relative overflow-hidden">
            <div class="flex transition-transform duration-500 ease-in-out" :style="{ transform: `translateX(-${currentTranslate}%)` }">
                <template x-for="image in displayImages">
                    <div class="flex-shrink-0 w-1/3 px-2 md:w-1/5">
                        <div class="flex items-center justify-center p-4 bg-white rounded-lg shadow-md aspect-square">
                            <img :src="image" alt="Logo partener" class="object-contain max-w-full max-h-full">
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</section>

<script>
function carousel() {
    return {
        currentIndex: 0,
        currentTranslate: 0,
        itemsToShow: window.innerWidth < 768 ? 3 : 5,
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
                }, 500);
            }
        },
        init() {
            setInterval(() => this.next(), 3000);
            window.addEventListener('resize', () => {
               const newItemsToShow = window.innerWidth < 768 ? 3 : 5;
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