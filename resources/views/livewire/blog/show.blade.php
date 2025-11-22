<!-- Breadcrumbs -->
<nav class="max-w-4xl px-4 py-3 mx-auto mb-4" aria-label="Breadcrumb">
    <ol class="flex items-center space-x-2 text-sm" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="{{ route('prima-pagina') }}" class="text-gray-600 hover:text-red-900" itemprop="item">
                <span itemprop="name">Acasă</span>
            </a>
            <meta itemprop="position" content="1" />
        </li>
        <li class="text-gray-400">/</li>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="{{ route('blog.index') }}" class="text-gray-600 hover:text-red-900" itemprop="item">
                <span itemprop="name">Blog</span>
            </a>
            <meta itemprop="position" content="2" />
        </li>
        <li class="text-gray-400">/</li>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span class="text-gray-900" itemprop="name" aria-current="page">{{ Str::limit($post->title, 50) }}</span>
            <meta itemprop="position" content="3" />
        </li>
    </ol>
</nav>

<div class="py-4">
    <article class="max-w-4xl p-4 mx-auto bg-white rounded-lg shadow-md"
        data-post-id="{{ $post->id }}"
        itemscope
        itemtype="https://schema.org/BlogPosting">
        <h1 class="mb-4 text-2xl font-bold text-red-900 font-roboto-condensed md:text-4xl" itemprop="headline">
            {{ $post->title }}</h1>

        <div class="mb-4 text-gray-600">
            Publicat la data de <time datetime="{{ $post->published_at->format('Y-m-d') }}"
                itemprop="datePublished">{{ $post->published_at->format('F j, Y') }}</time> de <span itemprop="author"
                itemscope itemtype="https://schema.org/Person"><span itemprop="name">CS Victoria MM</span></span>
            <meta itemprop="dateModified" content="{{ $post->updated_at->format('Y-m-d') }}">
        </div>

        @if ($post->featured_image)
            <div class="relative mb-6 overflow-hidden rounded-lg aspect-w-16 aspect-h-9">
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" width="1200"
                    height="630" loading="eager" class="object-cover w-full h-full">
            </div>
        @endif

        <div class="prose text-gray-800 max-w-none" itemprop="articleBody">
            {!! $post->body !!}
        </div>

        {{-- Butoane Share --}}
        <div class="my-4 text-gray-600">
            Împărtășește această poveste:
        </div>
        <div class="flex mt-4 space-x-4 share-buttons" role="group" aria-label="Butoane distribuire pe social media">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}"
                target="_blank" rel="noopener noreferrer" aria-label="Distribuie pe Facebook"
                data-share="facebook">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                    class="text-gray-900 hover:text-red-900 bi bi-facebook" viewBox="0 0 16 16">
                    <path
                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                </svg>
            </a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $post->slug)) }}"
                target="_blank" rel="noopener noreferrer" aria-label="Distribuie pe LinkedIn"
                data-share="linkedin">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                    class="text-gray-900 hover:text-red-900 bi bi-linkedin" viewBox="0 0 16 16">
                    <path
                        d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                </svg> </a>
            <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title) }} - {{ urlencode(route('blog.show', $post->slug)) }}"
                target="_blank" rel="noopener noreferrer" aria-label="Distribuie pe WhatsApp"
                data-share="whatsapp">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                    class="text-gray-900 hover:text-red-900 bi bi-whatsapp" viewBox="0 0 16 16">
                    <path
                        d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                </svg> </a>
        </div>



        <div class="mt-8">
            <a href="{{ route('blog.index') }}" class="text-blue-500 hover:underline">&larr; Inapoi la Blog</a>

        </div>


    </article>



    {{-- Articole recomandate --}}
    @if ($recommendedPosts->isNotEmpty())
        <section class="max-w-4xl px-4 mx-auto mt-12">
            <h2 class="mb-6 text-2xl font-bold text-gray-900">Articole similare</h2>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($recommendedPosts as $post)
                    <article
                        class="overflow-hidden transition-all duration-300 bg-white shadow-lg group rounded-2xl hover:shadow-xl">
                        <a href="{{ route('blog.show', $post->slug) }}" class="block">
                            <div class="relative overflow-hidden aspect-w-16 aspect-h-9">
                                @if ($post->featured_image)
                                    <img src="{{ asset('storage/' . $post->featured_image) }}"
                                        alt="{{ $post->title }}" width="400" height="225" loading="lazy"
                                        class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105">
                                    <div
                                        class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/60 to-transparent group-hover:opacity-100">
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <h3
                                    class="text-xl font-semibold text-gray-900 transition-colors duration-300 group-hover:text-blue-600">
                                    {{ $post->title }}
                                </h3>
                                <time datetime="{{ $post->published_at->toDateString() }}"
                                    class="block mt-2 text-sm text-gray-500">
                                    {{ $post->published_at->format('j F Y') }}
                                </time>
                                <p class="mt-3 text-gray-600 line-clamp-3">
                                    {{ $post->summary }}
                                </p>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </section>
    @endif
</div>
