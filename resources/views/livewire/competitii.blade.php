<div>
    <div class="px-4 py-16 bg-gray-100 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <h2 class="mb-12 text-4xl font-extrabold text-center text-red-900 font-roboto-condensed">Competiții</h2>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($competitions as $competition)
                    <article
                        class="overflow-hidden transition-all duration-300 bg-white shadow-md rounded-xl hover:shadow-xl">
                        <div class="relative h-auto overflow-hidden">
                            <img src="{{ $competition->image_url }}" alt="{{ $competition->title }}"
                                class="object-cover w-auto h-auto transition duration-300 ease-in-out transform hover:scale-105">
                            <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black to-transparent">
                                <h3 class="text-xl font-bold text-white">{{ $competition->title }}</h3>
                                <p class="text-sm text-gray-300">
                                    {{ \Carbon\Carbon::parse($competition->date)->format('d F Y') }} @
                                    {{ $competition->location }}</p>
                            </div>
                        </div>
                        <div class="p-6">
                            <!-- SOLUȚIA: Aplică stiluri direct prin clasele Tailwind -->
                            <div
                                class="mb-4 text-gray-600 prose prose-sm prose-gray max-w-none 
                                        prose-p:mb-3 prose-p:leading-relaxed prose-p:text-gray-600
                                        prose-strong:font-semibold prose-strong:text-red-900
                                        prose-ul:mb-3 prose-li:text-gray-600
                                        prose-ol:mb-3 prose-h3:text-red-900 prose-h3:font-semibold
                                        prose-h2:text-red-900 prose-h2:font-semibold">
                                {!! $competition->description !!}
                            </div>

                            @if ($competition->results)
                                <div class="mb-4">
                                    <h4 class="mb-2 font-semibold text-red-900">Rezultatele obținute:</h4>
                                    <div
                                        class="text-gray-600 prose prose-sm prose-gray max-w-none 
                                               prose-p:mb-2 prose-p:text-gray-600
                                               prose-strong:font-semibold prose-strong:text-red-900
                                               prose-ul:mb-2 prose-li:text-gray-600
                                               prose-ol:mb-2">
                                        {!! $competition->results !!}
                                    </div>
                                </div>
                            @endif

                            @if ($competition->notes)
                                <div
                                    class="mb-4 text-sm italic text-gray-600 prose prose-sm prose-gray max-w-none 
                                           prose-p:mb-2 prose-p:text-gray-600 prose-p:text-sm prose-p:italic">
                                    {!! $competition->notes !!}
                                </div>
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
