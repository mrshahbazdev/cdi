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
    metaDescription="Digital Packt ist Ihre professionelle SaaS Platform für moderne Softwareentwicklung. Entdecken Sie unser Developer Ecosystem mit Premium Tools und Utilities.">

    {{-- ✅ H1 (SEO) - Bleibt für Google im Hintergrund --}}
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

            {{-- ✅ SEO FIX 1: Wortanzahl & Keyword-Relevanz ohne Spam-Gefahr --}}
            <section class="max-w-4xl mb-14">
                <h2 class="text-3xl font-black text-gray-900 mb-6">Willkommen im Digital Packt Developer Ecosystem</h2>
                
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    In einer Ära, in der Softwarelösungen das Rückgrat moderner Unternehmen bilden, bietet Digital Packt eine <strong>Professional SaaS Platform</strong>, die speziell auf die Bedürfnisse von Entwicklern zugeschnitten ist. Unser Ziel ist es, Ihnen ein modulares <strong>Developer Ecosystem</strong> zur Verfügung zu stellen, welches die Effizienz steigert und technische Barrieren abbaut.
                </p>

                <p class="text-gray-600 leading-relaxed mb-6">
                    Wenn Sie unsere Plattform <strong>exploren</strong>, finden Sie eine exklusive Auswahl an <strong>Premium Development Tools & Utilities</strong>. Diese Anwendungen sind nicht bloß einfache Skripte, sondern tief integrierte Lösungen für die Automatisierung und Optimierung komplexer Arbeitsschritte. Jede einzelne <strong>Utility</strong> in unserem Katalog durchläuft strenge Qualitätskontrollen, um sicherzustellen, dass sie den hohen Anforderungen moderner Cloud-Architekturen gerecht wird.
                </p>

                <p class="text-gray-600 leading-relaxed">
                    Ob Sie an der Skalierung eines Startups arbeiten oder interne Unternehmensprozesse digitalisieren – unser Ökosystem bietet die notwendige Flexibilität. Wir unterstützen Sie dabei, repetitive Aufgaben zu minimieren, damit Ihr Team mehr Fokus auf die Core-Features legen kann. Entdecken Sie die Synergien unserer Tools und heben Sie Ihre Softwareentwicklung auf das nächste Level.
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

            {{-- ✅ SEO FIX 2: Fachinhalt zur Beseitigung der "Wenig Text" Warnung --}}
            <section class="max-w-4xl mb-16">
                <div class="grid md:grid-cols-2 gap-10 text-gray-600 leading-relaxed">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Infrastruktur und Integration</h3>
                        <p class="mb-4">
                            Die Integration von neuen Software-Modulen ist oft zeitaufwendig. Unsere <strong>Development Utilities</strong> sind so konzipiert, dass sie nahtlos in bestehende Pipelines eingefügt werden können. Wir legen großen Wert auf Dokumentation und Standardisierung, damit Sie keine Zeit mit der Fehlersuche verbringen müssen.
                        </p>
                        <p>
                            Durch die Nutzung unserer bereitgestellten API-Strukturen und Cloud-Module gewinnen Sie an Agilität. Dies ist ein Kernaspekt unserer Philosophie als professionelle Software-Schmiede.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Nachhaltige Software-Architektur</h3>
                        <p class="mb-4">
                            Sicherheit und Skalierbarkeit sind keine optionalen Features, sondern die Basis jeder Anwendung in unserem <strong>Ecosystem</strong>. Wir aktualisieren unsere Premium-Tools regelmäßig, um gegen aktuelle Bedrohungen geschützt zu sein und die neuesten technologischen Standards wie PHP 8.x und moderne JavaScript-Frameworks zu unterstützen.
                        </p>
                        <p>
                            Vertrauen Sie auf eine Partnerschaft mit Digital Packt, um Ihre technologische Vision Realität werden zu lassen. Wir begleiten Sie von der ersten Code-Zeile bis zum globalen Rollout Ihrer SaaS-Anwendung.
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
                    </article>
                @empty
                    <div class="col-span-3 text-center py-20 bg-white rounded-3xl border border-dashed">
                        <h2 class="text-2xl font-black text-gray-900 mb-4">
                            Keine Tools gefunden
                        </h2>
                        <p class="text-gray-500">
                            Bitte versuchen Sie einen anderen Suchbegriff in unserem Developer Ecosystem.
                        </p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>