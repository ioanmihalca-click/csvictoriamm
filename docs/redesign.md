# Redesign „Brutalist-Sport" — jurnal de implementare

Acest document descrie migrarea UI de la stilul Tailwind roșu/alb anterior la sistemul de design **brutalist-sport** livrat de designer în `redesign/`.

## Direcția vizuală

- **Paletă**: fond `#0a0a0a` (ink), text bej `#fafaf7` (bone), accent roșu `#dc2626` (red), borduri hairline `#262626` (line).
- **Tipografie**: Oswald (titluri display), Archivo (text / condensed weights), JetBrains Mono (labels, breadcrumb-uri, chip-uri).
- **Limbaj grafic**: grid-uri cu linii hairline, placeholder-e cu dungi diagonale, cruci de vizor, banda de „caution" dungată roșu/negru, butoane cu săgeți desenate din pseudo-elemente, chip-uri cu pătrat roșu la început.
- **Tot copy-ul vizibil este în română**, inclusiv headline-ul hero („LUPTĂ MAI DUR. ANTRENEAZĂ-TE ISTEȚ.") și crumb-ul de pe pagina Antrenamente.
- **Fără FontAwesome** în componentele redesainate — iconițele sociale din footer sunt SVG line-only.

## Scope — ce e migrat și ce nu

| Pagină / fragment | Status | Fișier |
|---|---|---|
| Header | ✅ Migrat | `resources/views/livewire/header-nav.blade.php` |
| Footer | ✅ Migrat | `resources/views/livewire/footer.blade.php` |
| Prima pagină | ✅ Migrat | `resources/views/livewire/prima-pagina.blade.php` |
| Antrenamente | ✅ Migrat | `resources/views/livewire/antrenamente.blade.php` |
| Galerie | ⏳ **Nu e migrat** | folosește vechiul markup Tailwind |
| Competiții | ⏳ **Nu e migrat** | — |
| Sponsori | ⏳ **Nu e migrat** | — |
| Echipa | ⏳ **Nu e migrat** | — |
| Contact | ⏳ **Nu e migrat** | — |
| Blog (index / show) | ⏳ **Nu e migrat** | — |

**Atenție**: `public/css/brand.css` setează `html, body { background: #0a0a0a; color: #fafaf7 }` **global**. Paginile nemigrate încă au containere albe interne din Tailwind (ex. `bg-gray-50`) care compensează local, dar pot apărea artefacte în spațiile fără wrapper. Migrarea lor e next-step.

## Arhitectură CSS

- `redesign/styles/brand.css` (147 linii, neatins) → copiat 1:1 în `public/css/brand.css`, apoi **extins** cu:
  - Regulile per-pagină din `<style>` inline din `redesign/Homepage.html` (hero, disciplines, about, schedule, coach, why, cta-banner, locations, gallery, final, caution).
  - Regulile per-pagină din `<style>` inline din `redesign/Antrenamente.html` (phero, facts, programs, week, method, faq).
  - Utilitare custom pentru integrarea noastră:
    - `.nav-logo` — stilizare logo image în header.
    - `.nav-burger` + `.nav-mobile` — hamburger Alpine + drawer fullscreen (nu există în designul original — adăugat pentru UX mobile).
    - `.ph-img` — permite înlocuirea `<div class="ph">` placeholder-ului cu `<img>` real păstrând rama și label-urile.
    - `.foot-social` — iconițe SVG monoline (replacement pentru FA).
    - `.reviews` / `.latest` — wrapper-e pentru widget Elfsight și `<livewire:latest-posts />`.

**Fișierul este monolitic (~780 linii) și nu e prelucrat prin Vite.** Este servit static din `public/css/brand.css` via tag `<link>` în `app.blade.php`. Fonturile Google (Oswald / Archivo / JetBrains Mono) sunt încărcate direct prin `<link>` separat — nu prin `fonts.bunny.net`.

**Tailwind nu e dezinstalat.** Bundle-ul `app.css` generat de Vite coexistă cu `brand.css` și rămâne folosit de paginile nemigrate. Ordinea de încărcare: `brand.css` înainte de `@vite(['resources/css/app.css'])`, deci regulile Tailwind au precedență pe paginile încă pe Tailwind.

## Componente Livewire — ce a fost păstrat

Rescrierea nu a atins clasele PHP din `app/Livewire/`. Singurele modificări sunt în blade-uri. Am păstrat:

- **Textul „Despre noi" intact** (7 paragrafe) în `prima-pagina.blade.php`, cu mecanica „Citește mai mult" (Alpine `x-data="{ expanded: false }"`).
- **Widget-ul Elfsight Google Reviews** (div cu clasă `elfsight-app-630db31d-36a2-4674-90a9-e4b40d06b39e` + `data-elfsight-app-lazy`) într-o secțiune dedicată `.reviews` între Galerie și Final CTA. Scriptul platform.js rămâne în `app.blade.php` linia 331.
- **`<livewire:latest-posts />`** într-o secțiune `.latest` imediat după review-uri.
- **SEO / JSON-LD** — blocul `<script type="application/ld+json">` din `app.blade.php` (linii 188-260) plus componentele `<x-faq-schema />` și `<x-organization-schema />` rămân neschimbate.
- **Google Analytics** și **site-verification** din `<head>` rămân.
- **Linkurile sociale** (TikTok, YouTube, Facebook, Instagram) din footer — URL-uri identice, dar iconițele FontAwesome au fost înlocuite cu SVG-uri.

## Navigare + rutare

- Header = 7 linkuri wire:navigate (Prima pagină, Antrenamente, Galerie, Competiții, Echipa, Sponsori, Blog) + buton CTA roșu „Sesiune probă" spre `route('contact')`.
- Active state: `{{ request()->routeIs('nume-rutei') ? 'on' : '' }}` aplică clasa `.on` (linie roșie sub link). Pentru blog folosim pattern `blog.*` ca să prindă și `blog.show`.
- Logo: `<img src="{{ asset('assets/CS-Victoria-Maramures.webp') }}">` + blocul text „Victoria / CS · MARAMUREȘ · EST. 2021" alături.
- **Mobile**: la `<1100px`, `.nav-links` + `.phone` dispar, apare `.nav-burger`. Click → drawer fullscreen peste conținut, linkuri Oswald, închide cu ESC sau click în afara item-ului.

## Layout — modificări în `app.blade.php`

- Adăugate `<link>` pentru Google Fonts (Oswald/Archivo/JetBrains Mono) și `<link rel="stylesheet" href="{{ asset('css/brand.css') }}">` între FontAwesome/Figtree/Roboto și `@vite`.
- Scos clasa `bg-white` de pe `<body>` și scos spacer-ul `<div class="h-24 md:h-28"></div>` (header-ul nou e `position:sticky`, nu mai are nevoie de compensare).
- FontAwesome CDN rămâne încărcat pentru paginile care încă depind de el.

## FAQ — conversie Alpine

Scriptul inline din `redesign/Antrenamente.html`:
```js
document.querySelectorAll('.faq-item').forEach(el=>el.addEventListener('click',()=>el.classList.toggle('open')));
```

A fost înlocuit complet cu Alpine per-item:
```blade
<div class="faq-item" x-data="{ open: false }" :class="{ 'open': open }" @click="open = !open"
     role="button" tabindex="0" @keydown.enter="open = !open" @keydown.space.prevent="open = !open">
```

Comportament identic (multiple item-uri deschise simultan), plus accesibilitate keyboard. Primul item este `open: true` by default. CSS-ul `.faq-item.open .body { display:block }` + `.faq-item.open .plus { transform:rotate(45deg) }` rămâne ca în design.

## Mapare imagini

Slot-urile placeholder din redesign au fost înlocuite cu asset-urile existente din `public/assets/`. Slot-urile fără potrivire au rămas ca `.ph` cu etichetă română vizibilă (trebuie adăugate ulterior imagini reale):

| Slot original | Asset folosit | Status |
|---|---|---|
| hero-01 · ring-scene | `Kickboxing-Baia-Mare.webp` | ✅ |
| about-01 · team-group | `csvictoriamm-colaj.webp` | ✅ |
| about-02 · medal-wall | `.ph.ph-red` fallback | ⏳ de completat |
| about-03 · ring-training | `antrenamente.webp` | ✅ |
| coach-01 · ioan-mihalca | `.ph` fallback „ANTRENOR · PORTRET" | ⏳ de completat |
| loc-baia-mare | `Kickboxing-Baia-Mare.webp` | ✅ |
| loc-petrova | `.ph` fallback | ⏳ de completat |
| loc-poienile | `.ph` fallback | ⏳ de completat |
| gallery ring-01 (striking) | `Kickboxing-Baia-Mare.webp` | ✅ |
| gallery copii-01 | `antrenamente-copii.webp` | ✅ |
| gallery podium-2025 | `.ph.ph-red` fallback | ⏳ de completat |
| gallery bjj-01 | `unsplash-image.webp` | ✅ |
| gallery coach-01 | `.ph` fallback | ⏳ de completat |
| gallery gala-02 | `.ph` fallback | ⏳ de completat |
| gallery team-03 | `antrenamente.webp` (refolosit) | ✅ |
| gallery functional-01 | `unsplash-image1.webp` | ✅ |
| antrenamente hero | `antrenamente.webp` | ✅ |

Pentru a adăuga o imagine nouă: pune webp-ul în `public/assets/`, apoi înlocuiește `<div class="ph"><span class="ph-label">...</span></div>` cu `<div class="ph"><img src="{{ asset('assets/X.webp') }}" alt="..." class="ph-img"></div>`.

## Todo pentru iterații viitoare

1. **Migrare pagini rămase** la markup brutalist: galerie, competiții, sponsori, echipa, contact, blog.index, blog.show. Pattern de urmat: copie structura wrapper-ului folosit în `prima-pagina.blade.php` (secțiuni cu `.section-meta`, `.hero` / `.phero`, caution stripes, cta-banner).
2. **Completare imagini lipsă** — 7 slot-uri `.ph` așteaptă fotografii reale (medal wall, portret antrenor, Petrova, Poienile, podium, gală, coach secundar).
3. **Curățare FontAwesome** după ce toate paginile sunt migrate — se poate scoate `<link>` FA din `app.blade.php`.
4. **Eliminare Figtree / Roboto Condensed** după ce toate paginile folosesc Oswald/Archivo.
5. **Overlay de loading** din `app.blade.php:306-322` este încă alb (`bg-white bg-opacity-90`) — ar putea fi înlocuit cu un overlay ink pentru coerență vizuală.
6. **Schema-urile SEO** (JSON-LD din layout) pot fi actualizate cu cifrele noi (100+ sportivi, 3 locații, 100+ medalii) afișate în hero.
7. **Unsplash-image.webp / unsplash-image1.webp** sunt folosite ca fallback în gallery și BJJ — de înlocuit cu imagini proprii.

## Comenzi rapide de verificare

```bash
# După editare blade
php artisan view:clear
php artisan view:cache    # confirmă sintaxa

# Rebuild asset-uri (Tailwind + JS; brand.css e static)
npm run build
npm run dev               # watch mode

# Audit linkuri hardcodate
grep -rE 'href="#"|href="index\.html|href="Antrenamente\.html' resources/views/livewire/

# Lint PHP
vendor/bin/pint --dirty --format agent
```

## Fișiere atinse în această sesiune

- **Creat**: `public/css/brand.css` (~780 linii — sistem complet de design)
- **Creat**: `docs/redesign.md` (acest document)
- **Editat**: `resources/views/components/layouts/app.blade.php` (fonts, link brand.css, body class)
- **Rescris**: `resources/views/livewire/header-nav.blade.php`
- **Rescris**: `resources/views/livewire/footer.blade.php`
- **Rescris**: `resources/views/livewire/prima-pagina.blade.php`
- **Rescris**: `resources/views/livewire/antrenamente.blade.php`

Nu au fost atinse: clasele PHP din `app/Livewire/`, rutele din `routes/web.php`, componentele schema din `resources/views/components/`, filament/, blog/, vendor/.
