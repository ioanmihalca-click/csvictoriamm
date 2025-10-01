# Schema.org Components - CS Victoria MM

## Componente Disponibile

### 1. `<x-faq-schema />`

**Utilizare:** Pagina principală (app.blade.php)

Generează FAQPage Schema cu 8 întrebări frecvente despre:

-   Tipuri de antrenamente
-   Locație sală
-   Orar
-   Sesiuni de probă
-   Kickboxing pentru copii
-   Antrenor
-   Afiliere federație
-   Echipament necesar

**Beneficii SEO:**

-   Featured Snippets în Google
-   Rich Results
-   Voice Search optimization

---

### 2. `<x-organization-schema />`

**Utilizare:** Pagina principală (app.blade.php)

Generează Organization Schema cu:

-   Contact details
-   Social media links
-   Video channel
-   Founder information
-   Address

**Beneficii:**

-   Knowledge Graph
-   Rich Business Cards
-   Social Media integration

---

### 3. `<x-competition-schema :competition="$competition" />`

**Utilizare:** Loop competiții (competitii.blade.php)

Generează SportsEvent Schema pentru fiecare competiție:

-   Event name, date, location
-   Results (dacă există)
-   Organizer information

**Beneficii:**

-   Event Rich Results
-   Google Calendar integration
-   Local search visibility

---

## Integrare Automată

Toate componentele sunt deja integrate în template-urile corespunzătoare:

```blade
<!-- app.blade.php -->
<x-faq-schema />
<x-organization-schema />

<!-- competitii.blade.php (în loop) -->
@foreach ($competitions as $competition)
    <x-competition-schema :competition="$competition" />
@endforeach
```

## Schema.org Incluse Direct în Template

### articol-blog.blade.php

-   BlogPosting Schema
-   BreadcrumbList Schema

### blog.blade.php

-   Blog Schema
-   BreadcrumbList Schema
-   SportsClub Schema

### competitii.blade.php

-   Microdata inline (itemprop)

## Testare

### Validare Schema.org

```
https://validator.schema.org/
```

### Google Rich Results Test

```
https://search.google.com/test/rich-results
```

### Paste URL-ul live sau codul HTML

---

**Note:** Toate schema-urile sunt optimizate pentru AI Search 2025 și respectă best practices Google.
