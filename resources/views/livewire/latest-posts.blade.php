<section class="px-4 py-8 mx-auto md:py-12 max-w-7xl sm:px-6 lg:px-8">
    <h2 class="mb-12 text-4xl font-extrabold text-center text-red-900 font-roboto-condensed">Articole Recente</h2>

    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($latestPosts as $post)
            <article
                class="overflow-hidden transition-all duration-300 bg-white shadow-lg group rounded-2xl hover:shadow-xl">
                <a href="{{ route('blog.show', $post->slug) }}" class="block">
                    @if ($post->featured_image)
                        <div class="relative overflow-hidden aspect-w-16 aspect-h-9">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                                class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105">
                            <div
                                class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/60 to-transparent group-hover:opacity-100">
                            </div>
                        </div>
                    @endif

                    <div class="p-6">
                        <h3
                            class="text-2xl font-bold text-red-900 transition-colors duration-300 line-clamp-3 group-hover:text-gray-500">
                            {{ $post->title }}
                        </h3>
                        <time datetime="{{ $post->published_at->toDateString() }}"
                            class="block mt-2 text-sm text-gray-500">
                            {{ $post->published_at->format('j F Y') }}
                        </time>
                        <p class="mt-3 text-gray-600 line-clamp-3">
                            {{ strip_tags(Str::markdown($post->summary)) }}
                        </p>
                    </div>
                </a>
            </article>
        @endforeach
    </div>

    <div class="mt-12 text-center">
        <a href="{{ route('blog.index') }}"
            class="inline-flex items-center text-blue-500 transition-colors duration-300 hover:underline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                </path>
            </svg>
            Vezi toate articolele
        </a>
    </div>
</section>