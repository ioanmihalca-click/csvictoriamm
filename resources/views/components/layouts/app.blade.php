<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Club Sportiv Victoria Maramureș' }}</title>
    <meta name="description"
        content="Club Sportiv Victoria Maramureș - Antrenamente Kickboxing în Baia Mare | Freestyle Kickboxing pentru toate vârstele | Instructori calificați | Află mai multe!">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Standard favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon/favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon/favicon-96x96.png') }}" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/favicon/favicon.svg') }}">

    <!-- Apple Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
    <meta name="apple-mobile-web-app-title" content="CS Victoria MM">

    <!-- Web Manifest -->
    {{-- <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}"> --}}

    <!-- Enhanced Meta Tags for AI Search 2025 -->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="googlebot" content="index, follow">
    <meta name="bingbot" content="index, follow">

    <!-- Open Graph Tags -->
    <meta property="og:title" content="Kickboxing și Pregatire Fizica în Baia Mare | Clubul Victoria Maramureș" />
    <meta property="og:site_name" content="Club Sportiv Victoria Maramures Baia Mare">
    <meta property="og:description"
        content="Clubul Sportiv Victoria Maramureș - Antrenamente Kickboxing  în Baia Mare | Freestyle Kickboxing pentru toate vârstele | Instructori calificați | Află mai multe!">
    <meta property="og:image" content="{{ asset('assets/OG-VictoriaMM.webp') }}" />
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/webp" />
    <meta property="og:image:alt" content="Clubul Sportiv Victoria Maramureș" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ro_RO">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Kickboxing și Pregatire Fizica în Baia Mare | Clubul Victoria Maramureș">
    <meta name="twitter:description"
        content="Clubul Sportiv Victoria Maramureș - Antrenamente Kickboxing în Baia Mare pentru toate vârstele">
    <meta name="twitter:image" content="{{ asset('assets/OG-VictoriaMM.webp') }}">
    <meta name="twitter:image:alt" content="Clubul Sportiv Victoria Maramureș">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        /* Custom scrollbar styling */
        html {
            scroll-behavior: smooth;
        }

        body::-webkit-scrollbar {
            width: 10px;
        }

        body::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #7F1D1D, #991B1B);
            border-radius: 5px;
        }

        body::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #991B1B, #B91C1C);
        }

        body::-webkit-scrollbar-track {
            background-color: #f3f4f6;
            border-radius: 5px;
        }

        [x-cloak] {
            display: none !important;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        .animate-slide-in-left {
            animation: slideInLeft 0.8s ease-out forwards;
        }

        .animate-slide-in-right {
            animation: slideInRight 0.8s ease-out forwards;
        }

        /* Hover effects */
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        /* Gradient text */
        .text-gradient {
            background: linear-gradient(135deg, #7F1D1D 0%, #DC2626 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Glass effect */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SportsClub",
  "name": "Club Sportiv Victoria Maramureș",
  "description": "Clubul Sportiv Victoria Maramureș este un club de kickboxing și fitness funcțional din Baia Mare, Poienile de sub Munte, Petrova, Maramureș, dedicat promovării unui stil de viață sănătos și activ prin sport.",
  "image": "https://csvictoriamm.ro/assets/OG-VictoriaMM.webp",
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
  "email": "csvictoriamm@gmail.com",
  "sameAs": [
    "https://www.facebook.com/victoriamaramures",
    "https://www.instagram.com/csvictoriamm/",
    "https://www.tiktok.com/@csvictoriamm",
    "https://www.youtube.com/channel/UCFfZgsuQCT8nPSY8DvcqZhw"
  ],
  "sportingDiscipline": [
    {
      "@type": "DefinedTerm",
      "name": "Freestyle Kickboxing"
    },
    {
      "@type": "DefinedTerm",
      "name": "Muay Thai"
    },
    {
      "@type": "DefinedTerm",
      "name": "Fitness Functional"
    }
  ],
  "founder": {
    "@type": "Person",
    "name": "Ioan Mihalca"
  },
  "location": [
    {
      "@type": "Place",
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
  ],
  "areaServed": [
    {
      "@type": "City",
      "name": "Baia Mare"
    },
    {
      "@type": "City",
      "name": "Poienile de sub Munte"
    },
    {
      "@type": "City",
      "name": "Petrova"
    }
  ]
}
    </script>

    <!-- FAQ Schema for AI & Featured Snippets -->
    <x-faq-schema />

    <!-- Organization Schema with Social Media -->
    <x-organization-schema />

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5BHQPK0P11"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-5BHQPK0P11');
    </script>

    <meta name="google-site-verification" content="Nh4bYEQOuTIi3Xms3pkbl8zuf9UC_YHnYsBjWMhrmy0" />
</head>

<body x-data="{
    pageLoading: true,
    init() {
        this.$nextTick(() => {
            this.pageLoading = false;
        });
    }
}" x-init="Livewire.on('navigating', () => { pageLoading = true });
Livewire.on('navigated', () => { pageLoading = false });" @navigate.window="pageLoading = true"
    @navigated.window="pageLoading = false" class="font-sans antialiased bg-white">
    <livewire:header-nav />

    <!-- Spacer for fixed header -->
    <div class="h-24 md:h-28"></div>

    <!-- Transition wrapper -->
    <div x-show="pageLoading" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center bg-white bg-opacity-90">
        <!-- Loading indicator -->
        <div class="flex flex-col items-center">
            <svg class="w-16 h-16 text-red-900 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            <p class="mt-4 text-lg font-semibold text-red-900">Se încarcă...</p>
        </div>
    </div>

    <main>
        {{ $slot }}
    </main>

    <livewire:footer />

    @livewireScripts
    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
</body>

</html>
