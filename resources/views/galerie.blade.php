<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <title>Galerie | Clubul Victoria Maramureș</title>
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
    <meta property="og:url" content="https://csvictoriamm.ro/galerie">
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

 <div class="p-2 mt-2" x-data="{
        imageGalleryOpened: false,
        imageGalleryActiveUrl: null,
        imageGalleryImageIndex: null,
        imageGallery: [
           
            {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149088/IMG_20240409_175353-lxj5ei6d_xotezo.jpg',
                'alt': 'Kickboxing Baia Mare'
            },
             {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724157043/IMG_20240810_205941_233_wqlllx.webp',
                'alt': 'Kickboxing Baia Mare'
            },
               {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724151699/Design_f%C4%83r%C4%83_titlu_4_khzssc.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
             {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724154884/DSC00252_075845_vmckmk.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
            {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149021/IMG-20231119-WA0006_edit_117800499320686-lpb55ctg_cqxfoc.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
            {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724157041/IMG-20240810-WA0254_jqdvq9.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
             {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149060/352381441_252217514085499_5107195744692959078_n-lo646b69_qgeob3.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
            {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149021/105A0073-lnx22s8l_anpirx.jpg',
                'alt': 'Kickbox Baia Mare Maramures 03'
            },
            {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724148556/Kickboxing-Baia-Mare_au2vmp.jpg',
                'alt': 'Kickbox Baia Mare Maramures 04'
            },
            {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149021/105A0324-lnx22vey_tafdvm.jpg',
                'alt': 'Kickbox Baia Mare Maramures 05'
            },
            {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149022/105A0350-lnx22zik_ny15yc.jpg',
                'alt': 'Kickbox Baia Mare Maramures 06'
            },
            {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149024/105A0610-lnx23ccc_rsqadk.jpg',
                'alt': 'Kickbox Baia Mare Maramures 07'
            },
            {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149024/105A0433-lnx237tb_sf4ki0.jpg',
                'alt': 'Kickbox Baia Mare Maramures 08'
            },
            {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149027/IMG_20240408_205701-lus2j5ql_bxtgai.jpg',
                'alt': 'Kickbox Baia Mare Maramures 09'
            },
            {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149025/136620224_3647344278696758_3003833114003523746_n-lo650t79_dx60pk.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
              {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149033/154105428_3510923319131877_1815913397909330049_n-lnx5z2yg_cucw3n.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
              {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149060/326176530_679660610565683_7582846626327639836_n-lo651189_eraahy.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
              {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149060/325673970_1330609744383879_1948598055105061611_n-lo6512y4_eqhjpg.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
           
              {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149062/392940688_6718679744896514_1996366525237976166_n-lo650zb3_xzrtwf.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
              {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149062/DSC00266_075808-lxsr3c2g_e3qtkr.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
              {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149064/DSC00260_075755-lxsqz2n1_yxi8jr.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
              {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149069/DSC00278_075858-lxsr524i_e9lthi.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
            {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149080/DSC00270_075832-lxsr62xa_fqk1qb.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
            {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149070/DSC00284_075906-lxsr77ad_j9qa4e.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
            {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149077/DSC00295_075919-lxsr9a4d_kawdnd.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
            {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149067/DSC00304_075939-lxsr9q9d_aswfkh.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
            {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149068/DSC00316_075951-lxsra8ak_exrw0p.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
         
             {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149087/IMG_20231028_144557_edit_19239357465211-loe5bb4b_md2obv.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
             {
                'photo': 'https://res.cloudinary.com/dpxess5iw/image/upload/v1724149091/IMG_20231119_122854-lpb4q4vm_rnsbzc.jpg',
                'alt': 'Kickbox Baia Mare Maramures'
            },
            
             

        ],
        imageGalleryOpen(event) {
            this.imageGalleryImageIndex = event.target.dataset.index;
            this.imageGalleryActiveUrl = event.target.src;
            this.imageGalleryOpened = true;
        },
        imageGalleryClose() {
            this.imageGalleryOpened = false;
            setTimeout(() => this.imageGalleryActiveUrl = null, 300);
        },
        imageGalleryNext(){
            this.imageGalleryImageIndex = (this.imageGalleryImageIndex == this.imageGallery.length) ? 1 : (parseInt(this.imageGalleryImageIndex) + 1);
            this.imageGalleryActiveUrl = this.$refs.gallery.querySelector('[data-index=\'' + this.imageGalleryImageIndex + '\']').src;
        },
        imageGalleryPrev() {
            this.imageGalleryImageIndex = (this.imageGalleryImageIndex == 1) ? this.imageGallery.length : (parseInt(this.imageGalleryImageIndex) - 1);
            this.imageGalleryActiveUrl = this.$refs.gallery.querySelector('[data-index=\'' + this.imageGalleryImageIndex + '\']').src;
            
        }
    }" 
    @image-gallery-next.window="imageGalleryNext()" 
    @image-gallery-prev.window="imageGalleryPrev()" 
    @keyup.right.window="imageGalleryNext();" 
    @keyup.left.window="imageGalleryPrev();"
    class="w-full h-full select-none">
    <div class="max-w-6xl mx-auto duration-1000 delay-300 opacity-0 select-none ease animate-fade-in-view" style="translate: none; rotate: none; scale: none; opacity: 1; transform: translate(0px, 0px);">
        <ul x-ref="gallery" id="gallery" class="grid grid-cols-2 gap-5 lg:grid-cols-5">
            <template x-for="(image, index) in imageGallery">
                <li><img x-on:click="imageGalleryOpen" :src="image.photo" :alt="image.alt" :data-index="index+1" class="object-cover select-none w-full h-auto bg-gray-200 rounded cursor-zoom-in aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]"></li>
            </template>
        </ul>
    </div>
    <template x-teleport="body">
        <div 
            x-show="imageGalleryOpened" 
            x-transition:enter="transition ease-in-out duration-300" 
            x-transition:enter-start="opacity-0" 
            x-transition:leave="transition ease-in-in duration-300" 
            x-transition:leave-end="opacity-0" 
            @click="imageGalleryClose" 
            @keydown.window.escape="imageGalleryClose" 
            x-trap.inert.noscroll="imageGalleryOpened"
            class="fixed inset-0 z-[99] flex items-center justify-center bg-black bg-opacity-50 select-none cursor-zoom-out" x-cloak>
            <div class="relative flex items-center justify-center w-11/12 xl:w-4/5 h-11/12"> 
                <div @click="$event.stopPropagation(); $dispatch('image-gallery-prev')" class="absolute left-0 flex items-center justify-center text-white translate-x-10 rounded-full cursor-pointer xl:-translate-x-24 2xl:-translate-x-32 bg-white/10 w-14 h-14 hover:bg-white/20">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                </div>
                <img 
                    x-show="imageGalleryOpened" 
                    x-transition:enter="transition ease-in-out duration-300" 
                    x-transition:enter-start="opacity-0 transform scale-50" 
                    x-transition:leave="transition ease-in-in duration-300" 
                    x-transition:leave-end="opacity-0 transform scale-50" 
                    class="object-contain object-center w-full h-full select-none cursor-zoom-out" :src="imageGalleryActiveUrl" alt="" style="display: none;">
                <div @click="$event.stopPropagation(); $dispatch('image-gallery-next');" class="absolute right-0 flex items-center justify-center text-white -translate-x-10 rounded-full cursor-pointer xl:translate-x-24 2xl:translate-x-32 bg-white/10 w-14 h-14 hover:bg-white/20">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
                </div>
            </div>
        </div>
    </template>
</div>

    <livewire:footer />
</body>

</html>
