<x-app-layout
    title="{{ $tool->name }} – Professional SaaS Tool von Digitalpackt"
    metaDescription="{{ $tool->name }} ist ein professionelles SaaS Tool von Digitalpackt. Funktionen, Software-Plattform, Automatisierung und Lizenzmodelle im Überblick."
>

    {{-- ================= HEADER ================= --}}
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('tools.index') }}"
               class="w-10 h-10 bg-white border rounded-xl flex items-center justify-center hover:bg-blue-600 hover:text-white transition">
                ←
            </a>
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900">
                    {{ $tool->name }}
                </h2>
                <p class="text-xs font-black uppercase tracking-widest text-blue-600 mt-1">
                    SaaS Tool · Software Plattform · Lizenzierung
                </p>
            </div>
        </div>
    </x-slot>

    {{-- ================= MAIN ================= --}}
    <div class="py-16 bg-slate-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ================= SEO H1 + TEXT ================= --}}
            <section class="mb-16 max-w-4xl space-y-6">
                <h1 class="text-4xl font-black text-gray-900 tracking-tight">
                    {{ $tool->name }} – Professional SaaS Tool von Digitalpackt
                </h1>

                <p class="text-gray-700 leading-relaxed text-lg">
                    <strong>{{ $tool->name }}</strong> ist ein
                    <strong>Professional SaaS Tool von Digitalpackt</strong>, das Unternehmen
                    dabei unterstützt, digitale Prozesse zu automatisieren, Software
                    sicher bereitzustellen und skalierbare Plattformen zu betreiben.
                </p>

                <p class="text-gray-700 leading-relaxed">
                    Als leistungsstarke <strong>SaaS Software Plattform</strong> eignet sich
                    {{ $tool->name }} ideal für API-basierte Anwendungen, Multi-Tenant-
                    Architekturen und professionelle Unternehmenslösungen. Digitalpackt
                    stellt mit diesem Tool eine stabile, sichere und zukunftsfähige
                    Lösung bereit.
                </p>

                <p class="text-gray-700 leading-relaxed">
                    Das {{ $tool->name }} SaaS Tool wird von Startups, Agenturen und
                    Unternehmen eingesetzt, die eine zuverlässige Plattform für
                    Automatisierung, Lizenzverwaltung und den Betrieb digitaler Produkte
                    benötigen. Flexible Lizenzmodelle ermöglichen eine optimale Anpassung
                    an unterschiedliche Anforderungen.
                </p>
            </section>

            {{-- ================= TOOL CARD ================= --}}
            <div class="bg-white rounded-3xl p-12 shadow mb-16">
                <h2 class="text-3xl font-black text-gray-900 mb-4">
                    Funktionen & Übersicht
                </h2>

                <p class="text-gray-600 leading-relaxed text-lg">
                    {{ $tool->description }}
                </p>
            </div>

            {{-- ================= PACKAGES ================= --}}
            <section>
                <h2 class="text-4xl font-black text-gray-900 mb-8 text-center">
                    Lizenzmodelle & Pakete
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($tool->packages as $package)
                        <div class="bg-white rounded-3xl p-10 shadow hover:shadow-xl transition">
                            <h3 class="text-2xl font-black text-gray-900 mb-4">
                                {{ $package->name }}
                            </h3>
                            <p class="text-gray-600 mb-6">
                                €{{ number_format($package->price, 2) }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>
</x-app-layout>
