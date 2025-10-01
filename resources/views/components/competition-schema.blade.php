@props(['competition'])

<!-- Schema.org pentru Competiție / Event -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SportsEvent",
  "name": "{{ $competition->title }}",
  "description": "{{ strip_tags($competition->description) }}",
  "startDate": "{{ \Carbon\Carbon::parse($competition->date)->format('Y-m-d') }}",
  "location": {
    "@type": "Place",
    "name": "{{ $competition->location }}",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "{{ $competition->location }}"
    }
  },
  "image": "{{ $competition->image_url }}",
  "organizer": {
    "@type": "SportsOrganization",
    "name": "Club Sportiv Victoria Maramureș",
    "url": "https://csvictoriamm.ro"
  },
  "sport": "Freestyle Kickboxing",
  @if($competition->results)
  "eventStatus": "https://schema.org/EventScheduled",
  "about": {
    "@type": "Thing",
    "name": "Rezultate Competiție Kickboxing"
  },
  @endif
  "inLanguage": "ro-RO"
}
</script>
