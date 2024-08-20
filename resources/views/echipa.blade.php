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
<section id="echipa" class="py-16">
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

        
        <!--Sportivi-->
<section class="relative py-20 overflow-hidden bg-white">
    <span class="absolute top-0 right-0 flex flex-col items-end mt-0 -mr-16 opacity-60">
        <span class="container hidden w-screen h-32 max-w-xs mt-20 transform rounded-full rounded-r-none md:block md:max-w-xs lg:max-w-lg 2xl:max-w-3xl bg-blue-50"></span>
    </span>

    <span class="absolute bottom-0 left-0"> </span>

    <div class="relative px-16 mx-auto max-w-7xl">
        <p class="font-semibold tracking-wide text-red-900 uppercase font-roboto-condensed">Grupa de performanta</p>
        <h2 class="relative max-w-lg mt-5 mb-10 text-4xl font-semibold leading-tight lg:text-5xl">Ei sunt sportivii cu care ne mandrim</h2>
        <div class="grid w-full grid-cols-1 gap-10 md:grid-cols-4">
            <div class="flex flex-col items-center justify-center col-span-1">
                <div class="relative p-5">
                    <div class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-blue-50"></div>
                    <img class="relative z-20 w-full rounded-full" src="https://res.cloudinary.com/dpxess5iw/image/upload/t_Profile/v1724149064/DSC00260_075755-lxsqz2n1_yxi8jr.png" />
                </div>
                <div class="mt-3 space-y-2 text-center">
                    <div class="space-y-1 text-lg font-medium leading-6">
                        <h3>Timeea Benzar</h3>
                        <p class="text-blue-600">10 ani</p>
                    </div>
                  
                </div>
            </div>

              <div class="flex flex-col items-center justify-center col-span-1">
                <div class="relative p-5">
                    <div class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-green-50"></div>
                    <img class="relative z-20 w-full rounded-full" src="https://res.cloudinary.com/dpxess5iw/image/upload/t_Profile/v1724157041/IMG_20240810_205941_233_tfrfma.png" />
                </div>
                <div class="mt-3 space-y-2 text-center">
                    <div class="space-y-1 text-lg font-medium leading-6">
                        <h3>Ema Recalo</h3>
                        <p class="text-blue-600">10 ani</p>
                    </div>
                    
                </div>
            </div>

            <div class="flex flex-col items-center justify-center col-span-1">
                <div class="relative p-5">
                    <div class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-green-50"></div>
                    <img class="relative z-20 w-full rounded-full" src="https://res.cloudinary.com/dpxess5iw/image/upload/t_Profile/v1724149062/DSC00266_075808-lxsr3c2g_e3qtkr.png" />
                </div>
                <div class="mt-3 space-y-2 text-center">
                    <div class="space-y-1 text-lg font-medium leading-6">
                        <h3>Alexandru Taut</h3>
                        <p class="text-blue-600">11 ani</p>
                    </div>
                   
                </div>
            </div>

            <div class="flex flex-col items-center justify-center col-span-1">
                <div class="relative p-5">
                    <div class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-pink-50"></div>
                    <img class="relative z-20 w-full rounded-full" src="https://res.cloudinary.com/dpxess5iw/image/upload/t_Profile/v1724149080/DSC00270_075832-lxsr62xa_fqk1qb.png" />
                </div>
                <div class="mt-3 space-y-2 text-center">
                    <div class="space-y-1 text-lg font-medium leading-6">
                        <h3>Vladimyr Benzar</h3>
                        <p class="text-blue-600">12 ani</p>
                    </div>
                   
                </div>
            </div>

            <div class="flex flex-col items-center justify-center col-span-1">
                <div class="relative p-5">
                    <div class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-green-50"></div>
                    <img class="relative z-20 w-full rounded-full" src="https://res.cloudinary.com/dpxess5iw/image/upload/t_Profile/v1724149069/DSC00278_075858-lxsr524i_e9lthi.png" />
                </div>
                <div class="mt-3 space-y-2 text-center">
                    <div class="space-y-1 text-lg font-medium leading-6">
                        <h3>Sergiu Ciontos</h3>
                        <p class="text-blue-600">12 ani</p>
                    </div>
                    
                </div>
            </div>

            <div class="flex flex-col items-center justify-center col-span-1">
                <div class="relative p-5">
                    <div class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-green-50"></div>
                    <img class="relative z-20 w-full rounded-full" src="https://res.cloudinary.com/dpxess5iw/image/upload/t_Profile/v1724149070/DSC00284_075906-lxsr77ad_j9qa4e.png" />
                </div>
                <div class="mt-3 space-y-2 text-center">
                    <div class="space-y-1 text-lg font-medium leading-6">
                        <h3>Ramona Rozovlean</h3>
                        <p class="text-blue-600">13 ani</p>
                    </div>
                    
                </div>
            </div>

            <div class="flex flex-col items-center justify-center col-span-1">
                <div class="relative p-5">
                    <div class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-pink-50"></div>
                    <img class="relative z-20 w-full rounded-full" src="https://res.cloudinary.com/dpxess5iw/image/upload/t_Profile/v1724149077/DSC00295_075919-lxsr9a4d_kawdnd.png" />
                </div>
                <div class="mt-3 space-y-2 text-center">
                    <div class="space-y-1 text-lg font-medium leading-6">
                        <h3>Daria Curac</h3>
                        <p class="text-blue-600">16 ani</p>
                    </div>
                   
                </div>
            </div>

            <div class="flex flex-col items-center justify-center col-span-1">
                <div class="relative p-5">
                    <div class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-green-50"></div>
                    <img class="relative z-20 w-full rounded-full" src="https://res.cloudinary.com/dpxess5iw/image/upload/t_Profile/v1724149067/DSC00304_075939-lxsr9q9d_aswfkh.png" />
                </div>
                <div class="mt-3 space-y-2 text-center">
                    <div class="space-y-1 text-lg font-medium leading-6">
                        <h3>Anton Corjuc</h3>
                        <p class="text-blue-600">16 ani</p>
                    </div>
                    
                </div>
            </div>

            <div class="flex flex-col items-center justify-center col-span-1">
                <div class="relative p-5">
                    <div class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-blue-50"></div>
                    <img class="relative z-20 w-full rounded-full" src="https://res.cloudinary.com/dpxess5iw/image/upload/t_Profile/v1724149068/DSC00316_075951-lxsra8ak_exrw0p.png" />
                </div>
                <div class="mt-3 space-y-2 text-center">
                    <div class="space-y-1 text-lg font-medium leading-6">
                        <h3>Alexandru Nemzet</h3>
                        <p class="text-blue-600">16 ani</p>
                    </div>
                    
                </div>
            </div>

        <div class="flex flex-col items-center justify-center col-span-1">
                <div class="relative p-5">
                    <div class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none bg-blue-50"></div>
                    <img class="relative z-20 w-full rounded-full" src="https://res.cloudinary.com/dpxess5iw/image/upload/t_Profile/v1724149024/105A0610-lnx23ccc_rsqadk.png" />
                </div>
                <div class="mt-3 space-y-2 text-center">
                    <div class="space-y-1 text-lg font-medium leading-6">
                        <h3>Giorgio Curac</h3>
                        <p class="text-blue-600">16 ani</p>
                    </div>


        </div>
    </div>
</section>


    <livewire:footer />
</body>

</html>
