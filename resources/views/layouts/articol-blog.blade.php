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

    <script src="https://cdn.tailwindcss.com"></script>

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

</head>

<body class="font-sans antialiased bg-white">
    <div>
        <livewire:header-nav />
    </div>

    <main class="container px-4 py-8 mx-auto">
        {{ $slot }}
    </main>

    <livewire:footer />

</body>

</html>
