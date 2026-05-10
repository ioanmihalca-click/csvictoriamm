<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    @php
        $ogImage = $post->featured_image
            ? asset('storage/'.$post->featured_image)
            : asset('assets/OG-VictoriaMM.webp');
        $description = $post->meta['description'] ?? \Illuminate\Support\Str::limit($post->plain_body, 155);
    @endphp

    <title>{{ $post->meta['title'] ?? $post->title }} | Club Sportiv Victoria Maramureș</title>
    <meta name="description" content="{{ $description }}">
    <meta name="keywords"
        content="{{ $post->meta['keywords'] ?? 'Club Sportiv Victoria Maramureș, blog, kickbox, freestyle kickbox, box, Maramures, Baia Mare, Arte Martiale, Romania, sala de kickbox, antrenamente de kickbox' }}">
    <meta name="author" content="Antrenor Ioan Mihalca">

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
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:image" content="{{ $ogImage }}">
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
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $ogImage }}">
    <meta name="twitter:image:alt" content="{{ $post->title }}">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Brutalist-sport system fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Archivo:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- brand.css trebuie încărcat DUPĂ Tailwind preflight --}}
    <link rel="stylesheet" href="{{ asset('css/brand.css') }}?v={{ filemtime(public_path('css/brand.css')) }}">

    <style>
        body::-webkit-scrollbar{width:10px}
        body::-webkit-scrollbar-thumb{background:linear-gradient(180deg,#7F1D1D,#991B1B);border-radius:5px}
        body::-webkit-scrollbar-track{background-color:#0a0a0a;border-radius:5px}
        [x-cloak]{display:none !important}
    </style>

    {{-- JSON-LD valid: folosim @json pentru orice string dinamic ca să escape-uim corect ", \, \n. --}}
    @php
        $blogPostingLd = [
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => $post->title,
            'image' => [
                '@type' => 'ImageObject',
                'url' => $ogImage,
                'width' => 1200,
                'height' => 630,
            ],
            'datePublished' => $post->published_at->format('c'),
            'dateModified' => $post->updated_at->format('c'),
            'author' => [
                '@type' => 'Person',
                'name' => 'Antrenor Ioan Mihalca',
                'url' => 'https://csvictoriamm.ro',
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Club Sportiv Victoria Maramureș',
                'url' => 'https://csvictoriamm.ro',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('assets/OG-VictoriaMM.webp'),
                    'width' => 600,
                    'height' => 60,
                ],
            ],
            'description' => $description,
            'articleBody' => $post->plain_body,
            'wordCount' => \Illuminate\Support\Str::wordCount($post->plain_body),
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => route('blog.show', $post->slug),
            ],
            'inLanguage' => 'ro-RO',
            'about' => [
                '@type' => 'Thing',
                'name' => 'Kickboxing',
            ],
            'isPartOf' => [
                '@type' => 'Blog',
                'name' => 'Blog CS Victoria Maramureș',
                'url' => 'https://csvictoriamm.ro/blog',
            ],
        ];

        $breadcrumbLd = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Acasă', 'item' => 'https://csvictoriamm.ro'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => 'https://csvictoriamm.ro/blog'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => $post->title, 'item' => route('blog.show', $post->slug)],
            ],
        ];
    @endphp

    <!-- BlogPosting Schema (JSON-LD) -->
    <script type="application/ld+json">
{!! json_encode($blogPostingLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>

    <!-- BreadcrumbList Schema (JSON-LD) -->
    <script type="application/ld+json">
{!! json_encode($breadcrumbLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
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
    @navigated.window="pageLoading = false" class="antialiased">
    <livewire:header-nav />

    <div x-show="pageLoading" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center" style="background:rgba(10,10,10,.85)">
        <svg class="w-12 h-12 animate-spin" style="color:var(--red)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
        </svg>
    </div>

    <main>
        {{ $slot }}
    </main>

    <livewire:footer />

    @livewireScripts
</body>

</html>
