<x-app-layout
    title="Blog & Insights – SaaS, Automatisierung & digitale Produkte | Digitalpackt"
    metaDescription="Fachartikel, Tutorials und Expertenwissen zu SaaS-Plattformen, Automatisierung, digitalen Produkten und skalierbaren Architekturen bei Digitalpackt."
>
    {{-- ================= HEADER ================= --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl flex items-center justify-center shadow-xl">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20l-7-7 7-7" />
                    </svg>
                </div>
                <div>
                    <h2 class="font-extrabold text-2xl text-gray-900">
                        Blog & Insights
                    </h2>
                    <p class="text-[11px] font-black text-blue-700 uppercase tracking-widest mt-1">
                        SaaS · Automatisierung · Digitale Produkte
                    </p>
                </div>
            </div>
        </div>
    </x-slot>

    {{-- ================= MAIN ================= --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ================= SEO CONTENT ================= --}}
            <section class="max-w-4xl mb-16 space-y-6">

                <h1 class="text-3xl font-extrabold text-gray-900">
                    Digital Packt – Professional SaaS Platform Blog
                </h1>

                {{-- SEO IMAGE --}}
                <img
                    src="/images/blog-saas-automatisierung.webp"
                    alt="SaaS Plattformen, Automatisierung und digitale Produkte"
                    loading="lazy"
                    class="rounded-2xl shadow-md border border-blue-100"
                >

                <p class="text-gray-700 leading-relaxed">
                    Der <strong>Digital Packt – Professional SaaS Platform Blog</strong> bietet
                    fundierte Fachartikel zu <strong>SaaS-Plattformen</strong>,
                    <strong>Automatisierungslösungen</strong> und der Entwicklung
                    <strong>digitaler Produkte</strong>.
                    Unternehmen, Entwickler und Produktteams finden hier praxisnahe
                    Einblicke, technische Best Practices und strategisches Wissen
                    für skalierbare Software-Architekturen.
                </p>

                <h2 class="text-xl font-extrabold text-gray-900">
                    Fachartikel zu SaaS, Plattformen und Automatisierung
                </h2>

                <p class="text-gray-700 leading-relaxed">
                    Unsere Artikel behandeln Themen wie <strong>SaaS Architektur</strong>,
                    <strong>Cloud-basierte Plattformen</strong>, Prozess-Automatisierung,
                    DevOps, Produktstrategie und die nachhaltige Skalierung
                    digitaler Geschäftsmodelle.
                </p>

                <h2 class="text-xl font-extrabold text-gray-900">
                    Für wen ist der Digitalpackt Blog geeignet?
                </h2>

                <p class="text-gray-700 leading-relaxed">
                    Der Blog richtet sich an <strong>Startups</strong>,
                    <strong>SaaS-Unternehmen</strong>, <strong>Entwickler</strong>,
                    <strong>CTOs</strong> und Produktverantwortliche, die digitale
                    Plattformen professionell planen, entwickeln und betreiben möchten.
                </p>

            </section>

            {{-- ================= CATEGORY FILTER ================= --}}
            <nav aria-label="Blog Kategorien" class="mb-12 flex flex-wrap gap-3">
                <a href="{{ route('blog.index') }}"
                   class="px-5 py-2.5 rounded-xl text-sm font-black transition
                   {{ !request('category') ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 border border-blue-100 hover:bg-blue-50' }}">
                    Alle Artikel
                </a>

                @foreach($categories as $category)
                    <a href="{{ route('blog.index', ['category' => $category->slug]) }}"
                       class="px-5 py-2.5 rounded-xl text-sm font-black transition
                       {{ request('category') == $category->slug ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 border border-blue-100 hover:bg-blue-50' }}">
                        {{ $category->name }}
                        <span class="ml-1 text-xs opacity-60">({{ $category->posts_count }})</span>
                    </a>
                @endforeach
            </nav>

            {{-- ================= POSTS ================= --}}
            @if($posts->count())
                <section aria-label="Blog Artikel">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

                        @foreach($posts as $post)
                            <article
                                itemscope
                                itemtype="https://schema.org/BlogPosting"
                                class="bg-white rounded-[2.5rem] border border-blue-100 shadow hover:shadow-xl transition flex flex-col overflow-hidden">

                                {{-- IMAGE --}}
                                @if($post->cover_image)
                                    <img
                                        src="{{ url('/blog-logo/' . basename($post->cover_image)) }}"
                                        alt="{{ $post->title }}"
                                        itemprop="image"
                                        class="h-48 w-full object-cover"
                                    >
                                @endif

                                {{-- CONTENT --}}
                                <div class="p-8 flex-1 flex flex-col">
                                    <div class="text-[11px] font-black text-blue-700 uppercase tracking-widest mb-4">
                                        <time itemprop="datePublished" datetime="{{ $post->published_at->toIso8601String() }}">
                                            {{ $post->published_at->format('d.m.Y') }}
                                        </time>
                                        · <span itemprop="author">{{ $post->user->name }}</span>
                                    </div>

                                    <h3 class="text-xl font-black text-gray-900 mb-3" itemprop="headline">
                                        <a href="{{ route('blog.show', $post) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>

                                    <p class="text-gray-600 leading-relaxed mb-6" itemprop="description">
                                        {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 150) }}
                                    </p>

                                    <a href="{{ route('blog.show', $post) }}"
                                       class="mt-auto font-black text-sm text-blue-600">
                                        Artikel lesen →
                                    </a>
                                </div>
                            </article>
                        @endforeach

                    </div>
                </section>

                {{-- PAGINATION --}}
                <div class="mt-20 flex justify-center">
                    {{ $posts->links() }}
                </div>

            @else
                <section class="text-center bg-white p-16 rounded-3xl border border-dashed border-blue-200">
                    <h2 class="text-3xl font-black text-gray-900 mb-4">
                        Keine Artikel gefunden
                    </h2>
                    <p class="text-gray-600 max-w-md mx-auto">
                        Aktuell entstehen neue Inhalte zu SaaS, Automatisierung und digitalen Plattformen.
                    </p>
                </section>
            @endif

            {{-- ================= EXTRA SEO TEXT ================= --}}
            <section class="max-w-4xl mt-24 space-y-6">
                <h2 class="text-xl font-extrabold text-gray-900">
                    SaaS-Plattformen & digitale Automatisierung verstehen
                </h2>

                <p class="text-gray-700 leading-relaxed">
                    Software as a Service (SaaS) ist heute das Fundament moderner
                    digitaler Produkte. Durch skalierbare Cloud-Architekturen,
                    automatisierte Prozesse und modulare Plattformen können
                    Unternehmen schneller wachsen und effizienter arbeiten.
                </p>
            </section>

        </div>
    </div>
</x-app-layout>
