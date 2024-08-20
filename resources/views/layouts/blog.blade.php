<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Blog de Kickboxing | Club Sportiv Victoria Maramureș</title>
    <meta name="description" content="Descoperiți cele mai recente știri, sfaturi și actualizări de la Club Sportiv Victoria Maramureș, destinația dumneavoastră premium pentru antrenamente de kickboxing freestyle și Muay Thai în Baia Mare, România.">
    <link rel="canonical" href="https://csvictoriamm.ro/blog" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon" />

    <!-- Open Graph Tags for Social Media Sharing -->
    <meta property="og:title" content="Blog de Kickboxing | Club Sportiv Victoria Maramureș" />
    <meta property="og:site_name" content="Club Sportiv Victoria Maramures Baia Mare">
    <meta property="og:description" content="Descoperiți cele mai recente știri, sfaturi și actualizări de la Club Sportiv Victoria Maramureș, destinația dumneavoastră premium pentru antrenamente de kickboxing freestyle și Muay Thai în Baia Mare, România.">
    <meta property="og:image" content="{{ asset('assets/OG-VictoriaMM.webp') }}" />
    <meta property="og:image:type" content="image/webp" />
    <meta property="og:image:alt" content="Clubul Sportiv Victoria Maramureș" />
    <meta property="og:url" content="https://csvictoriamm.ro/blog">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ro_RO">

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
      "email": "csvictoriamm@gmail.com",
      "sameAs": [
        "https://www.facebook.com/victoriamaramures",
        "https://www.instagram.com/csvictoriamm/"
      ],
     "sportingDiscipline": [
  {
    "@type": "DefinedTerm",
    "name": "Kickboxing Freestyle"
  },
  {
    "@type": "DefinedTerm",
    "name": "Muay Thai"
  },
  {
    "@type": "DefinedTerm",
    "name": "Fitness Funcțional"
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
]
    }
    </script>

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5BHQPK0P11"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
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
