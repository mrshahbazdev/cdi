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
        "name" => "Developer Ecosystem – Premium Development Tools & Utilities",
        "itemListElement" => $schemaItems
    ],
    JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
);
@endphp

<x-app-layout
    title="Digital Packt – Professional SaaS Platform"
    metaDescription="Digital Packt ist eine professionelle SaaS Platform für Entwickler. Entdecken Sie ein modernes Developer Ecosystem mit Premium Development Tools und Utilities.">

    {{-- ✅ H1 (SEO) - Keywords: Explore, Developer Ecosystem, Premium Development Tools & Utilities --}}
    <h1 class="sr-only">
        Explore the Developer Ecosystem – Premium Development Tools & Utilities
    </h1>

    {{-- Schema --}}
    @push('meta')
        <script type="application/ld+json">
{!! $schemaJson !!}
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
                        Developer Ecosystem
                    </h2>
                    <p class="text-[10px] font-black text-blue-600 uppercase tracking-[0.2em] mt-1">
                        Premium Development Tools & Utilities
                    </p>
                </div>
            </div>
        </div>
    </x-slot>

    {{-- CONTENT --}}
    <div class="py-16 bg-slate-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ✅ SEO FIX 1: Keyword Integration & Wortanzahl --}}
            <section class="max-w-4xl mb-14">
                <h2 class="text-3xl font-black text-gray-900 mb-6">Explore our Developer Ecosystem</h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-4">
                    Willkommen bei <strong>Digital Packt</strong>, Ihrer <strong>Professional SaaS Platform</strong> für moderne Softwareentwicklung. 
                    Hier können Sie unser umfassendes <strong>Developer Ecosystem exploren</strong>, das speziell darauf ausgerichtet ist, 
                    Ihren Workflow durch <strong>Premium Development Tools & Utilities</strong> zu optimieren.
                </p>
                <p class="text-gray-600">
                    Unsere Auswahl an Utilities hilft Entwicklern dabei, komplexe Aufgaben zu automatisieren und die Produktivität zu steigern. 
                    Jedes Tool in unserem Ecosystem wurde nach höchsten Qualitätsstandards entwickelt.
                </p>
            </section>

            {{-- SEARCH --}}
            <h2 class="sr-only">Development Tools durchsuchen</h2>

            <div class="mb-14">
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

            {{-- ✅ SEO FIX 2: Zusätzlicher relevanter Content für Wortanzahl --}}
            <section class="max-w-4xl mb-16">
                <div class="grid md:grid-cols-2 gap-8 text-sm text-gray-600 leading-relaxed">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Warum unsere Tools nutzen?</h3>
                        <p>
                            Unser <strong>Developer Ecosystem</strong> bietet nicht nur einfache Scripte, sondern vollwertige 
                            <strong>Premium Development Tools</strong>. Diese Utilities sind nahtlos in Ihre bestehende 
                            SaaS-Infrastruktur integrierbar und bieten maximale Performance für professionelle Ansprüche.
                        </p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Skalierbare Lösungen</h3>
                        <p>
                            Egal ob Sie ein Startup oder ein etabliertes Unternehmen sind – unsere <strong>Utilities</strong> 
                            skalieren mit Ihren Anforderungen. Entdecken Sie jetzt, wie Digital Packt die Art und Weise, 
                            wie Sie Software bauen, revolutionieren kann.
                        </p>
                    </div>
                </div>
            </section>

            {{-- TOOLS --}}
            <h2 class="sr-only">Verfügbare Development Tools & Utilities</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($tools as $tool)
                    <article class="group bg-white rounded-[3rem] shadow transition p-10">

                        <h3 class="text-2xl font-black text-gray-900 mb-2">
                            {{ $tool->name }}
                        </h3>

                        <p class="text-gray-500 mb-6">
                            {{ $tool->description }}
                        </p>

                        {{-- PRICE (RESTORED) --}}
                        <div class="mb-8 p-6 bg-slate-50 rounded-[1.5rem] border">
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

                        {{-- BUTTON (COMMENTED – AS REQUESTED) --}}
                        {{--
                        <a href="{{ route('tools.show', $tool) }}"
                           class="block text-center py-4 bg-gray-900 text-white rounded-xl font-black hover:bg-blue-600 transition">
                            Launch Utility
                        </a>
                        --}}

                    </article>
                @empty
                    <div class="col-span-3 text-center py-20 bg-white rounded-3xl border border-dashed">
                        <h2 class="text-2xl font-black text-gray-900 mb-4">
                            Keine Tools gefunden
                        </h2>
                        <p class="text-gray-500">
                            Bitte versuchen Sie einen anderen Suchbegriff im Developer Ecosystem.
                        </p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>