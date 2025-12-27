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
                    Willkommen im <strong>Blog &amp; Insights Bereich von Digital Packt</strong>.
                    Dieser Blog bietet fundierte Einblicke, praxisnahe Analysen und
                    verständlich aufbereitete Inhalte rund um
                    <span class="font-semibold">SaaS</span>,
                    <span class="font-semibold">Automatisierung</span> und
                    moderne digitale Plattformen.
                </p>

                <p class="text-gray-700 leading-relaxed">
                    Der <strong>Digital Packt – Professional SaaS Platform Blog</strong> richtet
                    sich an Unternehmen, Entwickler, IT-Entscheider und Produktteams,
                    die skalierbare Softwarelösungen planen, bestehende Systeme
                    optimieren oder digitale Geschäftsmodelle nachhaltig ausbauen möchten.
                </p>

                <h2 class="text-xl font-extrabold text-gray-900">
                    Fachartikel zu SaaS, Plattformen und Automatisierung
                </h2>

                <p class="text-gray-700 leading-relaxed">
                    In unserem Blog veröffentlichen wir regelmäßig Fachartikel und Insights
                    zu Themen wie <strong>SaaS Architektur</strong>,
                    Cloud-Plattformen, Prozess-Automatisierung, DevOps,
                    Software-Compliance und modernen Produktstrategien.
                    Dabei legen wir besonderen Wert auf praxisnahe Beispiele
                    und realistische Umsetzungsstrategien.
                </p>

                <h2 class="text-xl font-extrabold text-gray-900">
                    Für wen ist der Digital Packt Blog geeignet?
                </h2>

                <p class="text-gray-700 leading-relaxed">
                    Der Blog richtet sich an
                    <strong>Startups</strong>,
                    <span class="font-semibold">SaaS-Unternehmen</span>,
                    <span class="font-semibold">Entwickler</span>,
                    <span class="font-semibold">CTOs</span> sowie
                    Produktverantwortliche, die sich mit digitalen Plattformen,
                    Automatisierungslösungen und skalierbaren Architekturen befassen.
                </p>

                {{-- ================= NEW SEO TEXT (WORD COUNT FIX) ================= --}}
                <h2 class="text-xl font-extrabold text-gray-900">
                    Blog & Insights für digitale Transformation
                </h2>

                <p class="text-gray-700 leading-relaxed">
                    Der Digital Packt Blog versteht sich als Wissensplattform für die
                    digitale Transformation. Unternehmen stehen heute vor der
                    Herausforderung, Softwarelösungen effizient zu entwickeln,
                    Prozesse zu automatisieren und gleichzeitig flexibel auf
                    Marktveränderungen zu reagieren.
                </p>

                <p class="text-gray-700 leading-relaxed">
                    Durch den Einsatz moderner SaaS-Plattformen lassen sich
                    Geschäftsprozesse standardisieren, Kosten senken und
                    Innovationszyklen verkürzen. Automatisierung spielt dabei
                    eine zentrale Rolle, um manuelle Aufgaben zu reduzieren
                    und wiederkehrende Abläufe zuverlässig zu steuern.
                </p>

                <p class="text-gray-700 leading-relaxed">
                    In unseren Blogartikeln und Insights zeigen wir, wie Unternehmen
                    SaaS-Technologien sinnvoll einsetzen, bestehende Systeme integrieren
                    und digitale Produkte nachhaltig skalieren können.
                    Dabei berücksichtigen wir sowohl technische als auch
                    organisatorische Aspekte.
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
