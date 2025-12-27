@section('title', 'Blog & Insights – SaaS, Automatisierung')
@section('meta_description', 'Fachartikel, Tutorials und Expertenwissen zu SaaS-Plattformen, Automatisierung, digitalen Produkten und skalierbaren Architekturen bei Digitalpackt.')

<x-app-layout
    title="Blog & Insights – SaaS, Automatisierung"
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

                <p class="text-gray-700 leading-relaxed">
                    Der <strong>Digital Packt – Professional SaaS Platform Blog</strong> bietet
                    fundierte Fachartikel zu
                    <span class="font-semibold">SaaS-Plattformen</span>,
                    <span class="font-semibold">Automatisierungslösungen</span> und der Entwicklung
                    <span class="font-semibold">digitaler Produkte</span>.
                    Unternehmen, Entwickler und Produktteams finden hier praxisnahe
                    Einblicke, technische Best Practices und strategisches Wissen
                    für skalierbare Software-Architekturen.
                </p>

                <h2 class="text-xl font-extrabold text-gray-900">
                    Fachartikel zu SaaS, Plattformen und Automatisierung
                </h2>

                <p class="text-gray-700 leading-relaxed">
                    Unsere Artikel behandeln Themen wie
                    <strong>SaaS Architektur</strong>,
                    <span class="font-semibold">Cloud-basierte Plattformen</span>,
                    Prozess-Automatisierung, DevOps, Produktstrategie und die nachhaltige Skalierung
                    digitaler Geschäftsmodelle.
                </p>

                <h2 class="text-xl font-extrabold text-gray-900">
                    Für wen ist der Digitalpackt Blog geeignet?
                </h2>

                <p class="text-gray-700 leading-relaxed">
                    Der Blog richtet sich an
                    <strong>Startups</strong>,
                    <span class="font-semibold">SaaS-Unternehmen</span>,
                    <span class="font-semibold">Entwickler</span>,
                    <span class="font-semibold">CTOs</span> und Produktverantwortliche, die digitale
                    Plattformen professionell planen, entwickeln und betreiben möchten.
                </p>

            </section>

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
                                        src="{{ Storage::url($post->cover_image) }}"
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
                                        {{ $post->title }}
                                    </h3>

                                    <p class="text-gray-600 leading-relaxed mb-6" itemprop="description">
                                        {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 150) }}
                                    </p>
                                </div>
                            </article>
                        @endforeach

                    </div>
                </section>

                {{-- PAGINATION --}}
                <div class="mt-20 flex justify-center">
                    {{ $posts->links() }}
                </div>
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
