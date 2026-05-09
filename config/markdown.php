<?php

use Spatie\LaravelMarkdown\MarkdownRenderer;

return [
    'code_highlighting' => [
        /*
         * Articolele clubului sportiv nu conțin code blocks, așa că dezactivăm
         * Shiki pentru a evita overhead-ul lui (~MB de teme).
         */
        'enabled' => false,

        'theme' => 'github-light',
    ],

    /*
     * Adaugă id="..." pe toate heading-urile — AI agents și Google
     * Featured Snippets pot linka direct la secțiuni (#fragment).
     */
    'add_anchors_to_headings' => true,

    /*
     * Wrap heading-urile într-un <a href="#id"> — utilizatorii (și AI agents)
     * pot copia URL-ul fragmentului cu un click pe titlu.
     */
    'render_anchors_as_links' => true,

    /*
     * Permitem HTML inline în markdown (iframe YouTube, embed-uri) dar
     * blocăm link-urile unsafe (javascript:, data:) pentru protecție XSS.
     */
    'commonmark_options' => [
        'html_input' => 'allow',
        'allow_unsafe_links' => false,
    ],

    /*
     * Folosește store-ul implicit din config/cache.php (database driver,
     * conform .env). Render-ul markdown e cache-uit per hash al body-ului.
     */
    'cache_store' => null,

    /*
     * 7 zile — articolele se schimbă rar; cheia se invalidează automat
     * când body-ul se modifică (key = hash al markdown-ului).
     */
    'cache_duration' => 60 * 60 * 24 * 7,

    'renderer_class' => MarkdownRenderer::class,

    'extensions' => [
        //
    ],

    'block_renderers' => [
        //
    ],

    'inline_renderers' => [
        //
    ],

    'inline_parsers' => [
        //
    ],
];
