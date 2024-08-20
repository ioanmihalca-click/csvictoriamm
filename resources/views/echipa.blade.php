<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <title>Echipa | Clubul Victoria Maramureș</title>
    <meta name="description"
        content="Clubul Sportiv Victoria Maramureș - Antrenamente Kickboxing  în Baia Mare | Freestyle Kickboxing pentru toate vârstele | Instructori calificați | Află mai multe!">
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
    <meta property="og:url" content="https://csvictoriamm.ro/echipa">
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



</head>

<body class="font-sans antialiased bg-white">
    <div>
        <livewire:header-nav />
    </div>

<!-- Echipa Section -->
<section id="echipa" class="py-16 bg-gray-100">
    <div class="container px-4 mx-auto">
        <h2 class="mb-8 text-3xl font-bold text-center text-red-900 font-roboto-condensed">Echipa Clubului Sportiv Victoria Maramureș</h2>
        
        <div class="grid gap-8 md:grid-cols-2">
            <!-- Conducere -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h3 class="mb-4 text-2xl font-bold text-red-900">Conducere</h3>
                <ul class="space-y-2">
                    <li><strong>Președinte:</strong> Ioan Mihalca</li>
                    <li><strong>Vice-Președinte:</strong> Ioana Mihalca</li>
                    <li><strong>Vice-Președinte:</strong> Andreea Mihalca</li>
                </ul>
            </div>
            
            <!-- Echipa Tehnică -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h3 class="mb-4 text-2xl font-bold text-red-900">Echipa Tehnică</h3>
                <ul class="space-y-2">
                    <li><strong>Antrenor Principal:</strong> Ioan Mihalca</li>
                    <li><strong>Antrenor Secund:</strong> Stefan Benzar</li>
                </ul>
            </div>
            
            <!-- Echipa de Management -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h3 class="mb-4 text-2xl font-bold text-red-900">Echipa de Management</h3>
                <ul class="space-y-2">
                    <li>Cristina Tăut</li>
                    <li>Andreea Mihalca</li>
                </ul>
            </div>
            
            <!-- Membri de Onoare -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h3 class="mb-4 text-2xl font-bold text-red-900">Membri de Onoare</h3>
                <ul class="space-y-2">
                    <li>Victor Cîmpian</li>
                    <li>Andrei Giurgiu (Refresh)</li>
                    <li>Alexandru Badea</li>
                    <li>Alin Buda</li>
                    <li>Călin Filip</li>
                    <li>Vasile Mihalca</li>
                </ul>
            </div>
        </div>
    </div>
</section>

    <livewire:footer />
</body>

</html>
