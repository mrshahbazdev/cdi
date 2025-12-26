@php
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Schema.org Data
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
    title="Digital Packt – Professional SaaS Platform | Entwickler-Tools & Utilities"
    metaDescription="Digital Packt ist eine professionelle SaaS-Plattform für Entwickler. Entdecken Sie Premium Development Tools, Utilities und skalierbare Softwarelösungen.">

    {{-- ===================== --}}
    {{-- SEO H1 --}}
    {{-- ===================== --}}
    <h1 class="sr-only">
        Explore the Developer Ecosystem – Premium Development Tools & Utilities
    </h1>

    {{-- ===================== --}}
    {{-- Schema.org --}}
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
                        Premium Development Tools & Utilities
                    </p>
                </div>
            </div>
        </div>
    </x-slot>

    {{-- ===================== --}}
    {{-- CONTENT --}}
    {{-- ===================== --}}
    <div class="py-16 bg-slate-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ✅ TEXT BLOCK 1 (CRITICAL SEO FIX) --}}
            <section class="mb-12 max-w-4xl">
                <p class="text-lg text-gray-700 leading-relaxed">
                    <strong>Digital Packt</strong> ist eine <strong>professionelle SaaS-Plattform</strong>,
                    die ein modernes <strong>Developer Ecosystem</strong> bereitstellt.
                    Hier finden Entwickler, Startups und Unternehmen leistungsstarke
                    <strong>Development Tools und Utilities</strong>, um digitale Produkte
                    effizient zu planen, zu entwickeln und zu skalieren.
                </p>
            </section>

            {{-- ✅ H2 – Search --}}
            <h2 class="sr-only">Development Tools durchsuchen</h2>

            {{-- SEARCH --}}
            <div class="mb-12">
                <div class="bg-white rounded-[2.5rem] shadow p-10 border">
                    <form method="GET" action="{{ route('tools.index') }}"
                          class="flex flex-col lg:flex-row gap-6">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Welche Anwendung bauen Sie heute?"
                               class="w-full pl-6 pr-6 py-5 bg-slate-50 border rounded-xl"/>

                        <button type="submit"
                                class="px-12 py-5 bg-gray-900 text-white font-black rounded-xl">
                            Utility finden
                        </button>
                    </form>
                </div>
            </div>

            {{-- ✅ TEXT BLOCK 2 --}}
            <section class="mb-16 max-w-4xl">
                <p class="text-gray-600 leading-relaxed">
                    Alle Tools auf Digital Packt sind als professionelle SaaS-Lösungen konzipiert.
                    Sie unterstützen Teams bei Innovation, Produktentwicklung, Compliance,
                    Ideenmanagement und weiteren geschäftskritischen Prozessen innerhalb
                    eines modernen Software-Ökosystems.
                </p>
            </section>

            {{-- ✅ H2 – Tools Listing --}}
            <h2 class="sr-only">Verfügbare Entwickler Tools & Utilities</h2>

            {{-- TOOLS GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($tools as $tool)
                    <article class="bg-white rounded-[3rem] shadow transition p-10">
                        <h3 class="text-2xl font-black text-gray-900 mb-2">
                            {{ $tool->name }}
                        </h3>
                        <p class="text-gray-500 mb-6">
                            {{ $tool->description }}
                        </p>
                    </article>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
