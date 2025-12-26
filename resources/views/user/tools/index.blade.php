<x-app-layout title="Entwickler-Tools & Utilities" metaDescription="Entdecken Sie unser umfangreiches Ökosystem an Entwickler-Tools und Utilities zur Optimierung Ihrer Entwicklungsprozesse.">

    {{-- ✅ SEO H1 (Pflicht – nur einmal pro Seite) --}}
    <h1 class="sr-only">
        Entwickler-Ökosystem entdecken – Premium Entwicklungs-Tools & Utilities
    </h1>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/20">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>

                <div>
                    {{-- ✅ H2 – Hauptsektion --}}
                    <h2 class="font-extrabold text-2xl text-gray-900 tracking-tight">
                        Entwickler-Ökosystem entdecken
                    </h2>
                    <p class="text-[10px] font-black text-blue-600 uppercase tracking-[0.2em] mt-1">
                        Premium Entwicklungs-Utilities
                    </p>
                </div>
            </div>

            <div class="hidden sm:flex items-center px-4 py-2 bg-indigo-50 border border-indigo-100 rounded-xl">
                <span class="text-sm font-black text-indigo-700">
                    {{ $tools->total() }} verfügbare {{ Str::plural('Utility', $tools->total()) }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-16 bg-slate-50/50 relative overflow-hidden min-h-screen">

        {{-- ✅ H2 – Suchbereich --}}
        <h2 class="sr-only">Entwicklungs-Tools suchen</h2>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            {{-- Suche --}}
            <div class="mb-16">
                <div class="bg-white rounded-[2.5rem] shadow p-10 border">
                    <form method="GET" action="{{ route('tools.index') }}"
                          class="flex flex-col lg:flex-row gap-6">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Welche Anwendung bauen Sie heute?"
                               class="w-full pl-6 pr-6 py-5 rounded-xl border"/>

                        <button type="submit"
                                class="px-12 py-5 bg-gray-900 text-white font-black rounded-xl">
                            Utility finden
                        </button>
                    </form>
                </div>
            </div>

            {{-- ✅ H2 – Tool-Übersicht --}}
            <h2 class="sr-only">Verfügbare Entwickler-Tools</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

                @forelse($tools as $tool)
                    <article class="group bg-white rounded-[3rem] shadow border transition">

                        <div class="p-10">

                            {{-- ✅ H3 – Tool-Name --}}
                            <h3 class="text-2xl font-black text-gray-900 mb-2">
                                {{ $tool->name }}
                            </h3>

                            <p class="text-xs text-gray-400 mb-4">
                                {{ $tool->domain }}
                            </p>

                            <p class="text-gray-500 mb-6">
                                {{ $tool->description ?? 'Skalierbares Entwickler-Utility mit sicherer Infrastruktur und automatischer Bereitstellung.' }}
                            </p>

                            {{-- ✅ H4 – Preis --}}
                            <h4 class="sr-only">Preisgestaltung</h4>

                            <div class="text-3xl font-black text-gray-900">
                                @if($tool->packages->count())
                                    Ab €{{ number_format($tool->packages->min('price'), 2) }}
                                @else
                                    Preis auf Anfrage
                                @endif
                            </div>
                        </div>
                    </article>
                @empty

                    {{-- ✅ H2 – Kein Ergebnis --}}
                    <h2 class="sr-only">Keine Tools gefunden</h2>

                @endforelse
            </div>

            {{-- Pagination --}}
            @if($tools->hasPages())
                <div class="mt-20 flex justify-center">
                    {{ $tools->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
