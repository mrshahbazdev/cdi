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

    {{-- ✅ H1 (SEO) --}}
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

            {{-- ✅ SEO SECTION 1: Einleitung (Wortanzahl Fokus) --}}
            <section class="max-w-4xl mb-14">
                <h2 class="text-3xl font-black text-gray-900 mb-6">Ihr Zugang zum Digital Packt Developer Ecosystem</h2>
                
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    In einer zunehmend digitalisierten Welt ist die Wahl der richtigen Software-Infrastruktur entscheidend für den unternehmerischen Erfolg. Digital Packt fungiert hierbei als Ihre <strong>Professional SaaS Platform</strong>, die spezialisierte Lösungen für moderne Herausforderungen bündelt. Unser Ziel ist es, ein modulares <strong>Developer Ecosystem</strong> zu schaffen, das technologische Komplexität reduziert und Entwicklern ermöglicht, sich voll und ganz auf ihre kreative Kernarbeit zu konzentrieren.
                </p>

                <p class="text-gray-600 leading-relaxed mb-6">
                    Wenn Sie unsere Plattform <strong>exploren</strong>, entdecken Sie eine kuratierte Auswahl an <strong>Premium Development Tools & Utilities</strong>. Wir verstehen, dass Zeit die wertvollste Ressource in der Programmierung ist. Jede bereitgestellte <strong>Utility</strong> in unserem Katalog ist darauf optimiert, repetitive Workflows zu automatisieren und die Effizienz innerhalb Ihres Teams spürbar zu steigern. Dabei setzen wir auf höchste Sicherheitsstandards und eine Architektur, die für zukünftiges Wachstum ausgelegt ist.
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

            {{-- ✅ SEO SECTION 2: Fachbereiche (Wortanzahl Fokus) --}}
            <section class="max-w-4xl mb-16">
                <div class="grid md:grid-cols-2 gap-10 text-gray-600 leading-relaxed">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Optimierte Integration & Deployment</h3>
                        <p class="mb-4">
                            Die nahtlose Einbindung von <strong>Development Utilities</strong> in bestehende IT-Landschaften ist oft eine Hürde. Digital Packt löst dieses Problem durch standardisierte Schnittstellen und eine klare Dokumentation. Wir begleiten Sie dabei, neue Module ohne Reibungsverluste in Ihre Deployment-Pipelines zu integrieren.
                        </p>
                        <p>
                            Unsere Professional SaaS Platform bietet nicht nur Tools, sondern eine Philosophie der Agilität. Durch die Nutzung unseres Ökosystems profitieren Sie von technologischen Synergien, die Ihre Time-to-Market erheblich verkürzen können.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Sicherheit im Developer Ecosystem</h3>
                        <p class="mb-4">
                            Sicherheit steht bei jeder Software-Entscheidung an erster Stelle. Unser Ökosystem wird kontinuierlich auf Schwachstellen geprüft und aktualisiert. So stellen wir sicher, dass Sie mit Tools arbeiten, die den modernsten Industriestandards entsprechen und Ihre Daten sowie die Ihrer Kunden schützen.
                        </p>
                        <p>
                            Egal ob Datenverarbeitung, Compliance-Checks oder Automatisierungs-Logik – wir bieten die Infrastruktur, die mit Ihren Anforderungen mitwächst. Vertrauen Sie auf eine skalierbare Lösung für Ihre nächste große SaaS-Idee.
                        </p>
                    </div>
                </div>
            </section>

            {{-- TOOLS GRID --}}
            <h2 class="sr-only">Verfügbare Development Tools & Utilities</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mb-20">
                @forelse($tools as $tool)
                    <article class="group bg-white rounded-[3rem] shadow transition p-10">
                        <h3 class="text-2xl font-black text-gray-900 mb-2">
                            {{ $tool->name }}
                        </h3>
                        <p class="text-gray-500 mb-6">
                            {{ $tool->description }}
                        </p>
                        <div class="mb-8 p-6 bg-slate-50 rounded-[1.5rem] border">
                            <span class="text-[10px] font-black text-slate-400 uppercase">Ab Preis</span>
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
                        <p class="text-gray-500">Keine Tools gefunden.</p>
                    </div>
                @endforelse
            </div>

            {{-- ✅ SEO SECTION 3: FAQ (Sichert die 500+ Wörter ab) --}}
            <section class="max-w-4xl mx-auto py-12 border-t border-gray-200">
                <h2 class="text-2xl font-black text-gray-900 mb-8">Häufige Fragen zu unseren Development Utilities</h2>
                <div class="space-y-8 text-gray-600">
                    <div>
                        <h4 class="font-bold text-gray-900 mb-2">Was ist ein Developer Ecosystem?</h4>
                        <p>Ein Developer Ecosystem wie das von Digital Packt ist ein Netzwerk aus aufeinander abgestimmten Tools, Frameworks und Ressourcen, die gemeinsam dazu dienen, den Software-Entwicklungsprozess zu vereinfachen und zu beschleunigen. Es bietet eine konsistente Umgebung für Entwickler.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-2">Warum sollte ich eine Professional SaaS Platform nutzen?</h4>
                        <p>Die Nutzung einer professionellen Plattform garantiert Stabilität, regelmäßige Sicherheitsupdates und eine skalierbare Infrastruktur. Anstatt eigene Insellösungen zu bauen, nutzen Sie bewährte Premium-Standards, die den internationalen Anforderungen an Softwarequalität entsprechen.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-2">Sind die Tools flexibel anpassbar?</h4>
                        <p>Ja, unsere Utilities sind so konzipiert, dass sie modular in verschiedene Architekturen integriert werden können. Ob als Standalone-Lösung oder als Teil einer größeren Microservices-Landschaft – die Flexibilität steht bei Digital Packt im Vordergrund.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-2">Wie oft wird das Ecosystem aktualisiert?</h4>
                        <p>Wir erweitern unser Portfolio ständig um neue innovative Tools und aktualisieren bestehende Anwendungen, um Kompatibilität mit den neuesten Programmiersprachen und Sicherheits-Patches zu gewährleisten. So bleibt Ihre Entwicklung stets auf dem neuesten Stand der Technik.</p>
                    </div>
                </div>
            </section>

        </div>
    </div>
</x-app-layout>