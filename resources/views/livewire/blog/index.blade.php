<section class="px-4 py-8 mx-auto md:py-12 max-w-7xl sm:px-6 lg:px-8">
    <!-- Breadcrumbs -->
    <nav class="mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 text-sm" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="{{ route('prima-pagina') }}" class="text-gray-600 hover:text-red-900" itemprop="item">
                    <span itemprop="name">Acasă</span>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <li class="text-gray-400">/</li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span class="text-gray-900" itemprop="name" aria-current="page">Blog</span>
                <meta itemprop="position" content="2" />
            </li>
        </ol>
    </nav>

    <h1 class="mb-12 text-4xl font-extrabold text-center text-red-900 font-roboto-condensed">Articole pe Blog</h1>

    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
            <article
                class="overflow-hidden transition-all duration-300 bg-white shadow-lg group rounded-2xl hover:shadow-xl">
                <a href="{{ route('blog.show', $post->slug) }}" class="block">
                    @if ($post->featured_image)
                        <div class="relative overflow-hidden aspect-w-16 aspect-h-9">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                                width="400" height="225" loading="lazy"
                                class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105">
                            <div
                                class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/60 to-transparent group-hover:opacity-100">
                            </div>
                        </div>
                    @endif

                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-red-900 transition-colors duration-300 line-clamp-3 group-hover:text-gray-500"
                            itemprop="headline">
                            {{ $post->title }}
                        </h2>
                        <time datetime="{{ $post->published_at->toDateString() }}"
                            class="block mt-2 text-sm text-gray-500" itemprop="datePublished">
                            {{ $post->published_at->format('j F Y') }}
                        </time>
                        <p class="mt-3 text-gray-600 line-clamp-3" itemprop="description">
                            {{ strip_tags(Str::markdown($post->summary)) }}
                        </p>
                    </div>
                </a>
            </article>
        @endforeach
    </div>

    <div class="mt-12">
        {{ $posts->links() }}
    </div>

    <div class="mt-12 text-center">
        <a href="/" class="inline-flex items-center text-blue-500 transition-colors duration-300 hover:underline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Pagina principala
        </a>
    </div>
</section>
