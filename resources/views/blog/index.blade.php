<x-app-layout
    title="Digital Packt Blog: Expertentipps zu SaaS, Automatisierung & Digitalen Produkten"
    metaDescription="Im Digital Packt Blog finden Sie aktuelle Fachartikel, Tutorials und Best Practices zu SaaS-Plattformen, Prozessautomatisierung und digitaler Produktentwicklung. Jetzt Insights lesen!"
    canonical="{{ url()->current() }}"
>
    {{-- ================= SCHEMA MARKUP ================= --}}
    <x-slot name="schema">
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Blog",
            "name": "Digital Packt Blog - SaaS & Automatisierung",
            "description": "Fachartikel, Tutorials und Best Practices zu SaaS-Plattformen, Prozessautomatisierung und digitaler Produktentwicklung",
            "url": "https://digitalpackt.de/blog",
            "publisher": {
                "@type": "Organization",
                "name": "Digital Packt",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://digitalpackt.de/logo.png"
                }
            },
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "https://digitalpackt.de/blog"
            }
        }
        </script>
    </x-slot>

    {{-- ================= PAGE HEADER ================= --}}
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
                        Fachwissen zu SaaS, Automatisierung & digitalen Produkten
                    </p>
                </div>
            </div>
        </div>
    </x-slot>

    {{-- ================= MAIN CONTENT ================= --}}
    <div class="py-12 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            {{-- ================= OPTIMIZED HERO + INTRODUCTION ================= --}}
            <section class="mb-12 max-w-5xl mx-auto space-y-8">
                <div class="text-center mb-10">
                    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-6">
                        Digital Packt Blog: Expertenwissen zu<br>
                        <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                            SaaS & Automatisierung
                        </span>
                    </h1>
                    
                    <p class="text-xl text-gray-700 leading-relaxed max-w-3xl mx-auto mb-8">
                        Willkommen im offiziellen Wissens-Hub von Digital Packt – Ihrer Quelle für 
                        professionelles <strong>SaaS-Wissen</strong>, praxisnahe 
                        <strong>Automatisierungslösungen</strong> und strategische 
                        <strong>digitale Produktentwicklung</strong>.
                    </p>
                </div>

                {{-- FEATURED TOPICS GRID --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                    <div class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-3xl border-2 border-blue-100 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">🧠 SaaS Plattformen</h3>
                        <p class="text-gray-600">
                            Tiefgehende Einblicke in <strong>SaaS-Architekturen</strong>, 
                            Skalierungsstrategien und <strong>Best Practices</strong> für 
                            erfolgreiche Software-as-a-Service Lösungen.
                        </p>
                    </div>
                    
                    <div class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-3xl border-2 border-blue-100 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">⚡ Prozessautomatisierung</h3>
                        <p class="text-gray-600">
                            Praktische <strong>Anleitungen und Tutorials</strong> zur 
                            Optimierung von Geschäftsprozessen durch intelligente 
                            Automatisierungslösungen.
                        </p>
                    </div>
                    
                    <div class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-3xl border-2 border-blue-100 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">🚀 Digitale Produkte</h3>
                        <p class="text-gray-600">
                            Strategien und <strong>Experten-Insights</strong> für die 
                            Entwicklung, Vermarktung und Skalierung erfolgreicher 
                            digitaler Produkte.
                        </p>
                    </div>
                </div>

                {{-- DETAILED INTRODUCTION --}}
                <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-10 border border-blue-100 shadow-lg">
                    <h2 class="text-2xl font-extrabold text-gray-900 mb-6">
                        Fachartikel zu SaaS, Plattformen und Automatisierung
                    </h2>
                    
                    <div class="space-y-6">
                        <p class="text-gray-700 leading-relaxed text-lg">
                            Der <strong class="text-blue-700">Digital Packt – Professional SaaS Platform Blog</strong> bietet
                            fundierte Inhalte und praxisnahe <strong>Fachartikel</strong> rund um 
                            <strong>SaaS (Software-as-a-Service)</strong>, digitale Produkte und
                            <strong>Prozessautomatisierung</strong>. Auf <strong>Digitalpackt</strong> finden
                            Unternehmen, Entwickler und Produktteams technische Einblicke, 
                            strategische Informationen und nachhaltige Best Practices für 
                            moderne digitale Plattformen.
                        </p>
                        
                        <p class="text-gray-700 leading-relaxed text-lg">
                            In unserem Blog veröffentlichen wir regelmäßig neue <strong>Artikel und Tutorials</strong>
                            zu professionellen SaaS-Plattformen, skalierbaren Cloud-Architekturen,
                            Automatisierungslösungen und der Entwicklung digitaler Produkte.
                            Unser Fokus liegt auf verständlichen Erklärungen, realen
                            Anwendungsbeispielen und umsetzbaren Strategien für Ihr Business.
                        </p>
                        
                        <div class="bg-blue-50/50 p-6 rounded-2xl border border-blue-200 mt-8">
                            <h3 class="font-bold text-blue-800 mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Was Sie in unserem Blog finden:
                            </h3>
                            <ul class="grid grid-cols-1 md:grid-cols-2 gap-3 text-gray-700">
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-blue-600 rounded-full mr-3"></span>
                                    Schritt-für-Schritt Tutorials
                                </li>
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-blue-600 rounded-full mr-3"></span>
                                    Technische Best Practices
                                </li>
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-blue-600 rounded-full mr-3"></span>
                                    Marktanalysen & Trends
                                </li>
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-blue-600 rounded-full mr-3"></span>
                                    Case Studies & Erfahrungen
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ================= CATEGORY FILTER ================= --}}
            <nav aria-label="Blog Kategorien" class="mb-16">
                <h2 class="text-2xl font-extrabold text-gray-900 mb-8 text-center">
                    Entdecken Sie unsere Themenbereiche
                </h2>
                <div class="flex flex-wrap items-center justify-center gap-4">
                    <a href="{{ route('blog.index') }}"
                       class="px-6 py-3 rounded-xl text-base font-black transition-all
                       {{ !request('category') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-xl shadow-blue-600/30' : 'bg-white text-gray-700 border-2 border-blue-100 hover:bg-blue-50 hover:border-blue-200 hover:shadow-lg' }}">
                        Alle Artikel
                        <span class="ml-2 px-2 py-1 bg-white/20 text-xs rounded-lg">({{ $totalPosts ?? 0 }})</span>
                    </a>

                    @foreach($categories as $category)
                        <a href="{{ route('blog.index', ['category' => $category->slug]) }}"
                           class="px-6 py-3 rounded-xl text-base font-black transition-all
                           {{ request('category') == $category->slug ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-xl shadow-blue-600/30' : 'bg-white text-gray-700 border-2 border-blue-100 hover:bg-blue-50 hover:border-blue-200 hover:shadow-lg' }}">
                            {{ $category->name }}
                            <span class="ml-2 px-2 py-1 {{ request('category') == $category->slug ? 'bg-white/20' : 'bg-blue-100 text-blue-800' }} text-xs rounded-lg font-bold">
                                ({{ $category->posts_count }})
                            </span>
                        </a>
                    @endforeach
                </div>
            </nav>

            {{-- ================= POPULAR ARTICLES (if available) ================= --}}
            @if($featuredPosts && $featuredPosts->count() > 0)
                <section class="mb-20" aria-label="Empfohlene Artikel">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-10 text-center">
                        <span class="border-b-4 border-blue-600 pb-2">Beliebte Fachartikel</span>
                    </h2>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                        @foreach($featuredPosts as $featuredPost)
                            <article class="bg-white rounded-3xl border-2 border-blue-100 shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden group">
                                <div class="p-8">
                                    <span class="inline-block px-4 py-2 bg-blue-100 text-blue-800 text-xs font-black rounded-lg mb-4">
                                        {{ $featuredPost->category->name ?? 'Top Artikel' }}
                                    </span>
                                    <h3 class="text-xl font-black text-gray-900 mb-4 group-hover:text-blue-700 transition-colors">
                                        <a href="{{ route('blog.show', $featuredPost) }}">
                                            {{ $featuredPost->title }}
                                        </a>
                                    </h3>
                                    <p class="text-gray-600 mb-6 line-clamp-3">
                                        {{ $featuredPost->excerpt ?? Str::limit(strip_tags($featuredPost->content), 120) }}
                                    </p>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <time datetime="{{ $featuredPost->published_at->toIso8601String() }}">
                                            {{ $featuredPost->published_at->format('d.m.Y') }}
                                        </time>
                                        <span class="mx-2">•</span>
                                        <span>{{ $featuredPost->reading_time }} Min Lesezeit</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
            @endif

            {{-- ================= MAIN POSTS GRID ================= --}}
            @if($posts->count() > 0)
                <section aria-label="Blog Artikel" class="mb-16">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-10 text-center">
                        <span class="border-b-4 border-blue-600 pb-2">Aktuelle Artikel</span>
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

                        @foreach($posts as $post)
                            <article
                                itemscope
                                itemtype="https://schema.org/BlogPosting"
                                class="group bg-white rounded-[2.5rem] border-2 border-blue-100 shadow-lg hover:shadow-2xl hover:shadow-blue-600/20 transition-all duration-500 flex flex-col h-full overflow-hidden">

                                {{-- IMAGE --}}
                                <div class="relative aspect-[16/10] overflow-hidden bg-gradient-to-br from-blue-50 to-gray-100">
                                    @if($post->cover_image)
                                        <img src="{{ Storage::url($post->cover_image) }}"
                                             alt="{{ $post->title }} - Digital Packt Blog"
                                             itemprop="image"
                                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                             loading="lazy">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-600 to-indigo-700">
                                            <svg class="w-16 h-16 text-white opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                        </div>
                                    @endif

                                    <div class="absolute top-6 left-6">
                                        <span class="px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-xs font-black rounded-xl uppercase tracking-wider shadow-lg">
                                            {{ $post->category->name ?? 'Artikel' }}
                                        </span>
                                    </div>
                                </div>

                                {{-- CONTENT --}}
                                <div class="p-8 flex-1 flex flex-col">
                                    <div class="text-xs font-black text-blue-700 uppercase tracking-wider mb-4 flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        <time itemprop="datePublished" datetime="{{ $post->published_at->toIso8601String() }}">
                                            {{ $post->published_at->format('d.m.Y') }}
                                        </time>
                                        <span class="mx-3 text-blue-300">|</span>
                                        <span itemprop="author">{{ $post->user->name }}</span>
                                    </div>

                                    <h3 class="text-2xl font-black text-gray-900 mb-4 group-hover:text-blue-700 transition-colors leading-tight"
                                        itemprop="headline">
                                        <a href="{{ route('blog.show', $post) }}" class="hover:underline">
                                            {{ $post->title }}
                                        </a>
                                    </h3>

                                    <p class="text-gray-600 font-medium leading-relaxed mb-8 line-clamp-3"
                                       itemprop="description">
                                        {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 140) }}
                                    </p>

                                    <div class="mt-auto pt-6 border-t border-blue-100">
                                        <a href="{{ route('blog.show', $post) }}"
                                           aria-label="Artikel '{{ Str::limit($post->title, 50) }}' lesen"
                                           class="inline-flex items-center font-black text-sm text-gray-900 group-hover:text-blue-600 transition-all hover:underline">
                                            Jetzt Artikel lesen
                                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-2 transition-transform"
                                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                      d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>

                {{-- PAGINATION --}}
                <div class="mt-20">
                    {{ $posts->links('vendor.pagination.custom') }}
                </div>

            @else
                {{-- EMPTY STATE WITH CTA --}}
                <section class="bg-gradient-to-br from-blue-50 to-white rounded-[3rem] p-16 text-center border-2 border-dashed border-blue-200 shadow-xl">
                    <div class="max-w-2xl mx-auto">
                        <div class="w-24 h-24 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-xl">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        
                        <h2 class="text-4xl font-black text-gray-900 mb-6">
                            Erste Artikel in Arbeit!
                        </h2>
                        
                        <p class="text-gray-600 text-lg mb-10 max-w-md mx-auto leading-relaxed">
                            Unser Expertenteam arbeitet aktuell an hochwertigen Inhalten 
                            zu <strong>SaaS</strong>, <strong>Automatisierung</strong> 
                            und <strong>digitalen Produkten</strong>.
                        </p>
                        
                        <div class="bg-white p-8 rounded-2xl border border-blue-100 inline-block">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">
                                Kommende Themen:
                            </h3>
                            <div class="flex flex-wrap justify-center gap-4">
                                <span class="px-5 py-2 bg-blue-100 text-blue-800 rounded-xl font-bold">
                                    SaaS Architektur
                                </span>
                                <span class="px-5 py-2 bg-blue-100 text-blue-800 rounded-xl font-bold">
                                    Prozessautomatisierung
                                </span>
                                <span class="px-5 py-2 bg-blue-100 text-blue-800 rounded-xl font-bold">
                                    Cloud Lösungen
                                </span>
                                <span class="px-5 py-2 bg-blue-100 text-blue-800 rounded-xl font-bold">
                                    Digitale Produkte
                                </span>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            {{-- ================= NEWSLETTER CTA ================= --}}
            <section class="mt-24 mb-16">
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl p-12 text-center shadow-2xl">
                    <h2 class="text-3xl font-black text-white mb-6">
                        Keinen Fachartikel verpassen!
                    </h2>
                    <p class="text-blue-100 text-lg mb-8 max-w-2xl mx-auto">
                        Erhalten Sie regelmäßig Experten-Insights zu SaaS, Automatisierung 
                        und digitalen Produkten direkt in Ihr Postfach.
                    </p>
                    <form class="max-w-md mx-auto flex gap-4">
                        <input type="email" 
                               placeholder="Ihre E-Mail-Adresse" 
                               class="flex-1 px-6 py-4 rounded-xl border-2 border-white/20 bg-white/10 text-white placeholder-blue-200 focus:outline-none focus:border-white/40">
                        <button type="submit"
                                class="px-8 py-4 bg-white text-blue-700 font-black rounded-xl hover:bg-blue-50 transition-all shadow-lg">
                            Updates erhalten
                        </button>
                    </form>
                    <p class="text-blue-200 text-sm mt-4">
                        Kein Spam. Jederzeit abbestellbar.
                    </p>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>