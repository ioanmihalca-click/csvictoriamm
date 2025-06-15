<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Class Namespace
    |--------------------------------------------------------------------------
    |
    | This value sets the root class namespace for Livewire component classes in
    | your application. This value affects component auto-discovery and
    | any Livewire file helper commands, like `artisan make:livewire`.
    |
    | After changing this item, run: `php artisan livewire:discover`.
    |
    */

    'class_namespace' => 'App\\Livewire',

    /*
    |--------------------------------------------------------------------------
    | View Path
    |--------------------------------------------------------------------------
    |
    | This value sets the path for Livewire component views. This affects
    | file manipulation helper commands like `artisan make:livewire`.
    |
    */

    'view_path' => resource_path('views/livewire'),

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    | The default layout view that will be used when rendering a component via
    | Route::get('/some-endpoint', SomeComponent::class);. In this case the
    | the view returned by SomeComponent will be wrapped in "layouts.app"
    |
    */

    'layout' => 'layouts.app',

    /*
    |---------------------------------------------------------------------------
    | Temporary File Uploads - CONFIGURARE OPTIMIZATĂ PENTRU FILAMENT
    |---------------------------------------------------------------------------
    |
    | Această configurație rezolvă problema cu resetarea FileUpload-ului
    | la prima încărcare în Filament. Este esențială pentru funcționarea corectă.
    |
    */

    'temporary_file_upload' => [
        'disk' => 'local',        // Folosește disk-ul local pentru temporare
        'rules' => ['required', 'file', 'max:20480'], // 20MB max (în KB)
        'directory' => 'livewire-tmp',   // Director pentru fișiere temporare
        'middleware' => 'throttle:60,1', // Rate limiting
        'preview_mimes' => [   // Tipuri de fișiere suportate pentru preview
            'png',
            'gif',
            'bmp',
            'svg',
            'wav',
            'mp4',
            'mov',
            'avi',
            'wmv',
            'mp3',
            'm4a',
            'jpg',
            'jpeg',
            'mpga',
            'webp',
            'wma',
        ],
        'max_upload_time' => 10, // 10 minute pentru upload mare
        'cleanup' => true, // Curăță fișierele temporare mai vechi de 24h
    ],

    /*
    |---------------------------------------------------------------------------
    | Render On Redirect
    |---------------------------------------------------------------------------
    |
    | Această valoare determină dacă Livewire va rula metoda `render()` a unei 
    | componente după ce a fost declanșată o redirecționare.
    |
    */

    'render_on_redirect' => false,

    /*
    |---------------------------------------------------------------------------
    | Eloquent Model Binding
    |---------------------------------------------------------------------------
    |
    | Versiunile anterioare ale Livewire suportau binding direct la proprietățile
    | modelului eloquent folosind wire:model în mod implicit. Acest comportament
    | a fost considerat prea "magic" și a fost pus sub un feature flag.
    |
    */

    'legacy_model_binding' => false,

    /*
    |---------------------------------------------------------------------------
    | Auto-inject Frontend Assets
    |---------------------------------------------------------------------------
    |
    | În mod implicit, Livewire injectează automat JavaScript și CSS în
    | <head> și <body> ale paginilor care conțin componente Livewire.
    |
    */

    'inject_assets' => true,

    /*
    |---------------------------------------------------------------------------
    | Navigate (SPA mode)
    |---------------------------------------------------------------------------
    |
    | Prin adăugarea `wire:navigate` la link-urile din aplicația Livewire,
    | Livewire va preveni gestionarea implicită a link-ului și va solicita
    | acele pagini via AJAX, creând un efect asemănător SPA.
    |
    */

    'navigate' => [
        'show_progress_bar' => true,
        'progress_bar_color' => '#2299dd',
    ],

    /*
    |---------------------------------------------------------------------------
    | HTML Morph Markers
    |---------------------------------------------------------------------------
    |
    | Livewire "morphs" în mod inteligent HTML-ul existent în HTML-ul nou 
    | renderizat după fiecare actualizare. Pentru a face acest proces mai 
    | fiabil, Livewire injectează "markere" în Blade-ul renderizat.
    |
    */

    'inject_morph_markers' => true,

    /*
    |---------------------------------------------------------------------------
    | Pagination Theme
    |---------------------------------------------------------------------------
    |
    | Când activezi funcția de paginare a Livewire folosind trait-ul 
    | `WithPagination`, Livewire va folosi șabloane Tailwind pentru a randa
    | vizualizările de paginare pe pagină.
    |
    */

    'pagination_theme' => 'tailwind',

];
