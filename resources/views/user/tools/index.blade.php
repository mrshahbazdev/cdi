@php
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Schema.org Data (Bleibt unverändert für SEO)
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
                "price" => $tool->packages->count() ? number_format($tool->packages->min('price'), 2, '.', '') : "0.00",
                "availability" => "https://schema.org/InStock"
            ]
        ]
    ];
}
$schemaJson = json_encode([
    "@context" => "https://schema.org",
    "@type" => "ItemList",
    "name" => "Developer Ecosystem – Premium Development Tools & Utilities",
    "itemListElement" => $schemaItems
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
@endphp

<x-app-layout
    title="Digital Packt – Professional SaaS Platform"
    metaDescription="Digital Packt ist Ihre professionelle SaaS Platform für moderne Softwareentwicklung. Entdecken Sie unser Developer Ecosystem mit Premium Tools und Utilities.">

    {{-- ✅ SEO H1 (Unsichtbar) --}}
    <h1 class="sr-only">Explore the Developer Ecosystem – Premium Development Tools & Utilities</h1>

    @push('meta')
        <script type="application/ld+json">{!! $schemaJson !!}</script>
    @endpush

    {{-- HEADER (Modernized) --}}
    <x-slot name="header">
        <div class="flex items-center space-x-5">
            <div class="relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl blur opacity-25"></div>
                <div class="relative w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-slate-100">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
            </div>
            <div>
                <h2 class="text-3xl font-black text-slate-900 tracking-tight">Ecosystem</h2>
                <div class="flex items-center space-x-2">
                    <span class="h-px w-4 bg-blue-600"></span>
                    <p class="text-[11px] font-bold text-blue-600 uppercase tracking-widest">Premium Tools & Utilities</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="bg-[#f8fafc] min-h-screen pb-24">
        
        {{-- HERO TEXT SECTION --}}
        <div class="relative overflow-hidden pt-16 pb-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="max-w-3xl">
                    <h2 class="text-4xl font-black text-slate-900 mb-8 leading-tight">
                        Ihr Zugang zum <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Digital Packt Ecosystem</span>
                    </h2>
                    <p class="text-xl text-slate-600 leading-relaxed mb-6">
                        In einer zunehmend digitalisierten Welt ist die Wahl der richtigen Software-Infrastruktur entscheidend für den unternehmerischen Erfolg. Digital Packt fungiert hierbei als Ihre <strong>Professional SaaS Platform</strong>.
                    </p>
                    <p class="text-lg text-slate-500 leading-relaxed">
                        Wenn Sie unsere Plattform <strong>exploren</strong>, entdecken Sie eine kuratierte Auswahl an <strong>Premium Development Tools & Utilities</strong>, die darauf optimiert sind, repetitive Workflows zu automatisieren.
                    </p>
                </div>
            </div>
            {{-- Dekorative Form im Hintergrund --}}
            <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-96 h-96 bg-blue-50 rounded-full blur-3xl opacity-50"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- SEARCH BAR (High-End Design) --}}
            <div class="mb-20">
                <div class="bg-white rounded-[2rem] p-3 shadow-xl shadow-slate-200/50 border border-slate-100">
                    <form method="GET" action="{{ route('tools.index') }}" class="flex flex-col md:flex-row items-center gap-3">
                        <div class="relative flex-1 w-full">
                            <div class="absolute inset-y-0 left-6 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   placeholder="Welche Anwendung bauen Sie heute?"
                                   class="w-full pl-14 pr-6 py-5 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all text-slate-700 placeholder-slate-400 font-medium"/>
                        </div>
                        <button type="submit" class="w-full md:w-auto px-10 py-5 bg-slate-900 hover:bg-blue-600 text-white font-bold rounded-2xl transition-all duration-300 transform hover:scale-[1.02] active:scale-95 shadow-lg shadow-slate-900/20">
                            Utility finden
                        </button>
                    </form>
                </div>
            </div>

            {{-- INFO GRID (Feature Style) --}}
            <div class="grid md:grid-cols-2 gap-8 mb-24">
                <div class="bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mb-6 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Optimierte Integration & Deployment</h3>
                    <p class="text-slate-600 leading-relaxed text-sm">
                        Die nahtlose Einbindung von <strong>Development Utilities</strong> in bestehende IT-Landschaften ist oft eine Hürde. Digital Packt löst dieses Problem durch standardisierte Schnittstellen und eine klare Dokumentation.
                    </p>
                </div>
                <div class="bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center mb-6 text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04kM12 21.48V22"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Sicherheit im Developer Ecosystem</h3>
                    <p class="text-slate-600 leading-relaxed text-sm">
                        Sicherheit steht bei jeder Software-Entscheidung an erster Stelle. Unser Ökosystem wird kontinuierlich auf Schwachstellen geprüft und aktualisiert. So stellen wir sicher, dass Sie mit Tools arbeiten, die modernsten Standards entsprechen.
                    </p>
                </div>
            </div>

            {{-- TOOLS GRID (Cards Redesign) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-24">
                @forelse($tools as $tool)
                    <article class="group bg-white rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden flex flex-col">
                        <div class="p-8 flex-1">
                            <div class="mb-6 flex justify-between items-start">
                                <div class="p-3 bg-slate-50 rounded-2xl group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                </div>
                                <span class="px-3 py-1 bg-green-50 text-green-600 text-[10px] font-bold uppercase rounded-full tracking-wider border border-green-100">Active</span>
                            </div>
                            <h3 class="text-2xl font-black text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">
                                {{ $tool->name }}
                            </h3>
                            <p class="text-slate-500 text-sm leading-relaxed mb-8">
                                {{ Str::limit($tool->description, 120) }}
                            </p>
                        </div>
                        <div class="px-8 pb-8">
                            <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100 flex items-center justify-between group-hover:bg-slate-100 transition-colors">
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Ab Preis</p>
                                    <p class="text-2xl font-black text-slate-900">
                                        @if($tool->packages->count())
                                            €{{ number_format($tool->packages->min('price'), 2) }}
                                        @else
                                            <span class="text-lg">Auf Anfrage</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="h-10 w-10 rounded-full bg-white flex items-center justify-center text-slate-900 shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <p class="text-slate-400 font-medium italic">Keine Tools im Ecosystem gefunden.</p>
                    </div>
                @endforelse
            </div>

            {{-- FAQ SECTION (Accordion Style Design) --}}
            <section class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-black text-slate-900 mb-4">Häufige Fragen zum Ecosystem</h2>
                    <p class="text-slate-500">Alles, was Sie über unsere Premium Development Utilities wissen müssen.</p>
                </div>
                <div class="space-y-4">
                    @php
                        $faqs = [
                            ['q' => 'Was ist ein Developer Ecosystem?', 'a' => 'Ein Developer Ecosystem wie das von Digital Packt ist ein Netzwerk aus aufeinander abgestimmten Tools, Frameworks und Ressourcen.'],
                            ['q' => 'Warum eine Professional SaaS Platform nutzen?', 'a' => 'Die Nutzung garantiert Stabilität, regelmäßige Sicherheitsupdates und eine skalierbare Infrastruktur für Ihr Business.'],
                            ['q' => 'Sind die Tools flexibel anpassbar?', 'a' => 'Ja, unsere Utilities sind modular konzipiert und lassen sich nahtlos in verschiedene Architekturen integrieren.'],
                            ['q' => 'Wie oft wird das Ecosystem aktualisiert?', 'a' => 'Wir erweitern unser Portfolio ständig um neue innovative Tools und Sicherheits-Patches.']
                        ];
                    @endphp

                    @foreach($faqs as $faq)
                        <div class="bg-white border border-slate-100 rounded-3xl p-8 hover:border-blue-200 transition-colors">
                            <h4 class="text-lg font-bold text-slate-900 mb-3 flex items-center">
                                <span class="w-2 h-2 bg-blue-600 rounded-full mr-3"></span>
                                {{ $faq['q'] }}
                            </h4>
                            <p class="text-slate-600 leading-relaxed text-sm pl-5">
                                {{ $faq['a'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>
</x-app-layout>