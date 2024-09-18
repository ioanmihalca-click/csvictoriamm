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

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon" />

    <!-- Open Graph Tags for Social Media Sharing -->
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ $post->meta['description'] ?? '' }}">
    <meta property="og:image" content="{{ asset('storage/' . $post->featured_image) }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="{{ route('blog.show', $post->slug) }}">
    <meta property="og:type" content="article">
    <meta property="og:locale" content="ro_RO">
    <meta property="og:site_name" content="Club Sportiv Victoria Maramureș">

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

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": "{{ $post->title }}",
        "image": "{{ asset('storage/' . $post->featured_image) }}",
        "datePublished": "{{ $post->published_at->format('Y-m-d') }}",
        "dateModified": "{{ $post->updated_at->format('Y-m-d') }}",
        "author": {
            "@type": "Person",
            "name": "Antrenor Ioan Mihalca" 
        }, 
       "publisher": {
            "@type": "Organization",
            "name": "Club Sportiv Victoria Maramures",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ asset('img/logo.png') }}"
            }
        },
        "description": "{{ $post->meta['description'] ?? '' }}"
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

<body 
    x-data="{ 
        pageLoading: true,
        init() {
            this.$nextTick(() => {
                this.pageLoading = false;
            });
        }
    }" 
    x-init="
        Livewire.on('navigating', () => { pageLoading = true });
        Livewire.on('navigated', () => { pageLoading = false });
    "
    @navigate.window="pageLoading = true"
    @navigated.window="pageLoading = false"
    class="font-sans antialiased bg-white"
>

    <div>
        <livewire:header-nav />
    </div>
       <!-- Transition wrapper -->
    <div 
        x-show="pageLoading"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center bg-white bg-opacity-75"
    >
        <!-- Loading indicator -->
        <svg class="w-16 h-16 text-red-900 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>

    <main class="container px-4 py-4 mx-auto md:py-8">
        {{ $slot }}
    </main>

    <livewire:footer />

@livewireScripts
</body>

</html>
