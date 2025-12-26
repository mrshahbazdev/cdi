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
    title="Digital Packt – Professionelle SaaS-Plattform"
    metaDescription="Digital Packt ist Ihre professionelle SaaS-Plattform für moderne Softwareentwicklung. Entdecken Sie unser Developer Ecosystem mit Premium-Tools und Utilities.">

    {{-- ✅ H1 (SEO) --}}
    <h1 class="sr-only">
        Entdecken Sie das Developer Ecosystem – Premium Development Tools & Utilities
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
                <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-700 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                </div>

                <div>
                    <h2 class="font-extrabold text-3xl text-gray-900 tracking-tight">
                        Developer Ecosystem
                    </h2>
                    <div class="flex items-center gap-2 mt-2">
                        <span class="text-xs font-black text-blue-600 uppercase tracking-widest">
                            Premium Entwickler-Tools
                        </span>
                        <div class="h-1 w-1 rounded-full bg-blue-200"></div>
                        <span class="text-xs font-medium text-gray-500">
                            {{ $tools->count() }} Utilities verfügbar
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    {{-- CONTENT --}}
    <div class="bg-gradient-to-b from-slate-50 to-white min-h-screen">
        <div class="relative overflow-hidden">
            <div class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,white,rgba(255,255,255,0.6))]"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
                <div class="text-center max-w-4xl mx-auto">
                    <div class="inline-flex items-center gap-3 mb-6 px-4 py-2 bg-blue-50 rounded-full border border-blue-100">
                        <div class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></div>
                        <span class="text-sm font-semibold text-blue-700">Professionelle SaaS-Plattform</span>
                    </div>
                    <h2 class="text-5xl font-black text-gray-900 mb-6 leading-tight">
                        Schneller entwickeln mit <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Premium Developer Tools</span>
                    </h2>
                    <p class="text-xl text-gray-600 leading-relaxed mb-8">
                        Ein kuratiertes Ecosystem aus spezialisierten Utilities, die darauf ausgelegt sind, Workflows zu automatisieren, die Produktivität zu steigern und Ihren Entwicklungszyklus zu beschleunigen.
                    </p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 mb-20">
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Optimierte Performance</h3>
                    <p class="text-gray-600">Jede Utility in unserem Ecosystem ist auf maximale Effizienz und minimalen Ressourcenverbrauch ausgelegt.</p>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <div class="w-14 h-14 bg-gradient-to-br from-emerald-50 to-teal-100 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Enterprise Sicherheit</h3>
                    <p class="text-gray-600">Entwickelt mit einer Security-First-Architektur, um Compliance mit Industriestandards und Datenschutz zu gewährleisten.</p>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-50 to-violet-100 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Nahtlose Integration</h3>
                    <p class="text-gray-600">Standardisierte APIs und umfassende Dokumentationen für eine mühelose Integration in bestehende Workflows.</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h2 class="text-3xl font-black text-gray-900 mb-2">Verfügbare Entwickler-Utilities</h2>
                    <p class="text-gray-600">Spezialisierte Tools zur Beschleunigung Ihres Entwicklungsprozesses</p>
                </div>
                <div class="text-sm font-medium text-gray-500">
                    Zeige {{ $tools->count() }} Tools
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($tools as $tool)
                    <article class="group bg-white rounded-2xl shadow-sm border border-gray-100 hover:border-blue-200 hover:shadow-md transition-all duration-300 p-8">
                        <div class="flex items-start justify-between mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                                </svg>
                            </div>
                            @if($tool->packages->count())
                                <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-sm font-semibold rounded-full">
                                    €{{ number_format($tool->packages->min('price'), 2) }}
                                </span>
                            @endif
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                            {{ $tool->name }}
                        </h3>
                        
                        <p class="text-gray-600 mb-6 line-clamp-2">
                            {{ Str::limit(strip_tags($tool->description), 120) }}
                        </p>
                        
                        <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                            <span class="text-sm font-medium text-gray-500">
                                {{ $tool->packages->count() ? 'Ab €' . number_format($tool->packages->min('price'), 2) . '/Monat' : 'Individuelle Preise' }}
                            </span>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-20 bg-white rounded-3xl border border-dashed border-gray-200">
                        <div class="w-20 h-20 mx-auto mb-6 bg-gray-50 rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Keine Tools verfügbar</h3>
                        <p class="text-gray-500">Schauen Sie bald wieder vorbei für neue Entwickler-Utilities.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
            <section class="mb-16">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-3xl p-10">
                    <h2 class="text-3xl font-black text-gray-900 mb-8">Ihr Zugang zum Digital Packt Developer Ecosystem</h2>
                    
                    <div class="grid md:grid-cols-2 gap-10">
                        <div class="space-y-6">
                            <p class="text-gray-700 leading-relaxed">
                                In einer zunehmend digitalisierten Welt ist die Wahl der richtigen Software-Infrastruktur entscheidend für den unternehmerischen Erfolg. Digital Packt fungiert hierbei als Ihre <strong>Professional SaaS Platform</strong>, die spezialisierte Lösungen für moderne Herausforderungen bündelt.
                            </p>
                            <p class="text-gray-700 leading-relaxed">
                                Unser Ziel ist es, ein modulares <strong>Developer Ecosystem</strong> zu schaffen, das technologische Komplexität reduziert und Entwicklern ermöglicht, sich voll und ganz auf ihre kreative Kernarbeit zu konzentrieren.
                            </p>
                        </div>
                        <div class="space-y-6">
                            <p class="text-gray-700 leading-relaxed">
                                Wenn Sie unsere Plattform <strong>exploren</strong>, entdecken Sie eine kuratierte Auswahl an <strong>Premium Development Tools & Utilities</strong>. Wir verstehen, dass Zeit die wertvollste Ressource in der Programmierung ist.
                            </p>
                            <p class="text-gray-700 leading-relaxed">
                                Jede bereitgestellte <strong>Utility</strong> in unserem Katalog ist darauf optimiert, repetitive Workflows zu automatisieren und die Effizienz innerhalb Ihres Teams spürbar zu steigern. Dabei setzen wir auf höchste Sicherheitsstandards und eine Architektur, die für zukünftiges Wachstum ausgelegt ist.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mb-16">
                <h2 class="text-3xl font-black text-gray-900 mb-10 text-center">Optimierte Entwicklungserfahrung</h2>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Optimierte Integration & Deployment</h3>
                        </div>
                        <div class="space-y-4 text-gray-600">
                            <p>
                                Die nahtlose Einbindung von <strong>Development Utilities</strong> in bestehende IT-Landschaften ist oft eine Hürde. Digital Packt löst dieses Problem durch standardisierte Schnittstellen und eine klare Dokumentation.
                            </p>
                            <p>
                                Wir begleiten Sie dabei, neue Module ohne Reibungsverluste in Ihre Deployment-Pipelines zu integrieren. Unsere Professional SaaS Platform bietet nicht nur Tools, sondern eine Philosophie der Agilität.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-100 to-teal-200 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Sicherheit im Developer Ecosystem</h3>
                        </div>
                        <div class="space-y-4 text-gray-600">
                            <p>
                                Sicherheit steht bei jeder Software-Entscheidung an erster Stelle. Unser Ökosystem wird kontinuierlich auf Schwachstellen geprüft und aktualisiert.
                            </p>
                            <p>
                                So stellen wir sicher, dass Sie mit Tools arbeiten, die den modernsten Industriestandards entsprechen und Ihre Daten sowie die Ihrer Kunden schützen. Egal ob Datenverarbeitung, Compliance-Checks oder Automatisierungs-Logik.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-gradient-to-b from-gray-50 to-white rounded-3xl p-10">
                <h2 class="text-3xl font-black text-gray-900 mb-10 text-center">Häufig gestellte Fragen (FAQ)</h2>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-8">
                        <div class="pb-6 border-b border-gray-200">
                            <h4 class="font-bold text-gray-900 mb-3 text-lg">Was ist ein Developer Ecosystem?</h4>
                            <p class="text-gray-600">Ein Developer Ecosystem wie das von Digital Packt ist ein Netzwerk aus koordinierten Tools, Frameworks und Ressourcen, die darauf ausgelegt sind, Softwareentwicklungsprozesse zu vereinfachen und zu beschleunigen. Es bietet Entwicklern eine konsistente Umgebung für maximale Produktivität.</p>
                        </div>
                        <div class="pb-6 border-b border-gray-200">
                            <h4 class="font-bold text-gray-900 mb-3 text-lg">Warum sollte ich eine professionelle SaaS-Plattform nutzen?</h4>
                            <p class="text-gray-600">Die Nutzung einer professionellen Plattform garantiert Stabilität, regelmäßige Sicherheitsupdates und eine skalierbare Infrastruktur. Anstatt isolierte Lösungen zu bauen, nutzen Sie bewährte Premium-Standards, die internationale Qualitätsanforderungen an Software erfüllen.</p>
                        </div>
                    </div>
                    <div class="space-y-8">
                        <div class="pb-6 border-b border-gray-200">
                            <h4 class="font-bold text-gray-900 mb-3 text-lg">Sind die Tools flexibel und anpassbar?</h4>
                            <p class="text-gray-600">Ja, unsere Utilities sind modular aufgebaut und lassen sich in verschiedenste Architekturen integrieren. Ob als Standalone-Lösung oder Teil einer größeren Microservices-Landschaft – Flexibilität steht bei Digital Packt im Vordergrund.</p>
                        </div>
                        <div class="pb-6 border-b border-gray-200">
                            <h4 class="font-bold text-gray-900 mb-3 text-lg">Wie oft wird das Ecosystem aktualisiert?</h4>
                            <p class="text-gray-600">Wir erweitern unser Portfolio ständig um innovative Tools und aktualisieren bestehende Anwendungen, um Kompatibilität mit den neuesten Programmiersprachen und Sicherheitspatches zu gewährleisten. So bleibt Ihre Entwicklung technologisch immer an der Spitze.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="bg-gradient-to-r from-blue-600 to-indigo-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <div class="text-center">
                    <h2 class="text-3xl font-black text-white mb-6">Bereit, Ihren Entwicklungs-Workflow zu transformieren?</h2>
                    <p class="text-blue-100 text-lg mb-8 max-w-2xl mx-auto">
                        Schließen Sie sich tausenden Entwicklern an, die dem Ecosystem von Digital Packt für ihre kritischen Entwicklungsanforderungen vertrauen.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('tools.index') }}" class="px-8 py-4 bg-white text-blue-600 font-bold rounded-xl hover:bg-blue-50 transition-colors">
                            Alle Utilities ansehen
                        </a>
                        <button class="px-8 py-4 bg-blue-800 text-white font-bold rounded-xl hover:bg-blue-900 transition-colors border border-blue-500">
                            Demo vereinbaren
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>