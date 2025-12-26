@php
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Schema.org Data (SAFE – no Blade parsing issues)
|--------------------------------------------------------------------------
*/
$schemaItems = [];

foreach ($tools as $index => $tool) {
    $schemaItems[] = [
        "@type" => "ListItem",
        "position" => $index + 1,
        "item" => [
            "@type" => "SoftwareApplication",
            "name" => $tool->name,
            "applicationCategory" => "DeveloperApplication",
            "operatingSystem" => "All",
            "description" => Str::limit(strip_tags($tool->description), 160),
            "url" => route('tools.show', $tool),
            "offers" => [
                "@type" => "Offer",
                "priceCurrency" => "EUR",
                "price" => $tool->packages->count()
                    ? number_format($tool->packages->min('price'), 2, '.', '')
                    : "0.00",
                "availability" => "https://schema.org/InStock"
            ]
        ]
    ];
}

$schemaJson = json_encode(
    [
        "@context" => "https://schema.org",
        "@type" => "ItemList",
        "name" => "Entwickler-Tools & Utilities",
        "itemListElement" => $schemaItems
    ],
    JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
);
@endphp


<x-app-layout
    title="Entwickler-Tools & Utilities | DigitalPackt"
    metaDescription="Entdecken Sie Premium Entwickler-Tools, skalierbare Utilities und professionelle Softwarelösungen für moderne digitale Projekte.">

    {{-- ===================== --}}
    {{-- SEO H1 (ONLY ONE) --}}
    {{-- ===================== --}}
    <h1 class="sr-only">
        Entwickler-Ökosystem entdecken – Premium Entwicklungs-Tools & Utilities
    </h1>

    {{-- ===================== --}}
    {{-- Schema.org JSON-LD --}}
    {{-- ===================== --}}
    @push('meta')
        <script type="application/ld+json">
{!! $schemaJson !!}
        </script>
    @endpush

    {{-- ===================== --}}
    {{-- HEADER --}}
    {{-- ===================== --}}
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
                    {{ $tools->total() }} verfügbare Utilities
                </span>
            </div>
        </div>
    </x-slot>

    {{-- ===================== --}}
    {{-- CONTENT --}}
    {{-- ===================== --}}
    <div class="py-16 bg-slate-50/50 relative overflow-hidden min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ✅ H2 – Search Section --}}
            <h2 class="sr-only">
                Entwickler-Tools durchsuchen
            </h2>

            {{-- SEARCH --}}
            <div class="mb-16">
                <div class="bg-white rounded-[2.5rem] shadow p-10 border">
                    <form method="GET" action="{{ route('tools.index') }}"
                          class="flex flex-col lg:flex-row gap-6">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Welche Anwendung bauen Sie heute?"
                               class="w-full pl-6 pr-6 py-5 bg-slate-50 border rounded-xl"/>

                        <button type="submit"
                                class="px-12 py-5 bg-gray-900 text-white font-black rounded-xl hover:bg-blue-600 transition">
                            Utility finden
                        </button>
                    </form>
                </div>
            </div>

            {{-- ✅ H2 – Tools Listing Section (CRITICAL FIX) --}}
            <h2 class="sr-only">
                Verfügbare Entwickler-Tools und Utilities
            </h2>

            {{-- TOOLS GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($tools as $tool)
                    <article class="group bg-white rounded-[3rem] shadow-[0_10px_40px_rgba(0,0,0,0.04)] hover:shadow-[0_20px_60px_rgba(37,99,235,0.15)] transition-all">

                        <div class="p-10">

                            {{-- H3 --}}
                            <h3 class="text-2xl font-black text-gray-900 mb-2">
                                {{ $tool->name }}
                            </h3>

                            <p class="text-xs font-bold text-gray-400 mb-4">
                                {{ $tool->domain }}
                            </p>

                            <p class="text-gray-500 mb-8 leading-relaxed">
                                {{ $tool->description ?? 'Skalierbares Entwickler-Utility mit sicherer Infrastruktur.' }}
                            </p>

                            {{-- PRICE --}}
                            <div class="p-6 bg-slate-50 rounded-[1.5rem] border border-slate-100">
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                    Ab Preis
                                </span>

                                <div class="text-3xl font-black text-gray-900 mt-1">
                                    @if($tool->packages->count())
                                        €{{ number_format($tool->packages->min('price'), 2) }}
                                    @else
                                        Preis auf Anfrage
                                    @endif
                                </div>

                                <span class="text-[10px] font-black text-blue-600 uppercase tracking-widest">
                                    {{ $tool->packages->count() }} Tarife
                                </span>
                            </div>

                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-20 bg-white rounded-3xl border border-dashed">
                        <h2 class="text-2xl font-black text-gray-900 mb-4">
                            Keine Tools gefunden
                        </h2>
                        <p class="text-gray-500">
                            Bitte versuchen Sie einen anderen Suchbegriff.
                        </p>
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            @if($tools->hasPages())
                <div class="mt-20 flex justify-center">
                    {{ $tools->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
