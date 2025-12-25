<x-app-layout
    title="Blog & Insights – Digitale Produkte, SaaS & Automatisierung | Digitalpackt"
    metaDescription="Lesen Sie aktuelle Blogartikel, Tutorials und Experten-Insights zu SaaS, digitalen Produkten, Automatisierung und modernen Web-Technologien bei Digitalpackt."
>
    {{-- ================= PAGE HEADER (UI ONLY) ================= --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl flex items-center justify-center shadow-xl shadow-blue-600/20">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20l-7-7 7-7" />
                    </svg>
                </div>
                <div>
                    <h2 class="font-extrabold text-2xl text-gray-900 tracking-tight leading-none">
                        Blog & Insights
                    </h2>
                    <p class="text-[11px] font-black text-blue-700 uppercase tracking-[0.2em] mt-1.5">
                        Aktuelle Artikel zu SaaS, Automatisierung & digitalen Produkten
                    </p>
                </div>
            </div>
        </div>
    </x-slot>

    {{-- ================= MAIN CONTENT ================= --}}
    <div class="py-12 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            {{-- ================= SEO H1 + INTRO (FOR CRAWLERS) ================= --}}
            <section class="mb-10 max-w-4xl">
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    Digitalpackt Blog – SaaS, Automatisierung & digitale Produkte
                </h1>

                <p class="mt-4 text-gray-700 leading-relaxed">
                    Der Digitalpackt Blog bietet Ihnen fundierte Inhalte rund um professionelle
                    SaaS-Lösungen, digitale Produkte und Automatisierung. Hier veröffentlichen wir
                    regelmäßig Fachartikel, technische Einblicke und Updates zu modernen
                    Web-Technologien, die Unternehmen und Entwickler bei der Umsetzung
                    leistungsfähiger Softwarelösungen unterstützen.
                </p>
            </section>

            {{-- ================= CATEGORY FILTER ================= --}}
            <nav aria-label="Blog Kategorien" class="mb-12 flex flex-wrap items-center gap-3">
                <a href="{{ route('blog.index') }}"
                   class="px-5 py-2.5 rounded-xl text-sm font-black transition-all
                   {{ !request('category') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'bg-white text-gray-700 border-2 border-blue-100 hover:bg-blue-50 hover:border-blue-200' }}">
                    Alle Artikel
                </a>

                @foreach($categories as $category)
                    <a href="{{ route('blog.index', ['category' => $category->slug]) }}"
                       class="px-5 py-2.5 rounded-xl text-sm font-black transition-all
                       {{ request('category') == $category->slug ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'bg-white text-gray-700 border-2 border-blue-100 hover:bg-blue-50 hover:border-blue-200' }}">
                        {{ $category->name }}
                        <span class="ml-1 opacity-60 text-xs font-bold">({{ $category->posts_count }})</span>
                    </a>
                @endforeach
            </nav>

            {{-- ================= POSTS GRID ================= --}}
            @if($posts->count() > 0)
                <section aria-label="Blog Artikel">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                        @foreach($posts as $post)
                            <article
                                itemscope
                                itemtype="https://schema.org/BlogPosting"
                                class="group bg-white/90 backdrop-blur-xl rounded-[2.5rem] border border-blue-100 shadow-md hover:shadow-2xl hover:shadow-blue-600/10 transition-all duration-500 flex flex-col h-full overflow-hidden">

                                <div class="relative aspect-[16/10] overflow-hidden border-b border-blue-50 bg-gray-100">
                                    @if($post->cover_image)
                                        <img src="{{ Storage::url($post->cover_image) }}"
                                             alt="{{ $post->title }}"
                                             itemprop="image"
                                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    @endif

                                    <div class="absolute top-6 left-6">
                                        <span class="px-4 py-1.5 bg-blue-600 text-white text-[10px] font-black rounded-lg uppercase tracking-widest shadow-lg">
                                            {{ $post->category->name ?? 'Allgemein' }}
                                        </span>
                                    </div>
                                </div>

                                <div class="p-8 flex-1 flex flex-col">
                                    <div class="text-[11px] font-black text-blue-700 uppercase tracking-widest mb-4">
                                        <time itemprop="datePublished" datetime="{{ $post->published_at->toIso8601String() }}">
                                            {{ $post->published_at->format('d.m.Y') }}
                                        </time>
                                        <span class="mx-2 text-blue-200">|</span>
                                        <span itemprop="author">{{ $post->user->name }}</span>
                                    </div>

                                    <h2 class="text-2xl font-black text-gray-900 mb-4 group-hover:text-blue-700 transition-colors leading-tight"
                                        itemprop="headline">
                                        <a href="{{ route('blog.show', $post) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h2>

                                    <p class="text-gray-600 font-medium leading-relaxed mb-8 line-clamp-3"
                                       itemprop="description">
                                        {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 140) }}
                                    </p>

                                    <div class="mt-auto pt-6 border-t border-blue-50">
                                        <a href="{{ route('blog.show', $post) }}"
                                           class="inline-flex items-center font-black text-sm text-gray-900 group-hover:text-blue-600 transition-all">
                                            Artikel lesen
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>

                <div class="mt-20 flex justify-center">
                    <div class="bg-white/80 backdrop-blur-md p-4 rounded-2xl border border-blue-100 shadow-xl">
                        {{ $posts->links() }}
                    </div>
                </div>
            @else
                <section class="bg-white/80 backdrop-blur-xl rounded-[3rem] p-20 text-center border-2 border-dashed border-blue-200 shadow-sm">
                    <h2 class="text-3xl font-black text-gray-900 mb-4">
                        Keine Artikel gefunden
                    </h2>
                    <p class="text-gray-600 font-medium max-w-md mx-auto leading-relaxed">
                        Aktuell arbeiten wir an neuen Inhalten zu SaaS, Automatisierung und digitalen Produkten.
                    </p>
                </section>
            @endif
        </div>
    </div>
</x-app-layout>
