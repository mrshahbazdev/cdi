@php
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
            "description" => \Illuminate\Support\Str::limit(strip_tags($tool->description), 160),
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
@endphp

<x-app-layout
    title="Entwickler-Tools & Utilities | DigitalPackt"
    metaDescription="Entdecken Sie Premium Entwickler-Tools, skalierbare Utilities und professionelle Softwarelösungen für moderne digitale Projekte.">

    {{-- ✅ SEO H1 --}}
    <h1 class="sr-only">
        Entwickler-Ökosystem entdecken – Premium Entwicklungs-Tools & Utilities
    </h1>

    {{-- ✅ Schema.org --}}
    @push('meta')
        <script type="application/ld+json">
            {!! json_encode([
                "@context" => "https://schema.org",
                "@type" => "ItemList",
                "name" => "Entwickler-Tools & Utilities",
                "itemListElement" => $schemaItems
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
        </script>
    @endpush

    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
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
            <div class="hidden sm:flex items-center px-4 py-2 bg-indigo-50 rounded-xl">
                <span class="text-sm font-black text-indigo-700">
                    {{ $tools->total() }} verfügbare Utilities
                </span>
            </div>
        </div>
    </x-slot>

    {{-- CONTENT --}}
    <div class="py-16 bg-slate-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- SEARCH --}}
            <div class="mb-16 bg-white rounded-[2.5rem] shadow p-10">
                <form method="GET" action="{{ route('tools.index') }}" class="flex gap-6">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Welche Anwendung bauen Sie heute?"
                           class="w-full pl-6 pr-6 py-5 rounded-xl border"/>
                    <button class="px-12 py-5 bg-gray-900 text-white font-black rounded-xl">
                        Utility finden
                    </button>
                </form>
            </div>

            {{-- TOOLS --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($tools as $tool)
                    <article class="group bg-white rounded-[3rem] shadow hover:shadow-xl transition">
                        <div class="p-10">
                            <h3 class="text-2xl font-black text-gray-900 mb-2">
                                {{ $tool->name }}
                            </h3>
                            <p class="text-xs text-gray-400 mb-4">
                                {{ $tool->domain }}
                            </p>
                            <p class="text-gray-500 mb-8">
                                {{ $tool->description }}
                            </p>

                            <div class="p-6 bg-slate-50 rounded-[1.5rem] border">
                                <span class="text-[10px] font-black text-slate-400 uppercase">
                                    Ab Preis
                                </span>
                                <div class="text-3xl font-black text-gray-900">
                                    @if($tool->packages->count())
                                        €{{ number_format($tool->packages->min('price'), 2) }}
                                    @else
                                        Preis auf Anfrage
                                    @endif
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
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
