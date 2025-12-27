@section('title', 'Blog & Insights – SaaS, Automatisierung')
@section('meta_description', 'Fachartikel, Tutorials und Expertenwissen zu SaaS-Plattformen, Automatisierung, digitalen Produkten und skalierbaren Architekturen bei Digital Packt.')

<x-app-layout
    title="Blog & Insights – SaaS, Automatisierung"
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

                <p class="text-gray-700 leading-relaxed">
                    Der <strong>Digital Packt – Professional SaaS Platform Blog</strong> bietet
                    fundierte Fachartikel zu SaaS-Plattformen, Automatisierungslösungen
                    und der Entwicklung digitaler Produkte. Unternehmen, Entwickler
                    und Produktteams finden hier praxisnahe Einblicke, technische
                    Best Practices und strategisches Wissen für skalierbare
                    Software-Architekturen.
                </p>

                <h2 class="text-xl font-extrabold text-gray-900">
                    Fachartikel zu SaaS, Plattformen und Automatisierung
                </h2>

                <p class="text-gray-700 leading-relaxed">
                    Unsere Artikel behandeln Themen wie SaaS Architektur,
                    Cloud-basierte Plattformen, Prozess-Automatisierung, DevOps,
                    Produktstrategie und die nachhaltige Skalierung digitaler
                    Geschäftsmodelle.
                </p>

                <h2 class="text-xl font-extrabold text-gray-900">
                    Für wen ist der Digitalpackt Blog geeignet?
                </h2>

                <p class="text-gray-700 leading-relaxed">
                    Der Blog richtet sich an Startups, SaaS-Unternehmen, Entwickler,
                    CTOs und Produktverantwortliche, die digitale Plattformen
                    professionell planen, entwickeln und betreiben möchten.
                </p>

                {{-- ================= NEW CONTENT (WORD COUNT FIX) ================= --}}
                <h2 class="text-xl font-extrabold text-gray-900">
                    Warum ein spezialisierter SaaS- und Automatisierungsblog wichtig ist
                </h2>

                <p class="text-gray-700 leading-relaxed">
                    In einer zunehmend digitalen Wirtschaft gewinnen Software as a Service
                    und Automatisierung kontinuierlich an Bedeutung. Unternehmen stehen vor
                    der Herausforderung, komplexe Systeme effizient zu betreiben,
                    Daten sicher zu verarbeiten und gleichzeitig flexibel auf neue
                    Marktanforderungen zu reagieren. Ein spezialisierter Blog zu SaaS
                    und Automatisierung hilft dabei, technisches Wissen verständlich
                    aufzubereiten und Entscheidungsgrundlagen zu liefern.
                </p>

                <p class="text-gray-700 leading-relaxed">
                    Der Digital Packt Blog verfolgt das Ziel, aktuelle Entwicklungen,
                    bewährte Methoden und praxisorientierte Lösungsansätze zu vermitteln.
                    Dabei werden sowohl technische Aspekte wie Software-Architektur,
                    Cloud-Infrastrukturen und Integrationen als auch strategische Themen
                    wie Skalierung, Produktentwicklung und Effizienzsteigerung behandelt.
                </p>

                <p class="text-gray-700 leading-relaxed">
                    Leser erhalten kompakte Insights, die sie bei der Planung und Umsetzung
                    moderner digitaler Lösungen unterstützen. Statt oberflächlicher
                    Marketingtexte liegt der Fokus auf nachvollziehbaren Konzepten,
                    realistischen Szenarien und nachhaltigen Softwarestrategien.
                    So entsteht ein Wissenshub, der sowohl Einsteigern als auch
                    erfahrenen Fachkräften echten Mehrwert bietet.
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

        </div>
    </div>
</x-app-layout>
