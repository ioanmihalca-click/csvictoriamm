# `spatie/laravel-markdown-response` — implementare

Servește versiuni Markdown ale paginilor către AI agents (ChatGPT, Claude,
Perplexity, Bytespider, Google-Extended, …) astfel încât crawler-ele să
consume articolele într-un format mai curat decât HTML-ul nostru cu Livewire,
Alpine și Tailwind. Documentația oficială:
<https://spatie.be/docs/laravel-markdown-response/v1/basic-usage/serve-markdown-to-ai-agents>.

## De ce

- HTML-ul brut conține mult layout (header, footer, scripts, atribute Livewire) care e zgomot pentru un AI agent.
- Markdown-ul rezultat are doar conținutul semantic + linkuri absolute, care se traduce în mai puțini tokens și răspunsuri mai exacte de la asistenți.
- Trimite simultan și un header `Content-Signal: ai-train=disallow, ai-input=allow, search=allow` care declară explicit permisiunile (vezi <https://contentstandards.org>).

## Cum detectează un request „AI"

Implementat de `Spatie\MarkdownResponse\Actions\DetectsMarkdownRequest`. Trei căi, în ordine:

1. **Sufix `.md`** pe URL — ex. `/blog/foo.md`. Middleware-ul `RewriteMarkdownUrls` îl scoate **înainte** de routing, deci slug-ul `foo` se rezolvă normal, iar răspunsul HTML e apoi convertit în markdown.
2. **Header `Accept: text/markdown`** — middleware-ul îl swap-uiește cu `text/html` pentru request-ul intern, apoi convertește răspunsul.
3. **User-Agent** care conține (case-insensitive) unul din: `ClaudeBot`, `Claude-Web`, `Anthropic`, `PerplexityBot`, `Bytespider`, `Google-Extended`. Listă definită în `config/markdown-response.php` → `detection.detect_via_user_agents`.

## Fișiere atinse

| Fișier | Schimbare |
|---|---|
| `composer.json` | `+ spatie/laravel-markdown-response: ^1.2` |
| `bootstrap/app.php` | înregistrare manuală middleware (vezi caveat) |

Configul publicat trăiește la `config/markdown-response.php` doar dacă a fost publicat cu `php artisan vendor:publish --tag=markdown-response-config`. Momentan **nu** e publicat — folosim default-urile din pachet.

## Înregistrarea middleware-ului — caveat important

Service provider-ul pachetului încearcă auto-înregistrarea în `MarkdownResponseServiceProvider::packageRegistered()`:

```php
$kernel = $this->app->make(Kernel::class);
$kernel->pushMiddleware(Middleware\RewriteMarkdownUrls::class);
```

**Asta nu funcționează în Laravel 13** cu noul `bootstrap/app.php` — `Application::configure()->withMiddleware(...)` rulează după provider și suprascrie middleware-ul global, deci `RewriteMarkdownUrls` se pierde. `ProvideMarkdownResponse`, dacă nu îl adaugi manual, nu se înregistrează deloc.

Soluție aplicată în `bootstrap/app.php`:

```php
use Spatie\MarkdownResponse\Middleware\ProvideMarkdownResponse;
use Spatie\MarkdownResponse\Middleware\RewriteMarkdownUrls;

->withMiddleware(function (Middleware $middleware) {
    // RewriteMarkdownUrls trebuie *prepend* — strips `.md` din URL înainte
    // de routing, ca slug-ul să se rezolve corect.
    $middleware->prepend(RewriteMarkdownUrls::class);
    $middleware->append(ProvideMarkdownResponse::class);
})
```

Ordinea contează:

- `RewriteMarkdownUrls` **prepend** — trebuie să ruleze înaintea oricărui middleware care citește path-ul (rate-limit, CSRF etc.) și înainte de matcher-ul de rute.
- `ProvideMarkdownResponse` **append** — vrea răspunsul HTML deja randat de Livewire / controller, ca să-l convertească.

## Cache

- Activat implicit (`MARKDOWN_RESPONSE_CACHE_ENABLED=true`), TTL 1h, store default (database driver din `.env`).
- Cheia ignoră parametrii `utm_*`, `gclid`, `fbclid` — același URL cu UTM-uri diferite folosește o singură intrare.
- Curățare manuală: `php artisan markdown-response:clear` *(nu* `markdown-response:clear-cache`).

## Driver de conversie

- Default: **`league`** (`league/html-to-markdown` v5). Opțiuni active: `strip_tags: true`, `hard_break: true`.
- Alternativ: **`cloudflare`** (Workers AI) — necesită `CLOUDFLARE_ACCOUNT_ID` și `CLOUDFLARE_API_TOKEN`. Nu îl folosim.
- Pre-procesori: `RemoveScriptsAndStylesPreprocessor` (scoate `<script>`, `<style>` din HTML înainte de conversie).
- Post-procesori: `RemoveHtmlTagsPostprocessor`, `CollapseBlankLinesPostprocessor`.

## Headers de răspuns

Un răspuns markdown convertit conține:

```
Content-Type:    text/markdown; charset=UTF-8
Vary:            Accept
X-Robots-Tag:    noindex
X-Markdown-Tokens: <estimare bazată pe lungime/4>
Content-Signal:  ai-train=disallow, ai-input=allow, search=allow
```

`X-Robots-Tag: noindex` protejează variantele `.md` din SERP — Google nu le indexează ca duplicate.

## Atribute pe controllere / componente

```php
use Spatie\MarkdownResponse\Attributes\ProvideMarkdown;
use Spatie\MarkdownResponse\Attributes\DoNotProvideMarkdown;

#[ProvideMarkdown]     // forțează conversie, chiar fără header/sufix
public function show() { … }

#[DoNotProvideMarkdown] // dezactivează conversia pentru endpoint
public function api()  { … }
```

Nu sunt folosite momentan; default-ul global acoperă tot site-ul. Aplică-le doar dacă vrei să excluzi rute specifice (ex. `api/posts/*/track-share` din `routes/web.php` — deși răspund JSON, deci middleware-ul nu le convertește oricum).

## Verificare manuală

```bash
# HTML normal (browser)
curl -ks -D - https://victoria-mm.test/blog/<slug>

# Forțat prin sufix
curl -ks -D - https://victoria-mm.test/blog/<slug>.md

# Forțat prin Accept header
curl -ks -D - -H "Accept: text/markdown" https://victoria-mm.test/blog/<slug>

# Forțat prin user-agent AI
curl -ks -D - -A "ClaudeBot/1.0" https://victoria-mm.test/blog/<slug>
```

Toate ultimele 3 trebuie să răspundă `Content-Type: text/markdown; charset=UTF-8`.

## Dezactivare rapidă

În `.env`:

```
MARKDOWN_RESPONSE_ENABLED=false
```

Middleware-ele rămân înregistrate dar pasează request-ul mai departe fără conversie. Util pentru debugging când suspectezi conversia ca sursă de bug.
