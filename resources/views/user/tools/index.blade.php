@php
use Illuminate\Support\Str;

/* SCHEMA BLEIBT UNVERÄNDERT FÜR 100% SEO */
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
                "price" => $tool->packages->count() ? number_format($tool->packages->min('price'), 2, '.', '') : "0.00",
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

    {{-- SEO H1 --}}
    <h1 class="sr-only">Explore the Developer Ecosystem – Premium Development Tools & Utilities</h1>

    @push('meta')
        <script type="application/ld+json">{!! $schemaJson !!}</script>
    @endpush

    {{-- MAIN CONTENT --}}
    <div class="bg-[#f8fafc] min-h-screen pb-20">
        
        {{-- HERO SECTION --}}
        <div class="relative overflow-hidden bg-white border-b border-slate-200 pt-16 pb-24">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full opacity-10 pointer-events-none">
                <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[60%] bg-blue-400 rounded-full blur-[120px]"></div>
                <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[60%] bg-indigo-400 rounded-full blur-[120px]"></div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-100 mb-6">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    <span class="text-[10px] font-bold text-blue-700 uppercase tracking-widest">Developer Ecosystem v2.0</span>
                </div>
                
                <h2 class="text-4xl md:text-6xl font-[900] text-slate-900 tracking-tight mb-6">
                    Professional <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">SaaS Platform</span>
                </h2>

                {{-- SEO Text 1 --}}
                <div class="max-w-3xl mx-auto">
                    <p class="text-lg text-slate-600 leading-relaxed">
                        In einer zunehmend digitalisierten Welt ist die Wahl der richtigen Software-Infrastruktur entscheidend. 
                        <strong>Digital Packt</strong> fungiert als Ihre Professional SaaS Platform, die technologische Komplexität reduziert 
                        und ein modulares <strong>Developer Ecosystem</strong> schafft.
                    </p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12">
            
            {{-- TOOLS GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($tools as $tool)
                    <article class="group relative bg-white rounded-3xl border border-slate-200 p-8 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="flex flex-col h-full">
                            <div class="mb-6 flex justify-between items-start">
                                <div class="w-14 h-14 bg-slate-50 rounded-2xl flex items-center justify-center group-hover:bg-blue-600 transition-colors duration-300">
                                    <svg class="w-7 h-7 text-slate-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                    </svg>
                                </div>
                                <span class="text-[10px] font-bold py-1 px-3 bg-slate-100 text-slate-500 rounded-full uppercase">Utility</span>
                            </div>

                            <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">
                                {{ $tool->name }}
                            </h3>

                            <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-grow">
                                {{ Str::limit($tool->description, 120) }}
                            </p>

                            <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
                                <div>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-tighter">Startet bei</p>
                                    <p class="text-xl font-bold text-slate-900">
                                        @if($tool->packages->count())
                                            €{{ number_format($tool->packages->min('price'), 2) }}
                                        @else
                                            <span class="text-sm">Auf Anfrage</span>
                                        @endif
                                    </p>
                                </div>
                                <a href="{{ route('tools.show', $tool) }}" class="p-3 bg-slate-900 text-white rounded-xl hover:bg-blue-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-20 text-center bg-white rounded-3xl border-2 border-dashed border-slate-200">
                        <p class="text-slate-400">Momentan sind keine Tools im Ecosystem verfügbar.</p>
                    </div>
                @endforelse
            </div>

            {{-- SEO SECTION 2: INFOS --}}
            <section class="mt-24 grid md:grid-cols-2 gap-16 items-center">
                <div class="space-y-6">
                    <h3 class="text-3xl font-black text-slate-900">Optimierte Integration & Deployment</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Die nahtlose Einbindung von <strong>Development Utilities</strong> in bestehende IT-Landschaften ist oft eine Hürde. 
                        Digital Packt löst dieses Problem durch standardisierte Schnittstellen. Wir begleiten Sie dabei, neue Module ohne Reibungsverluste in Ihre Deployment-Pipelines zu integrieren.
                    </p>
                    <div class="flex items-center space-x-4 text-blue-600 font-bold">
                        <span class="h-px w-12 bg-blue-600"></span>
                        <span>Agilität & Time-to-Market Fokus</span>
                    </div>
                </div>
                <div class="bg-slate-900 rounded-[3rem] p-10 text-white shadow-2xl relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold mb-4">Sicherheit im Ecosystem</h3>
                        <p class="text-slate-400 leading-relaxed mb-6">
                            Unser Ökosystem wird kontinuierlich auf Schwachstellen geprüft. Wir bieten die Infrastruktur, die mit Ihren Anforderungen mitwächst – egal ob Datenverarbeitung oder Compliance-Checks.
                        </p>
                        <ul class="space-y-3 text-sm">
                            <li class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
                                <span>Modernste Industriestandards</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
                                <span>Skalierbare SaaS-Architektur</span>
                            </li>
                        </ul>
                    </div>
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-blue-600/20 rounded-full blur-3xl"></div>
                </div>
            </section>

            {{-- SEO SECTION 3: FAQ (Unverändert für SEO) --}}
            <section class="mt-24 pt-16 border-t border-slate-200">
                <h2 class="text-3xl font-black text-slate-900 mb-12 text-center">FAQ – Häufige Fragen</h2>
                <div class="grid md:grid-cols-2 gap-x-12 gap-y-8">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <h4 class="font-bold text-slate-900 mb-2">Was ist ein Developer Ecosystem?</h4>
                        <p class="text-slate-600 text-sm">Ein Netzwerk aus aufeinander abgestimmten Tools und Ressourcen, die den Software-Entwicklungsprozess vereinfachen und eine konsistente Umgebung bieten.</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <h4 class="font-bold text-slate-900 mb-2">Warum eine Professional SaaS Platform?</h4>
                        <p class="text-slate-600 text-sm">Sie garantiert Stabilität, regelmäßige Updates und eine Infrastruktur, die internationalen Qualitätsstandards entspricht, statt auf Insellösungen zu setzen.</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <h4 class="font-bold text-slate-900 mb-2">Sind die Tools flexibel anpassbar?</h4>
                        <p class="text-slate-600 text-sm">Ja, unsere Utilities sind modular konzipiert. Sie funktionieren als Standalone-Lösung oder integriert in komplexe Microservices-Landschaften.</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <h4 class="font-bold text-slate-900 mb-2">Wie oft gibt es Updates?</h4>
                        <p class="text-slate-600 text-sm">Wir erweitern das Portfolio ständig um innovative Tools und halten bestehende Anwendungen kompatibel zu neuesten Sprachen und Sicherheits-Patches.</p>
                    </div>
                </div>
            </section>

        </div>
    </div>
</x-app-layout>