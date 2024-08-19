<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 

    <title>Kickboxing și Pregatire Fizica în Baia Mare | Clubul Victoria Maramureș</title>
    <meta name="description"
        content="Clubul Sportiv Victoria Maramureș - Antrenamente Kickboxing  în Baia Mare | Freestyle Kickboxing pentru toate vârstele | Instructori calificați | Află mai multe!">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon" />

    <!-- Open Graph Tags for Social Media Sharing -->
    <meta property="og:title" content="Kickboxing și Pregatire Fizica în Baia Mare | Clubul Victoria Maramureș" />
    <meta property="og:site_name" content="Club Sportiv Victoria Maramures Baia Mare">
    <meta property="og:description" content="Clubul Sportiv Victoria Maramureș - Antrenamente Kickboxing  în Baia Mare | Freestyle Kickboxing pentru toate vârstele | Instructori calificați | Află mai multe!">
    <meta property="og:image" content="{{ asset('img/*.jpg') }}" />
    <meta property="og:image:type" content="image/jpg" />
    <meta property="og:image:alt" content="Clubul Sportiv Victoria Maramureș" />
    <meta property="og:url" content="https://csvictoriamm.ro/">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ro_RO">

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "SportsClub",
      "name": "Club Sportiv Victoria Maramureș",
      "description": "Clubul Sportiv Victoria Maramureș este un club de kickboxing și fitness funcțional din Baia Mare, Poienile de sub Munte, Petrova, Maramureș, dedicat promovării unui stil de viață sănătos și activ prin sport.",
      "image": "https://csvictoriamm.ro/lib/g96fty/CS-Victoria-Maramures-lnwzqw16.png",
      "url": "https://csvictoriamm.ro",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Str. Vasile Lucaciu",
        "addressLocality": "Baia Mare",
        "postalCode": "430341",
        "addressRegion": "Maramureș",
        "addressCountry": "România"
      },
      "telephone": "+40734411115",
      "email": "csvictoriamm@gmail.com", //
      "sameAs": [
        "https://www.facebook.com/victoriamaramures",
        "https://www.instagram.com/csvictoriamm/"
      ],
      "sportingDisclipine": [
        "Freestyle Kickboxing",
        "Fitness Funcțional",
        "Muay Thai"
      ],
      "founder": {
        "@type": "Person",
        "name": "Ioan Mihalca"
      },
      "location": [
        {
          "@type": "SportsClub",
          "name": "Sala de Kickboxing Baia Mare",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Str. Vasile Lucaciu",
            "addressLocality": "Baia Mare",
            "postalCode": "430341",
            "addressRegion": "Maramureș",
            "addressCountry": "România"
          }
        }
      ]
    }


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

      <!-- Font Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">

    <!-- AlpineJS -->

     <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Custom scrollbar styling */
        body::-webkit-scrollbar {
            width: 9px;
        }

        body::-webkit-scrollbar-thumb {
            background-color: #3B82F6;
            border-radius: 3px;
        }

        body::-webkit-scrollbar-track {
            background-color: #d1d5db;
            border-radius: 3px;
        }
    </style>
</head>

<body class="font-sans antialiased bg-white">

 <!-- Navigation -->
      <nav x-data="{ isOpen: false }" class="fixed top-0 left-0 z-50 w-full bg-white bg-opacity-75">
     
    <div class="container flex items-center justify-between px-4 py-2 mx-auto">
        <a href="/" class="text-white text-xs tracking-[4px] uppercase font-roboto-condensed">Club Sportiv Victoria Maramures</a>
        
        <!-- Hamburger menu button (visible on mobile) -->
        <button @click="isOpen = !isOpen" class="text-white md:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Desktop menu -->
        <div class="hidden space-x-4 md:flex">
            <a href="#about" class="text-white hover:text-emerald-500 font-roboto-condensed">Despre noi</a>
            <a href="#dezvoltare-web" class="text-white hover:text-emerald-500 font-roboto-condensed">Dezvoltare Web</a>
            <a href="#servicii" class="text-white hover:text-emerald-500 font-roboto-condensed">Servicii</a>
            <a href="#portofoliu" class="text-white hover:text-emerald-500 font-roboto-condensed">Portofoliu</a>
            <a href="/blog" class="text-white hover:text-emerald-500 font-roboto-condensed">Blog</a>
            <a href="#contact" class="text-white hover:text-emerald-500 font-roboto-condensed">Contact</a>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="isOpen" @click.away="isOpen = false" class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="#about" @click="isOpen = false" class="block px-3 py-2 text-white font-roboto-condensed">Despre noi</a>
            <a href="#dezvoltare-web" @click="isOpen = false" class="block px-3 py-2 text-white font-roboto-condensed">Dezvoltare Web</a>
            <a href="#servicii" @click="isOpen = false" class="block px-3 py-2 text-white font-roboto-condensed">Servicii</a>
            <a href="#portofoliu" @click="isOpen = false" class="block px-3 py-2 text-white font-roboto-condensed">Portofoliu</a>
            <a href="/blog" @click="isOpen = false" class="block px-3 py-2 text-white font-roboto-condensed">Blog</a>
            <a href="#contact" @click="isOpen = false" class="block px-3 py-2 text-white font-roboto-condensed">Contact</a>
        </div>
    </div>
</nav>



    <section class="relative flex items-center justify-center h-screen text-white home-parallax home-fade">
      <!-- Loading Spinner -->
      {{-- <div x-show="loading" class="absolute inset-0 z-50 flex items-center justify-center bg-black">
         <div class="w-16 h-16 border-t-4 border-solid rounded-full border-emerald-700 animate-spin"></div>
      </div> --}}

      <!-- Video background -->
      <div 
           class="absolute top-0 left-0 w-full h-full overflow-hidden">
         <video src="/assets/bg-video.mp4" autoplay muted loop class="absolute object-cover w-full h-full scale-125 -z-20"></video> 
         <div class="absolute top-0 left-0 w-full h-full bg-black opacity-50 -z-10"></div>
      </div>

    
</body>

</html>
