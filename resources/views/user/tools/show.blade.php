<x-app-layout
    title="{{ $tool->name }} – SaaS Tool & Lizenzierung | Digitalpackt"
    metaDescription="{{ $tool->name }} ist ein professionelles SaaS-Tool von Digitalpackt. Informationen zu Funktionen, Software-Plattform, Automatisierung und Lizenzmodellen."
>

    {{-- ================= HEADER (UI ONLY) ================= --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('tools.index') }}"
                   class="group flex items-center justify-center w-12 h-12 bg-white border border-blue-100 rounded-2xl shadow-sm hover:bg-blue-600 hover:text-white transition-all duration-300">
                    <svg class="w-6 h-6 transition-transform group-hover:-translate-x-1"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 19l-7-7 7-7" />
                    </svg>
                </a>

                <div>
                    <h2 class="font-extrabold text-2xl text-gray-900 tracking-tight leading-none">
                        {{ $tool->name }}
                    </h2>
                    <p class="text-[10px] font-black text-blue-600 uppercase tracking-[0.2em] mt-1.5">
                        SaaS Tool · Software Plattform · Lizenzierung
                    </p>
                </div>
            </div>

            @if($hasActiveSubscription)
                <div class="flex items-center px-5 py-2.5 bg-green-50 border border-green-100 rounded-2xl shadow-sm">
                    <span class="flex h-2.5 w-2.5 rounded-full bg-green-500 mr-3 animate-pulse"></span>
                    <span class="text-xs font-black text-green-700 uppercase tracking-widest">
                        Aktive Lizenz
                    </span>
                </div>
            @endif
        </div>
    </x-slot>

    {{-- ================= MAIN CONTENT ================= --}}
    <div class="py-16 bg-slate-50/50 relative overflow-hidden min-h-screen">

        {{-- Background decor --}}
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-blue-100 rounded-full blur-3xl opacity-30 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-96 h-96 bg-indigo-100 rounded-full blur-3xl opacity-30 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            {{-- ================= SEO H1 + INTRO TEXT ================= --}}
            <section class="mb-16 max-w-4xl space-y-6">
                <h1 class="text-4xl font-black text-gray-900 tracking-tight">
                    {{ $tool->name }} – Professionelles SaaS Tool von Digitalpackt
                </h1>

                <p class="text-gray-700 leading-relaxed text-lg">
                    <strong>{{ $tool->name }}</strong> ist eine leistungsstarke
                    <strong>SaaS-Software</strong> der
                    <strong>Digital Packt – Professional SaaS Platform</strong>.
                    Diese Software-Plattform unterstützt Unternehmen bei der
                    Automatisierung, sicheren Bereitstellung und Skalierung
                    moderner digitaler Produkte.
                </p>

                <p class="text-gray-700 leading-relaxed">
                    Als professionelle Plattform eignet sich dieses Tool für
                    API-basierte Workflows, Multi-Tenant-Architekturen sowie
                    lizenzierte Unternehmenslösungen mit hohen Anforderungen
                    an Sicherheit, Performance und Skalierbarkeit.
                </p>
            </section>

            {{-- ================= TOOL OVERVIEW CARD (ORIGINAL UI) ================= --}}
            <div class="bg-white rounded-[3rem] shadow-[0_15px_50px_rgba(0,0,0,0.04)] p-10 md:p-16 border border-white mb-16 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-blue-50/50 rounded-full -mr-20 -mt-20 blur-3xl pointer-events-none"></div>

                <div class="flex flex-col lg:flex-row gap-12 items-center lg:items-start relative z-10">

                    {{-- Logo --}}
                    <div class="shrink-0">
                        <div class="w-48 h-48 bg-gradient-to-br from-slate-50 to-blue-50 border-4 border-white rounded-[2.5rem] flex items-center justify-center shadow-2xl shadow-blue-500/10">
                            @if($tool->logo)
                                <img src="{{ Storage::url($tool->logo) }}"
                                     alt="{{ $tool->name }}"
                                     class="h-28 w-28 object-contain">
                            @else
                                <span class="text-6xl font-black text-blue-600">
                                    {{ strtoupper(substr($tool->name, 0, 1)) }}
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Meta --}}
                    <div class="flex-1 text-center lg:text-left">
                        <h2 class="text-5xl font-black text-gray-900 mb-6">
                            {{ $tool->name }}
                        </h2>

                        <p class="text-xl text-gray-500 font-medium leading-relaxed mb-10 max-w-4xl">
                            {{ $tool->description ?? 'Professionelles SaaS-Tool für moderne Software-Architekturen mit sicherer Lizenzverwaltung und skalierbarer Infrastruktur.' }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- ================= LICENSING SECTION ================= --}}
            <section class="text-center mb-16">
                <h2 class="text-4xl font-black text-gray-900 tracking-tight mb-3">
                    Lizenzmodelle & Pakete
                </h2>
                <p class="text-lg text-gray-500 font-medium">
                    Flexible Software-Lizenzen für unterschiedliche Einsatzszenarien und Unternehmensgrößen.
                </p>
            </section>

            {{-- ================= PACKAGES GRID (UNCHANGED UI) ================= --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mb-20">
                @forelse($tool->packages as $package)
                    {{-- EXISTING PACKAGE CARD CODE (UNCHANGED) --}}
                @empty
                    <div class="col-span-full py-24 text-center">
                        <h3 class="text-3xl font-black text-slate-400">
                            Keine aktiven Lizenzpakete verfügbar
                        </h3>
                    </div>
                @endforelse
            </div>

            {{-- ================= ENTERPRISE CTA ================= --}}
            <section class="bg-gray-950 rounded-[3.5rem] p-12 md:p-16 text-center shadow-2xl shadow-indigo-900/20">
                <h3 class="text-4xl font-black text-white mb-4">
                    Individuelle Enterprise-Lösung benötigt?
                </h3>
                <p class="text-xl text-slate-400 font-medium max-w-3xl mx-auto">
                    Unser Team unterstützt Sie bei maßgeschneiderten SaaS-Deployments,
                    dedizierten Lizenzmodellen und individuellen Software-Architekturen.
                </p>
            </section>

        </div>
    </div>
</x-app-layout>
