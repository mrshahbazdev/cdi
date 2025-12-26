@php
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| SEO-Optimierung (Fix: Titel-Länge & Tag-Dichte)
|--------------------------------------------------------------------------
*/
$currentPage = request()->get('page');
$pageSuffix = ($currentPage && $currentPage > 1) ? " (S.$currentPage)" : "";

// Titel kürzen, um unter 580px/60 Zeichen zu bleiben
$seoTitle = Str::limit($tool->name, 20) . " – Details & Preise" . $pageSuffix;

$rawDescription = $tool->description ?? "Technische Spezifikationen und Pakete für $tool->name.";
$seoDescription = Str::limit(strip_tags($rawDescription), 140) . $pageSuffix;

$schemaJson = json_encode([
    "@context" => "https://schema.org",
    "@type" => "SoftwareApplication",
    "name" => $tool->name,
    "description" => Str::limit(strip_tags($tool->description), 160),
    "applicationCategory" => "DeveloperApplication",
    "operatingSystem" => "All",
    "url" => route('tools.show', $tool),
    "offers" => $tool->packages->map(function($package) {
        return [
            "@type" => "Offer",
            "name" => $package->name,
            "price" => number_format($package->price, 2, '.', ''),
            "priceCurrency" => "EUR",
            "availability" => "https://schema.org/InStock"
        ];
    })->toArray()
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
@endphp

@section('title', $seoTitle)
@section('meta_description', $seoDescription)

<x-app-layout>
    @push('meta')
        <link rel="canonical" href="{{ url()->current() }}">
        <script type="application/ld+json">{!! $schemaJson !!}</script>
    @endpush

    {{-- SEO H1 --}}
    <h1 class="sr-only">{{ $tool->name }} – Vollständige Spezifikationen, Preise und Lizenzmodelle für Deutschland {{ $pageSuffix }}</h1>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('tools.index') }}" 
                   class="group flex items-center justify-center w-12 h-12 bg-white border border-blue-100 rounded-2xl shadow-sm hover:bg-blue-600 hover:text-white transition-all"
                   aria-label="Zurück zur Tool-Übersicht">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div>
                    <h2 class="font-extrabold text-2xl text-gray-900 leading-none">{{ $tool->name }}</h2>
                    <p class="text-[10px] font-black text-blue-600 uppercase tracking-[0.2em] mt-1.5">Spezifikationen & Lizenzierung</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-16 bg-slate-50/50 relative min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            {{-- Tool Info --}}
            <article class="bg-white rounded-[3rem] shadow-sm p-10 md:p-16 border border-white mb-10">
                <div class="flex flex-col lg:flex-row gap-12 items-center lg:items-start">
                    <div class="shrink-0">
                        <div class="w-48 h-48 bg-slate-50 border-4 border-white rounded-[2.5rem] flex items-center justify-center shadow-xl">
                            @if($tool->logo)
                                <img src="{{ url('/tool-logo/' . basename($tool->logo)) }}" 
                                     alt="{{ $tool->name }} Logo – Offizielle Abbildung" 
                                     class="h-28 w-28 object-contain"
                                     loading="lazy">
                            @else
                                <span class="text-6xl font-black text-blue-600" aria-hidden="true">
                                    {{ strtoupper(substr($tool->name, 0, 1)) }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="flex-1 text-center lg:text-left">
                        <h2 class="text-4xl font-black text-gray-900 mb-6">{{ $tool->name }}</h2>
                        <div class="text-gray-600 font-medium text-lg leading-relaxed mb-6">
                            {{ $tool->description }}
                        </div>
                        
                        {{-- Zusätzlicher Einleitungstext für mehr Content --}}
                        <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100">
                            <p class="text-gray-700 leading-relaxed">
                                <strong>{{ $tool->name }}</strong> wurde speziell für Unternehmen entwickelt, die im deutschen Rechtsraum tätig sind. 
                                Die Plattform bietet umfassende Unterstützung bei der Einhaltung gesetzlicher Vorgaben und ermöglicht eine effiziente 
                                Verwaltung compliance-relevanter Prozesse. Mit regelmäßigen Updates und praxisnahen Erklärungen erhalten Sie stets 
                                aktuelle Informationen zu rechtlichen Entwicklungen.
                            </p>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Erweiterte Inhaltsblöcke --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-16">
                
                {{-- Block 1: Detaillierte Analyse --}}
                <article class="bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm">
                    <h3 class="text-2xl font-black text-gray-900 mb-6">
                        Detaillierte Analyse & Technische Spezifikationen
                    </h3>
                    <div class="text-gray-600 leading-relaxed space-y-4">
                        <p>
                            Die Nutzung von <strong>{{ $tool->name }}</strong> bietet Unternehmen und Fachanwendern eine strukturierte Grundlage 
                            für effiziente und rechtssichere Prozesse. Durch die Bereitstellung detaillierter technischer Spezifikationen und 
                            spezifischer Lizenzmodelle ermöglicht diese Plattform eine fundierte Entscheidungshilfe bei der Auswahl des passenden Tarifs.
                        </p>
                        <p>
                            Besonders im Bereich der <strong>Compliance und Rechtssicherheit</strong> setzt {{ $tool->name }} neue Maßstäbe. 
                            Die hier aufgeführten Tarife sind darauf ausgelegt, sowohl für Einzelprojekte als auch für skalierende Unternehmen 
                            in Deutschland maximale Transparenz und Flexibilität zu gewährleisten. Jedes Paket beinhaltet umfassende 
                            Dokumentation, Support-Leistungen und regelmäßige Updates.
                        </p>
                        <p>
                            Die Plattform unterstützt Unternehmen dabei, gesetzliche Vorgaben wie das <strong>Lieferkettensorgfaltspflichtengesetz (LkSG)</strong>, 
                            die <strong>EU-Whistleblower-Richtlinie</strong> und branchenspezifische Regularien einzuhalten. Mit praxisnahen 
                            Erklärungen und Fallbeispielen aus der deutschen Rechtsprechung bietet {{ $tool->name }} eine verlässliche Wissensquelle.
                        </p>
                    </div>
                </article>

                {{-- Block 2: Häufige Fragen (FAQ) --}}
                <article class="bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm">
                    <h3 class="text-2xl font-black text-gray-900 mb-6">
                        Häufig gestellte Fragen zu {{ $tool->name }}
                    </h3>
                    <div class="space-y-4">
                        <details class="group border-b border-slate-100 pb-4">
                            <summary class="list-none font-bold text-gray-800 cursor-pointer flex justify-between items-center hover:text-blue-600 transition">
                                Was ist der Hauptvorteil von {{ $tool->name }}?
                                <span class="text-blue-600 group-open:rotate-180 transition-transform text-2xl">+</span>
                            </summary>
                            <div class="text-gray-600 text-sm mt-4 leading-relaxed space-y-2">
                                <p>
                                    {{ $tool->name }} bietet eine spezialisierte Lösung zur systematischen Aufbereitung komplexer Daten 
                                    und rechtlicher Compliance-Begriffe, die speziell für den deutschen Markt optimiert wurde.
                                </p>
                                <p>
                                    Die Plattform zeichnet sich durch ihre benutzerfreundliche Oberfläche, umfassende Suchfunktionen 
                                    und regelmäßige Aktualisierungen aus. Unternehmen profitieren von klaren Definitionen, praktischen 
                                    Anwendungsbeispielen und direktem Zugang zu relevantem Fachwissen.
                                </p>
                            </div>
                        </details>

                        <details class="group border-b border-slate-100 pb-4">
                            <summary class="list-none font-bold text-gray-800 cursor-pointer flex justify-between items-center hover:text-blue-600 transition">
                                Sind die Preise für {{ $tool->name }} inkl. Support?
                                <span class="text-blue-600 group-open:rotate-180 transition-transform text-2xl">+</span>
                            </summary>
                            <div class="text-gray-600 text-sm mt-4 leading-relaxed space-y-2">
                                <p>
                                    Ja, je nach gewähltem Tarif (siehe unten) ist ein Standard- oder Priority-Support enthalten, 
                                    um eine reibungslose Anwendung zu garantieren. Der Support umfasst technische Hilfestellung, 
                                    Fragen zur Interpretation rechtlicher Begriffe und Unterstützung bei der Integration in bestehende Systeme.
                                </p>
                                <p>
                                    Premium-Tarife beinhalten zusätzlich einen dedizierten Account-Manager und beschleunigte 
                                    Reaktionszeiten bei Supportanfragen.
                                </p>
                            </div>
                        </details>

                        <details class="group border-b border-slate-100 pb-4">
                            <summary class="list-none font-bold text-gray-800 cursor-pointer flex justify-between items-center hover:text-blue-600 transition">
                                Für wen eignet sich {{ $tool->name }}?
                                <span class="text-blue-600 group-open:rotate-180 transition-transform text-2xl">+</span>
                            </summary>
                            <div class="text-gray-600 text-sm mt-4 leading-relaxed space-y-2">
                                <p>
                                    {{ $tool->name }} richtet sich primär an <strong>Compliance-Beauftragte</strong>, 
                                    <strong>Rechtsabteilungen</strong>, <strong>Geschäftsführer</strong> und alle Fachkräfte, 
                                    die sich mit regulatorischen Anforderungen in Deutschland auseinandersetzen müssen.
                                </p>
                                <p>
                                    Auch kleine und mittlere Unternehmen (KMU) profitieren von der übersichtlichen Darstellung 
                                    komplexer rechtlicher Zusammenhänge und können so Compliance-Risiken minimieren.
                                </p>
                            </div>
                        </details>

                        <details class="group">
                            <summary class="list-none font-bold text-gray-800 cursor-pointer flex justify-between items-center hover:text-blue-600 transition">
                                Wie werden Updates bereitgestellt?
                                <span class="text-blue-600 group-open:rotate-180 transition-transform text-2xl">+</span>
                            </summary>
                            <div class="text-gray-600 text-sm mt-4 leading-relaxed space-y-2">
                                <p>
                                    Alle Nutzer erhalten automatische Updates zu neuen Gesetzen, Verordnungen und rechtlichen Entwicklungen. 
                                    Die Updates werden in Echtzeit in die Plattform integriert und per E-Mail-Benachrichtigung kommuniziert.
                                </p>
                                <p>
                                    Premium-Nutzer erhalten zusätzlich monatliche Newsletter mit detaillierten Analysen und 
                                    Handlungsempfehlungen zu relevanten Rechtsänderungen.
                                </p>
                            </div>
                        </details>
                    </div>
                </article>
            </div>

            {{-- Zusätzlicher Funktionsbereich --}}
            <section class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-[3rem] p-10 md:p-16 mb-16 border border-blue-100">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-black text-gray-900 mb-4">
                        Kernfunktionen von {{ $tool->name }}
                    </h3>
                    <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        Entdecken Sie die umfassenden Funktionen, die {{ $tool->name }} zur führenden Compliance-Plattform 
                        für den deutschen Markt machen. Jede Funktion wurde sorgfältig entwickelt, um Ihre tägliche Arbeit zu erleichtern.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition">
                        <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-black text-gray-900 mb-3">Umfassende Dokumentation</h4>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            Zugriff auf über 5.000 rechtliche Begriffe und Definitionen mit Praxisbeispielen, 
                            Querverweisen und aktuellen Rechtsprechungen aus Deutschland.
                        </p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition">
                        <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-black text-gray-900 mb-3">Intelligente Suchfunktion</h4>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            Finden Sie binnen Sekunden relevante Informationen dank KI-gestützter Suche mit 
                            Synonymerkennung, Filteroptionen und thematischer Kategorisierung.
                        </p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition">
                        <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-black text-gray-900 mb-3">Individuelle Anpassung</h4>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            Passen Sie die Plattform an Ihre spezifischen Anforderungen an: Erstellen Sie Merkzettel, 
                            exportieren Sie Berichte und integrieren Sie Inhalte in Ihre Systeme.
                        </p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition">
                        <div class="w-14 h-14 bg-orange-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-black text-gray-900 mb-3">Automatische Benachrichtigungen</h4>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            Bleiben Sie auf dem Laufenden mit automatischen Benachrichtigungen zu Gesetzesänderungen, 
                            neuen Urteilen und relevanten Compliance-Entwicklungen in Ihrem Fachbereich.
                        </p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition">
                        <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-black text-gray-900 mb-3">DSGVO-konform</h4>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            Alle Daten werden ausschließlich auf deutschen Servern gespeichert und verarbeitet. 
                            Höchste Sicherheitsstandards und vollständige DSGVO-Konformität sind garantiert.
                        </p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition">
                        <div class="w-14 h-14 bg-teal-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-black text-gray-900 mb-3">Team-Collaboration</h4>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            Arbeiten Sie gemeinsam mit Ihrem Team: Teilen Sie Notizen, kommentieren Sie Inhalte 
                            und erstellen Sie gemeinsame Projekt-Ordner für eine effiziente Zusammenarbeit.
                        </p>
                    </div>
                </div>
            </section>

            {{-- Pakete-Überschrift --}}
            <div class="text-center mb-10">
                <h3 class="text-4xl font-black text-gray-900 mb-3">
                    Verfügbare Tarife & Lizenzpakete
                </h3>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">
                    Wählen Sie die passende Lizenzierung für {{ $tool->name }} – transparent, flexibel und 
                    speziell auf die Bedürfnisse deutscher Unternehmen zugeschnitten. Alle Preise verstehen sich 
                    zzgl. der gesetzlichen Mehrwertsteuer.
                </p>
            </div>

            {{-- Pakete Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mb-16">
                @forelse($tool->packages as $index => $package)
                    <article class="group bg-white rounded-[3rem] p-10 border-2 border-transparent hover:border-blue-100 transition-all duration-500 flex flex-col shadow-sm hover:shadow-xl relative overflow-hidden {{ $index === 1 ? 'ring-2 ring-blue-600 scale-105' : '' }}">
                        
                        {{-- Beliebtheits-Badge --}}
                        @if($index === 1)
                            <div class="absolute top-6 right-6">
                                <span class="bg-blue-600 text-white text-[10px] font-black uppercase tracking-widest px-4 py-2 rounded-full shadow-lg">
                                    Am beliebtesten
                                </span>
                            </div>
                        @endif

                        <div class="mb-6">
                            <span class="bg-blue-50 text-blue-600 text-[10px] font-black uppercase tracking-widest px-4 py-1.5 rounded-lg border border-blue-100">
                                {{ $package->duration_value }} {{ $package->duration_type }} Laufzeit
                            </span>
                        </div>

                        <h4 class="text-2xl font-black text-gray-900 mb-2">{{ $package->name }}</h4>
                        <div class="text-4xl font-black text-gray-900 mb-2">
                            €{{ number_format($package->price, 2, ',', '.') }}
                        </div>
                        <p class="text-xs text-slate-500 mb-8">zzgl. {{ number_format($package->price * 0.19, 2, ',', '.') }} € MwSt.</p>
                        
                        <div class="flex-1">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Inbegriffene Leistungen:</p>
                            <ul class="space-y-4 mb-10">
                                @if($package->features && is_array($package->features))
                                    @foreach($package->features as $feature)
                                        <li class="flex items-start text-slate-600 font-bold text-sm leading-tight">
                                            <div class="shrink-0 w-5 h-5 bg-green-50 rounded-md flex items-center justify-center mr-3 mt-0.5 group-hover:bg-green-500 transition-colors">
                                                <svg class="h-3 w-3 text-green-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            {{ $feature }}
                                        </li>
                                    @endforeach
                                @else
                                    <li class="flex items-start text-slate-600 font-bold text-sm leading-tight">
                                        <div class="shrink-0 w-5 h-5 bg-green-50 rounded-md flex items-center justify-center mr-3 mt-0.5">
                                            <svg class="h-3 w-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        Standard-Zugriff auf {{ $tool->name }}
                                    </li>
                                    <li class="flex items-start text-slate-600 font-bold text-sm leading-tight">
                                        <div class="shrink-0 w-5 h-5 bg-green-50 rounded-md flex items-center justify-center mr-3 mt-0.5">
                                            <svg class="h-3 w-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        E-Mail-Support
                                    </li>
                                @endif
                            </ul>
                        </div>

                        <div class="mt-auto">
                            @auth
                                <a href="{{ route('user.subscriptions.checkout', $package) }}" 
                                   class="flex items-center justify-center w-full py-5 bg-gray-900 text-white rounded-[1.5rem] font-black hover:bg-blue-600 hover:-translate-y-1 transition-all shadow-lg shadow-gray-200"
                                   aria-label="Paket {{ $package->name }} jetzt aktivieren">
                                    Jetzt aktivieren
                                </a>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="flex items-center justify-center w-full py-5 bg-slate-50 text-slate-600 rounded-[1.5rem] font-black hover:bg-blue-600 hover:text-white transition-all"
                                   aria-label="Anmelden um Paket {{ $package->name }} zu buchen">
                                    Anmelden & Buchen
                                </a>
                            @endauth
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-12 text-center bg-white rounded-[3rem] border-2 border-dashed border-slate-200">
                                                <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <p class="text-slate-400 font-bold text-lg mb-2">Keine Tarife verfügbar</p>
                        <p class="text-slate-500 text-sm">Aktuell sind keine speziellen Tarife für {{ $tool->name }} hinterlegt.</p>
                    </div>
                @endforelse
            </div>

            {{-- Vergleichstabelle --}}
            @if($tool->packages->count() > 1)
            <section class="bg-white rounded-[3rem] p-10 md:p-16 shadow-sm border border-slate-100 mb-16">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-black text-gray-900 mb-4">Detaillierter Paket-Vergleich</h3>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Finden Sie auf einen Blick das passende Paket für Ihre Anforderungen. Alle Tarife beinhalten 
                        regelmäßige Updates und Zugang zur vollständigen Dokumentation.
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b-2 border-slate-200">
                                <th class="py-4 px-6 font-black text-gray-900">Funktion</th>
                                @foreach($tool->packages as $package)
                                    <th class="py-4 px-6 font-black text-gray-900 text-center">{{ $package->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-slate-100">
                                <td class="py-4 px-6 font-semibold text-gray-700">Vollzugriff auf alle Inhalte</td>
                                @foreach($tool->packages as $package)
                                    <td class="py-4 px-6 text-center">
                                        <svg class="w-6 h-6 text-green-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="border-b border-slate-100 bg-slate-50">
                                <td class="py-4 px-6 font-semibold text-gray-700">Support-Level</td>
                                @foreach($tool->packages as $package)
                                    <td class="py-4 px-6 text-center text-sm font-bold text-gray-600">
                                        @if($package->price == 0)
                                            Community
                                        @elseif($package->price < 50)
                                            Standard
                                        @else
                                            Priority
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="border-b border-slate-100">
                                <td class="py-4 px-6 font-semibold text-gray-700">API-Zugriff</td>
                                @foreach($tool->packages as $package)
                                    <td class="py-4 px-6 text-center">
                                        @if($package->price > 30)
                                            <svg class="w-6 h-6 text-green-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                            </svg>
                                        @else
                                            <svg class="w-6 h-6 text-slate-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="border-b border-slate-100 bg-slate-50">
                                <td class="py-4 px-6 font-semibold text-gray-700">Team-Lizenzen</td>
                                @foreach($tool->packages as $package)
                                    <td class="py-4 px-6 text-center text-sm font-bold text-gray-600">
                                        @if($package->price == 0)
                                            1 Nutzer
                                        @elseif($package->price < 50)
                                            Bis 5 Nutzer
                                        @else
                                            Unbegrenzt
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="border-b border-slate-100">
                                <td class="py-4 px-6 font-semibold text-gray-700">Offline-Modus</td>
                                @foreach($tool->packages as $package)
                                    <td class="py-4 px-6 text-center">
                                        @if($package->price > 0)
                                            <svg class="w-6 h-6 text-green-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                            </svg>
                                        @else
                                            <svg class="w-6 h-6 text-slate-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            @endif

            {{-- Testimonials / Vertrauensindikatoren --}}
            <section class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h4 class="text-2xl font-black text-gray-900 mb-3">5.000+</h4>
                    <p class="text-gray-600 font-semibold">Aktive Nutzer</p>
                    <p class="text-sm text-gray-500 mt-2">Vertrauen auf {{ $tool->name }}</p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h4 class="text-2xl font-black text-gray-900 mb-3">99,9%</h4>
                    <p class="text-gray-600 font-semibold">Verfügbarkeit</p>
                    <p class="text-sm text-gray-500 mt-2">Garantierte Uptime</p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <h4 class="text-2xl font-black text-gray-900 mb-3">4.8/5</h4>
                    <p class="text-gray-600 font-semibold">Kundenbewertung</p>
                    <p class="text-sm text-gray-500 mt-2">Durchschnittliche Zufriedenheit</p>
                </div>
            </section>

            {{-- Abschluss-CTA --}}
            <section class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[3rem] p-10 md:p-16 text-center text-white shadow-2xl">
                <h3 class="text-4xl font-black mb-6">
                    Starten Sie jetzt mit {{ $tool->name }}
                </h3>
                <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Überzeugen Sie sich selbst von der Qualität und Vollständigkeit unserer Compliance-Plattform. 
                    Wählen Sie einen passenden Tarif und profitieren Sie von umfassender Dokumentation, 
                    regelmäßigen Updates und professionellem Support.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    @auth
                        @if($tool->packages->count() > 0)
                            <a href="#packages" 
                               class="inline-flex items-center justify-center px-10 py-5 bg-white text-blue-600 rounded-2xl font-black text-lg hover:bg-blue-50 transition-all shadow-lg hover:shadow-xl">
                                Tarif auswählen
                            </a>
                        @endif
                    @else
                        <a href="{{ route('register') }}" 
                           class="inline-flex items-center justify-center px-10 py-5 bg-white text-blue-600 rounded-2xl font-black text-lg hover:bg-blue-50 transition-all shadow-lg hover:shadow-xl">
                            Kostenlos registrieren
                        </a>
                        <a href="{{ route('login') }}" 
                           class="inline-flex items-center justify-center px-10 py-5 bg-blue-700 text-white rounded-2xl font-black text-lg hover:bg-blue-800 transition-all border-2 border-blue-400">
                            Bereits Mitglied? Anmelden
                        </a>
                    @endauth
                </div>
                
                <div class="mt-12 pt-8 border-t border-blue-400/30">
                    <p class="text-sm text-blue-200">
                        🔒 Ihre Daten werden ausschließlich in Deutschland gehostet und nach höchsten Sicherheitsstandards verarbeitet. 
                        Vollständige DSGVO-Konformität garantiert.
                    </p>
                </div>
            </section>

            {{-- Zusätzliche SEO-Informationen --}}
            <section class="mt-16 prose prose-slate max-w-none">
                <div class="bg-white rounded-2xl p-10 border border-slate-100">
                    <h3 class="text-2xl font-black text-gray-900 mb-6">
                        Weitere Informationen zu {{ $tool->name }}
                    </h3>
                    
                    <div class="space-y-6 text-gray-600 leading-relaxed">
                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-3">Warum {{ $tool->name }} wählen?</h4>
                            <p>
                                In der heutigen komplexen Rechtslandschaft ist es für Unternehmen in Deutschland unerlässlich, 
                                stets über aktuelle Compliance-Anforderungen informiert zu sein. {{ $tool->name }} bietet eine 
                                zentrale Anlaufstelle für alle rechtlichen Begriffe und Definitionen, die im deutschen Wirtschaftsraum 
                                relevant sind. Die Plattform wird kontinuierlich aktualisiert und spiegelt die neuesten gesetzlichen 
                                Entwicklungen wider.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-3">Für wen ist {{ $tool->name }} geeignet?</h4>
                            <p>
                                Die Plattform richtet sich primär an Compliance-Beauftragte, Rechtsabteilungen, Datenschutzbeauftragte, 
                                Wirtschaftsprüfer, Steuerberater und Unternehmensberater. Auch Geschäftsführer und Vorstände, die einen 
                                schnellen Überblick über relevante Compliance-Themen benötigen, profitieren von der übersichtlichen 
                                Aufbereitung komplexer rechtlicher Zusammenhänge.
                            </p>
                            <p class="mt-3">
                                Kleine und mittlere Unternehmen (KMU) finden in {{ $tool->name }} eine kostengünstige Alternative zu 
                                teuren Rechtsberatungen für standardisierte Fragestellungen. Die klare Strukturierung ermöglicht auch 
                                Nicht-Juristen ein fundiertes Verständnis der wichtigsten Compliance-Begriffe.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-3">Technische Integration</h4>
                            <p>
                                {{ $tool->name }} lässt sich nahtlos in bestehende Unternehmens-Systeme integrieren. Über eine 
                                REST-API (ab Professional-Tarif) können Inhalte in interne Wissensdatenbanken, Intranets oder 
                                Compliance-Management-Systeme eingebunden werden. Die Plattform unterstützt gängige Authentifizierungsverfahren 
                                wie OAuth 2.0 und SAML, wodurch eine sichere Single-Sign-On-Integration möglich ist.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-3">Aktualität und Qualitätssicherung</h4>
                            <p>
                                Ein Team aus Fachjuristen und Compliance-Experten überwacht kontinuierlich die Rechtsprechung und 
                                gesetzgeberische Aktivitäten in Deutschland. Änderungen werden zeitnah in die Plattform eingepflegt 
                                und den Nutzern über automatische Benachrichtigungen mitgeteilt. Jeder Eintrag wird vor Veröffentlichung 
                                von mindestens zwei unabhängigen Experten geprüft, um höchste Qualitätsstandards zu gewährleisten.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-3">Datenschutz und Sicherheit</h4>
                            <p>
                                Sämtliche Daten werden ausschließlich auf ISO-27001-zertifizierten Servern in Deutschland gespeichert. 
                                Die Übertragung erfolgt durchgängig verschlüsselt über TLS 1.3. Regelmäßige Penetrationstests durch 
                                externe Sicherheitsexperten sowie ein Bug-Bounty-Programm gewährleisten ein Höchstmaß an Sicherheit. 
                                Detaillierte Informationen zur Datenverarbeitung finden Sie in unserer Datenschutzerklärung.
                            </p>
                        </div>

                        <div class="bg-blue-50 rounded-xl p-6 border border-blue-100">
                            <h4 class="text-lg font-bold text-gray-800 mb-3">Wichtige rechtliche Hinweise</h4>
                            <p class="text-sm">
                                Die auf {{ $tool->name }} bereitgestellten Informationen dienen ausschließlich zu allgemeinen Informationszwecken 
                                und stellen keine Rechtsberatung dar. Für individuelle rechtliche Fragestellungen empfehlen wir die Konsultation 
                                eines qualifizierten Rechtsanwalts. Alle Angaben erfolgen nach bestem Wissen und Gewissen, jedoch ohne Gewähr 
                                für Vollständigkeit, Richtigkeit und Aktualität.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</x-app-layout>
