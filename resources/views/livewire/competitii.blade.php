<div>
    <div class="px-4 py-16 bg-gray-100 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <h2 class="mb-12 text-4xl font-extrabold text-center text-red-900 font-roboto-condensed">Competiții</h2>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($competitions as $competition)
                    <article
                        class="overflow-hidden transition-all duration-300 bg-white shadow-md rounded-xl hover:shadow-xl">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ $competition->image_url ?? 'https://csvictoriamm.ro/storage/blog-images/default-competition.jpg' }}"
                                alt="{{ $competition->name }}"
                                class="object-cover w-full h-full transition duration-300 ease-in-out transform hover:scale-105">
                            <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black to-transparent">
                                <h3 class="text-xl font-bold text-white">{{ $competition->name }}</h3>
                                <p class="text-sm text-gray-300">
                                    {{ \Carbon\Carbon::parse($competition->date)->format('d F Y') }} @
                                    {{ $competition->location }}</p>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="mb-4 text-gray-600">{{ $competition->description }}</p>

                            @if ($competition->results)
                                <div class="mb-4">
                                    <h4 class="mb-2 font-semibold text-red-900">Rezultatele obținute:</h4>
                                    {!! $competition->results !!}
                                </div>
                            @endif

                            @if ($competition->notes)
                                <p class="mb-4 text-sm italic text-gray-600">
                                    {{ $competition->notes }}
                                </p>
                            @endif

                            @if ($competition->details_url)
                                <a href="{{ $competition->details_url }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center text-red-900 transition-colors duration-200 hover:text-red-700">
                                    Vezi detalii
                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14M12 5l7 7-7 7" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </article>


                @empty
                    <div class="col-span-3 p-8 text-center">
                        <p class="text-lg text-gray-600">Nu există competiții în prezent.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</div>
