<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\MarkdownResponse\Middleware\ProvideMarkdownResponse;
use Spatie\MarkdownResponse\Middleware\RewriteMarkdownUrls;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Servește versiuni Markdown ale paginilor către AI agents (ChatGPT,
        // Claude, Perplexity, …) când fac request cu `Accept: text/markdown`,
        // URL `.md`, sau cu un user-agent cunoscut de bot AI.
        //
        // RewriteMarkdownUrls trebuie *prepend* — strips `.md` din URL înainte
        // de routing, ca slug-ul să se rezolve corect.
        $middleware->prepend(RewriteMarkdownUrls::class);
        $middleware->append(ProvideMarkdownResponse::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
