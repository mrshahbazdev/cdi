@section('title', 'Blog & Insights – SaaS, Automatisierung – Digital Packt')
@section('meta_description', 'Fachartikel, Tutorials und Expertenwissen zu SaaS-Plattformen, Automatisierung, digitalen Produkten und skalierbaren Architekturen bei Digital Packt.')

<x-app-layout
    title="Blog & Insights – SaaS, Automatisierung – Digital Packt"
    metaDescription="Fachartikel, Tutorials und Expertenwissen zu SaaS-Plattformen, Automatisierung, digitalen Produkten und skalierbaren Architekturen bei Digital Packt."
>
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ================= SEO CONTENT ================= --}}
            <section class="max-w-4xl mb-16 space-y-6">

                <h1 class="text-3xl font-extrabold text-gray-900">
                    Digital Packt – Professional SaaS Platform Blog
                </h1>

                {{-- ✅ NEW SEO INTRO (Fixes title keywords + text length) --}}
                <p class="text-gray-700 leading-relaxed">
                    Willkommen im <strong>Blog &amp; Insights Bereich von Digital Packt</strong>.
                    In unserem Blog finden Sie regelmäßig veröffentlichte Insights, Analysen
                    und Fachbeiträge rund um <span class="font-semibold">SaaS</span>,
                    <span class="font-semibold">Automatisierung</span> und moderne digitale
                    Plattformen. Der Digital Packt Blog richtet sich an Unternehmen, Entwickler
                    und Entscheidungsträger, die praxisnahes Wissen und strategische Einblicke
                    suchen.
                </p>

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
                    Unsere Blogartikel und Insights behandeln Themen wie
                    <strong>SaaS Architektur</strong>,
                    <span class="font-semibold">Cloud-basierte Plattformen</span>,
                    Prozess-Automatisierung, DevOps, Produktstrategie und die nachhaltige
                    Skalierung digitaler Geschäftsmodelle.
                </p>

                <h2 class="text-xl font-extrabold text-gray-900">
                    Für wen ist der Digital Packt Blog geeignet?
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
                                class="bg-white rounded-[2.5rem] border border-blue-100 shadow flex flex-col overflow-hidden">

                                @if($post->cover_image)
                                    <img
                                        src="{{ Storage::url($post->cover_image) }}"
                                        alt="{{ $post->title }}"
                                        itemprop="image"
                                        class="h-48 w-full object-cover"
                                    >
                                @endif

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
            @endif

            {{-- ✅ NEW SEO OUTRO (Text length boost, semantic) --}}
            <section class="max-w-4xl mt-24 space-y-6">
                <h2 class="text-xl font-extrabold text-gray-900">
                    Blog & Insights rund um SaaS und Automatisierung
                </h2>

                <p class="text-gray-700 leading-relaxed">
                    Der Blog von Digital Packt bietet kontinuierlich neue Insights zu
                    SaaS-Plattformen, Automatisierung und digitalen Architekturen.
                    Ziel ist es, komplexe technische Themen verständlich aufzubereiten
                    und Unternehmen bei der erfolgreichen Umsetzung moderner Software-
                    und Plattformstrategien zu unterstützen.
                </p>
            </section>

        </div>
    </div>
</x-app-layout>
