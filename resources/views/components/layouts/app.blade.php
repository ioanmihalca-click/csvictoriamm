<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>{{ $title ?? 'Club Sportiv Victoria Maramureș' }}</title>
 
    <meta name="description"
        content="Club Sportiv Victoria Maramureș - Antrenamente Kickboxing în Baia Mare | Freestyle Kickboxing pentru toate vârstele | Instructori calificați | Află mai multe!">
   <link rel="canonical" href="{{ url()->current() }}">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon" />

    <!-- Open Graph Tags for Social Media Sharing -->
    <meta property="og:title" content="Kickboxing și Pregatire Fizica în Baia Mare | Clubul Victoria Maramureș" />
    <meta property="og:site_name" content="Club Sportiv Victoria Maramures Baia Mare">
    <meta property="og:description"
        content="Clubul Sportiv Victoria Maramureș - Antrenamente Kickboxing  în Baia Mare | Freestyle Kickboxing pentru toate vârstele | Instructori calificați | Află mai multe!">
    <meta property="og:image" content="{{ asset('assets/OG-VictoriaMM.webp') }}" />
    <meta property="og:image:type" content="image/webp" />
    <meta property="og:image:alt" content="Clubul Sportiv Victoria Maramureș" />
    <meta property="og:url" content="{{ url()->current() }}">
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
    "https://www.instagram.com/csvictoriamm/"
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

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5BHQPK0P11"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5BHQPK0P11');
</script>

<meta name="google-site-verification" content="Nh4bYEQOuTIi3Xms3pkbl8zuf9UC_YHnYsBjWMhrmy0" />

</head>

<body class="font-sans antialiased bg-white">
    <div>
        <livewire:header-nav />
    </div>


  
        {{ $slot }}
   


<livewire:footer />
</body>

</html>





