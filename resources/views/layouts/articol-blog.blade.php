<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <title>{{ $post->meta['title'] ?? $post->title }} | Club Sportiv Victoria Maramureș</title>
    <meta name="description" content="{{ $post->meta['description'] ?? '' }}">
    <meta name="keywords"
        content="{{ $post->meta['keywords'] ?? 'Club Sportiv Victoria Maramureș, blog, kickbox, freestyle kickbox, box, Maramures, Baia Mare, Arte Martiale, Romania, sala de kickbox, antrenamente de kickbox' }}">

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

    <!-- Enhanced Meta Tags for AI Search -->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="googlebot" content="index, follow">
    <meta name="bingbot" content="index, follow">

    <!-- Open Graph Tags for Social Media Sharing -->
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description"
        content="{{ $post->meta['description'] ?? Str::limit(strip_tags($post->body), 150) }}">
    <meta property="og:image" content="{{ asset('storage/' . $post->featured_image) }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ $post->title }}">
    <meta property="og:url" content="{{ route('blog.show', $post->slug) }}">
    <meta property="og:type" content="article">
    <meta property="og:locale" content="ro_RO">
    <meta property="og:site_name" content="Club Sportiv Victoria Maramureș">
    <meta property="article:published_time" content="{{ $post->published_at->format('Y-m-d\TH:i:sP') }}">
    <meta property="article:modified_time" content="{{ $post->updated_at->format('Y-m-d\TH:i:sP') }}">
    <meta property="article:author" content="Ioan Mihalca">
    <meta property="article:section" content="Kickboxing">
    <meta property="article:tag" content="kickboxing, arte martiale, Baia Mare">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description"
        content="{{ $post->meta['description'] ?? Str::limit(strip_tags($post->body), 150) }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $post->featured_image) }}">
    <meta name="twitter:image:alt" content="{{ $post->title }}">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Font Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])



    <style>
        /* Custom scrollbar styling */
        body::-webkit-scrollbar {
            width: 9px;
        }

        body::-webkit-scrollbar-thumb {
            background-color: #7F1D1D;
            border-radius: 3px;
        }

        body::-webkit-scrollbar-track {
            background-color: #d1d5db;
            border-radius: 3px;
        }
    </style>

    <!-- Enhanced Schema.org for AI & SEO 2025 -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": "{{ $post->title }}",
        "image": {
            "@type": "ImageObject",
            "url": "{{ asset('storage/' . $post->featured_image) }}",
            "width": 1200,
            "height": 630
        },
        "datePublished": "{{ $post->published_at->format('Y-m-d\TH:i:sP') }}",
        "dateModified": "{{ $post->updated_at->format('Y-m-d\TH:i:sP') }}",
        "author": {
            "@type": "Person",
            "name": "Antrenor Ioan Mihalca",
            "url": "https://csvictoriamm.ro"
        }, 
        "publisher": {
            "@type": "Organization",
            "name": "Club Sportiv Victoria Maramures",
            "url": "https://csvictoriamm.ro",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ asset('assets/OG-VictoriaMM.webp') }}",
                "width": 600,
                "height": 60
            }
        },
        "description": "{{ $post->meta['description'] ?? Str::limit(strip_tags($post->body), 150) }}",
        "articleBody": "{{ strip_tags($post->body) }}",
        "wordCount": {{ str_word_count(strip_tags($post->body)) }},
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ route('blog.show', $post->slug) }}"
        },
        "inLanguage": "ro-RO",
        "about": {
            "@type": "Thing",
            "name": "Kickboxing"
        },
        "isPartOf": {
            "@type": "Blog",
            "name": "Blog CS Victoria Maramureș",
            "url": "https://csvictoriamm.ro/blog"
        }
    }
    </script>

    <!-- BreadcrumbList Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Acasă",
                "item": "https://csvictoriamm.ro"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "Blog",
                "item": "https://csvictoriamm.ro/blog"
            },
            {
                "@type": "ListItem",
                "position": 3,
                "name": "{{ $post->title }}",
                "item": "{{ route('blog.show', $post->slug) }}"
            }
        ]
    }
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5BHQPK0P11"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-5BHQPK0P11');
    </script>

    @livewireStyles
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

    <div>
        <livewire:header-nav />
    </div>
    <!-- Transition wrapper -->
    <div x-show="pageLoading" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center bg-white bg-opacity-75">
        <!-- Loading indicator -->
        <svg class="w-16 h-16 text-red-900 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
            </circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>
    </div>

    <main class="container px-4 py-4 mx-auto md:py-8">
        {{ $slot }}
    </main>

    <livewire:footer />

    @livewireScripts
</body>

</html>
