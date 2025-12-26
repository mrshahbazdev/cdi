@php
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| SEO-Optimierung mit vollständiger Keyword-Integration
|--------------------------------------------------------------------------
*/
$currentPage = request()->get('page');
$pageSuffix = ($currentPage && $currentPage > 1) ? " (S.$currentPage)" : "";

// Dynamische Keyword-Varianz je Tool-ID
$uniqueKeywords = [
    'title_primary' => 'Funktionen & Lizenzierung',
    'title_secondary' => 'Technische Spezifikationen',
    'h1_keyword' => 'Funktionsumfang & Features',
    'description_focus' => 'rechtliche Compliance-Begriffe',
    'main_keyword' => 'Compliance-Software'
];

if ($tool->id % 2 == 0) {
    $uniqueKeywords = [
        'title_primary' => 'Compliance-Lösung & Tarife',
        'title_secondary' => 'Rechtssichere Dokumentation',
        'h1_keyword' => 'Vollständige Produktdetails',
        'description_focus' => 'Compliance-Management in Deutschland',
        'main_keyword' => 'Compliance-Lösung'
    ];
}

$seoTitle = $tool->name . " – " . $uniqueKeywords['title_primary'];
$rawDescription = $tool->description ?? "Informationen zu $tool->name – " . $uniqueKeywords['description_focus'];
$seoDescription = Str::limit(strip_tags($rawDescription), 140) . $pageSuffix;
$brandName = "Digital Packt";

$schemaJson = json_encode([
    "@context" => "https://schema.org",
    "@type" => "SoftwareApplication",
    "name" => $tool->name,
    "description" => Str::limit(strip_tags($tool->description), 160),
    "applicationCategory" => "DeveloperApplication",
    "operatingSystem" => "All",
    "url" => route('tools.show', $tool),
    "provider" => [
        "@type" => "Organization",
        "name" => $brandName,
        "url" => url('/')
    ],
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

@section('title', $seoTitle . ' – ' . $brandName)
@section('meta_description', $seoDescription)

<x-app-layout>
    @push('meta')
        <link rel="canonical" href="{{ url()->current() }}">
        <script type="application/ld+json">{!! $schemaJson !!}</script>
    @endpush

    {{-- SEO H1 mit ALLEN Keywords --}}
    <h1 class="sr-only">{{ $tool->name }} – {{ $uniqueKeywords['h1_keyword'] }}, Lizenzmodelle und Funktionsumfang {{ $pageSuffix }}</h1>

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
                    <p class="text-[10px] font-black text-blue-600 uppercase tracking-[0.2em] mt-1.5">
                        {{ $uniqueKeywords['title_secondary'] }}
                    </p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-16 bg-slate-50/50 relative min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            {{-- Tool Info mit ALLEN Title-Keywords --}}
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
                        <h2 class="text-4xl font-black text-gray-900 mb-6">
                            <strong>{{ $tool->name }}</strong>
                        </h2>
                        <div class="text-gray-600 font-medium text-lg leading-relaxed mb-6">
                            {{ $tool->description }}
                        </div>
                        
                        {{-- ✅ WICHTIG: Einleitungstext mit ALLEN Title- und H1-Keywords --}}
                        <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100">
                            <p class="text-gray-700 leading-relaxed mb-4">
                                <strong>{{ $brandName }}</strong> präsentiert Ihnen auf dieser Seite 
                                <strong>{{ $uniqueKeywords['h1_keyword'] }}</strong> zu {{ $tool->name }} – 
                                einer professionellen <strong>{{ $uniqueKeywords['main_keyword'] }}</strong> für Unternehmen in Deutschland.
                            </p>
                            <p class="text-gray-700 leading-relaxed">
                                Hier finden Sie alle wichtigen <strong>Produktdetails</strong>, transparente <strong>Tarife</strong> 
                                und eine <strong>vollständige</strong> Übersicht zu den verfügbaren <strong>Lizenzmodellen</strong>. 
                                Der <strong>Funktionsumfang</strong> umfasst {{ $uniqueKeywords['description_focus'] }} 
                                und wurde speziell für den deutschen Rechtsraum entwickelt. Mit umfassender Dokumentation, 
                                regelmäßigen Updates und professionellem Support erhalten Sie eine verlässliche Lösung 
                                für Ihre Compliance-Anforderungen.
                            </p>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Erweiterte Inhaltsblöcke mit H1-Keywords --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-16">
                
                {{-- Block 1: Produktdetails & Funktionsumfang (H1-Keywords) --}}
                <article class="bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm">
                    <h3 class="text-2xl font-black text-gray-900 mb-6">
                        Produktdetails & Funktionsumfang im Überblick
                    </h3>
                    <div class="text-gray-600 leading-relaxed space-y-4">
                        <p>
                            Die Nutzung von <strong>{{ $tool->name }}</strong> bietet Unternehmen und Fachanwendern eine strukturierte 
                            Grundlage für effiziente und rechtssichere Prozesse. Auf dieser Seite erhalten Sie 
                            <strong>vollständige Produktdetails</strong> sowie eine übersichtliche Darstellung des gesamten 
                            <strong>Funktionsumfangs</strong>.
                        </p>
                        <p>
                            Die verfügbaren <strong>Lizenzmodelle</strong> sind flexibel gestaltet und decken unterschiedliche 
                            Anforderungen ab – von Einzellizenzen bis hin zu Unternehmenslizenzen. Jedes Modell beinhaltet 
                            eine transparente Darstellung der <strong>Tarife</strong> und Leistungen, sodass Sie das für Ihre 
                            Organisation passende Angebot wählen können.
                        </p>
                        <p>
                            Besonders im Bereich der <strong>{{ $uniqueKeywords['description_focus'] }}</strong> setzt 
                            diese <strong>{{ $uniqueKeywords['main_keyword'] }}</strong> neue Maßstäbe. Die hier aufgeführten 
                            <strong>Tarife</strong> sind darauf ausgelegt, sowohl für Einzelprojekte als auch für 
                            skalierende Unternehmen in Deutschland maximale Transparenz und Flexibilität zu gewährleisten.
                        </p>
                        <p>
                            Die Plattform unterstützt Unternehmen dabei, gesetzliche Vorgaben wie das Lieferkettensorgfaltspflichtengesetz (LkSG), 
                            die EU-Whistleblower-Richtlinie und branchenspezifische Regularien einzuhalten. Mit praxisnahen 
                            Erklärungen und Fallbeispielen aus der deutschen Rechtsprechung erhalten Sie eine verlässliche Wissensquelle.
                        </p>
                        <p>
                            <strong>{{ $brandName }}</strong> stellt sicher, dass alle bereitgestellten <strong>Produktdetails</strong> 
                            höchsten Qualitätsansprüchen genügen und kontinuierlich aktualisiert werden. Ein Team aus Fachjuristen 
                            überwacht die Rechtsentwicklung und pflegt Änderungen zeitnah ein, damit Sie stets über den aktuellen 
                            Stand der Gesetzgebung informiert sind.
                        </p>
                    </div>
                </article>

                {{-- Block 2: Lizenzmodelle & Tarife (Title-Keywords) --}}
                <article class="bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm">
                    <h3 class="text-2xl font-black text-gray-900 mb-6">
                        Lizenzmodelle & Tarife im Detail
                    </h3>
                    <div class="text-gray-600 leading-relaxed space-y-4">
                        <p>
                            Die <strong>Lizenzmodelle</strong> von {{ $tool->name }} wurden speziell entwickelt, um 
                            unterschiedlichen Unternehmensgrößen und Anforderungen gerecht zu werden. Jedes Modell 
                            bietet einen klar definierten <strong>Funktionsumfang</strong> mit transparenten <strong>Tarifen</strong>.
                        </p>
                        <p>
                            Als professionelle <strong>{{ $uniqueKeywords['main_keyword'] }}</strong> bei <strong>{{ $brandName }}</strong> 
                            garantiert {{ $tool->name }} höchste Qualitätsstandards. Die <strong>Tarife</strong> sind fair kalkuliert 
                            und beinhalten bereits alle wesentlichen Funktionen wie regelmäßige Updates, technischen Support und 
                            Zugang zu allen Compliance-Ressourcen.
                        </p>
                        <p>
                            Die verschiedenen <strong>Lizenzmodelle</strong> umfassen:
                        </p>
                        <ul class="list-disc pl-6 space-y-2">
                            <li><strong>Basis-Lizenz:</strong> Idealer Einstieg mit allen wichtigen <strong>Produktdetails</strong> und Grundfunktionen</li>
                            <li><strong>Professional-Lizenz:</strong> Erweiterter <strong>Funktionsumfang</strong> mit API-Zugriff und Priority-Support</li>
                            <li><strong>Enterprise-Lizenz:</strong> <strong>Vollständige</strong> Integration mit individuellen Anpassungen und dedizierten Account-Manager</li>
                        </ul>
                        <p>
                            Alle <strong>Tarife</strong> verstehen sich zzgl. der gesetzlichen Mehrwertsteuer und können 
                            monatlich oder jährlich abgerechnet werden. Bei <strong>{{ $brandName }}</strong> gibt es 
                            keine versteckten Kosten – die angegebenen <strong>Tarife</strong> sind transparent und final.
                        </p>
                    </div>
                </article>
            </div>

            {{-- FAQ mit allen Keywords --}}
            <div class="bg-white rounded-[2.5rem] p-10 md:p-16 border border-slate-100 shadow-sm mb-16">
                <h3 class="text-3xl font-black text-gray-900 mb-8 text-center">
                    Häufig gestellte Fragen zu {{ $tool->name }}
                </h3>
                <div class="space-y-4 max-w-4xl mx-auto">
                    <details class="group border-b border-slate-100 pb-4">
                        <summary class="list-none font-bold text-gray-800 cursor-pointer flex justify-between items-center hover:text-blue-600 transition">
                            Welche Produktdetails umfasst {{ $tool->name }}?
                            <span class="text-blue-600 group-open:rotate-180 transition-transform text-2xl">+</span>
                        </summary>
                        <div class="text-gray-600 text-sm mt-4 leading-relaxed space-y-2">
                            <p>
                                Die <strong>Produktdetails</strong> von {{ $tool->name }} umfassen eine <strong>vollständige</strong> 
                                Dokumentation aller Funktionen, technischen Spezifikationen und Integrationsmöglichkeiten. 
                                Als <strong>{{ $uniqueKeywords['main_keyword'] }}</strong> von <strong>{{ $brandName }}</strong> 
                                bietet die Plattform einen umfassenden <strong>Funktionsumfang</strong> für die Verwaltung 
                                rechtlicher Compliance-Anforderungen.
                            </p>
                            <p>
                                Zu den detaillierten <strong>Produktdetails</strong> gehören: Systemanforderungen, 
                                Datenbankstrukturen, API-Dokumentation, Sicherheitszertifikate und Compliance-Standards. 
                                Der <strong>Funktionsumfang</strong> wird regelmäßig erweitert und alle Änderungen werden 
                                in den <strong>Produktdetails</strong> dokumentiert.
                            </p>
                        </div>
                    </details>

                    <details class="group border-b border-slate-100 pb-4">
                        <summary class="list-none font-bold text-gray-800 cursor-pointer flex justify-between items-center hover:text-blue-600 transition">
                            Wie sind die Lizenzmodelle und Tarife strukturiert?
                            <span class="text-blue-600 group-open:rotate-180 transition-transform text-2xl">+</span>
                        </summary>
                        <div class="text-gray-600 text-sm mt-4 leading-relaxed space-y-2">
                            <p>
                                Die <strong>Lizenzmodelle</strong> von {{ $tool->name }} sind transparent und fair kalkuliert. 
                                Die <strong>Tarife</strong> richten sich nach dem gewählten <strong>Funktionsumfang</strong> 
                                und der Anzahl der Nutzer. Bei <strong>{{ $brandName }}</strong> erhalten Sie für jeden 
                                <strong>Tarif</strong> eine <strong>vollständige</strong> Aufstellung aller inkludierten Leistungen.
                            </p>
                            <p>
                                Die verschiedenen <strong>Lizenzmodelle</strong> unterscheiden sich hauptsächlich im 
                                <strong>Funktionsumfang</strong>, Support-Level und in den Integrationsmöglichkeiten. 
                                Alle <strong>Tarife</strong> beinhalten jedoch Basis-Features wie Updates, Dokumentation 
                                und E-Mail-Support. Die <strong>Produktdetails</strong> zu jedem <strong>Lizenzmodell</strong> 
                                finden Sie weiter unten auf dieser Seite.
                            </p>
                        </div>
                    </details>

                    <details class="group border-b border-slate-100 pb-4">
                        <summary class="list-none font-bold text-gray-800 cursor-pointer flex justify-between items-center hover:text-blue-600 transition">
                            Welchen Funktionsumfang bietet die Compliance-Lösung?
                            <span class="text-blue-600 group-open:rotate-180 transition-transform text-2xl">+</span>
                        </summary>
                        <div class="text-gray-600 text-sm mt-4 leading-relaxed space-y-2">
                            <p>
                                Der <strong>Funktionsumfang</strong> dieser <strong>{{ $uniqueKeywords['main_keyword'] }}</strong> 
                                ist umfassend und deckt alle wichtigen Bereiche ab: Begriffsdatenbank, Suchfunktionen, 
                                Exportmöglichkeiten, Team-Collaboration, API-Zugriff und vieles mehr. Die <strong>vollständige</strong> 
                                Liste aller Features finden Sie in den <strong>Produktdetails</strong> der jeweiligen 
                                <strong>Lizenzmodelle</strong>.
                            </p>
                            <p>
                                Je nach gewähltem <strong>Lizenzmodell</strong> variiert der <strong>Funktionsumfang</strong>. 
                                Die Premium-<strong>Tarife</strong> bieten erweiterte Features wie Priority-Support, 
                                API-Zugriff und dedizierte Account-Manager. <strong>{{ $brandName }}</strong> stellt 
                                sicher, dass der <strong>Funktionsumfang</strong> kontinuierlich erweitert wird.
                            </p>
                        </div>
                    </details>

                    <details class="group">
                        <summary class="list-none font-bold text-gray-800 cursor-pointer flex justify-between items-center hover:text-blue-600 transition">
                            Sind die Tarife bei Digital Packt transparent?
                            <span class="text-blue-600 group-open:rotate-180 transition-transform text-2xl">+</span>
                        </summary>
                        <div class="text-gray-600 text-sm mt-4 leading-relaxed space-y-2">
                            <p>
                                Ja, <strong>{{ $brandName }}</strong> legt großen Wert auf Transparenz. Alle <strong>Tarife</strong> 
                                sind klar strukturiert und enthalten keine versteckten Kosten. Die <strong>Produktdetails</strong> 
                                zu jedem <strong>Lizenzmodell</strong> zeigen genau, welche Leistungen im jeweiligen 
                                <strong>Tarif</strong> enthalten sind.
                            </p>
                            <p>
                                Die <strong>Tarife</strong> verstehen sich zzgl. der gesetzlichen Mehrwertsteuer und 
                                können monatlich oder jährlich abgerechnet werden. Der <strong>vollständige</strong> 
                                <strong>Funktionsumfang</strong> jedes <strong>Lizenzmodells</strong> ist in den 
                                <strong>Produktdetails</strong> dokumentiert. Bei Fragen zu den <strong>Tarifen</strong> 
                                steht Ihnen das Support-Team von <strong>{{ $brandName }}</strong> jederzeit zur Verfügung.
                            </p>
                        </div>
                    </details>
                </div>
            </div>

            {{-- Funktionsbereich mit Keywords --}}
            <section class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-[3rem] p-10 md:p-16 mb-16 border border-blue-100">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-black text-gray-900 mb-4">
                        Vollständiger Funktionsumfang der Compliance-Lösung
                    </h3>
                    <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        Entdecken Sie den umfassenden <strong>Funktionsumfang</strong>, der {{ $tool->name }} zur führenden 
                        <strong>{{ $uniqueKeywords['main_keyword'] }}</strong> bei <strong>{{ $brandName }}</strong> macht. 
                        Jede Funktion wurde sorgfältig entwickelt und ist in den <strong>Produktdetails</strong> der jeweiligen 
                        <strong>Lizenzmodelle</strong> beschrieben.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition">
                        <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-black text-gray-900 mb-3">Vollständige Dokumentation</h4>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            Zugriff auf über 5.000 rechtliche Begriffe und Definitionen mit Praxisbeispielen. 
                            Die <strong>Produktdetails</strong> umfassen Querverweise und aktuelle Rechtsprechungen 
                            aus Deutschland – Teil des umfassenden <strong>Funktionsumfangs</strong>.
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
                            Finden Sie binnen Sekunden relevante Informationen dank KI-gestützter Suche. 
                            Diese Funktion ist in allen <strong>Lizenzmodellen</strong> enthalten und gehört 
                            zum Standard-<strong>Funktionsumfang</strong> der <strong>{{ $uniqueKeywords['main_keyword'] }}</strong>.
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
                            Passen Sie die Plattform an Ihre spezifischen Anforderungen an. Die <strong>Produktdetails</strong> 
                            zu den Anpassungsmöglichkeiten variieren je nach gewähltem <strong>Lizenzmodell</strong> 
                            und sind in den jeweiligen <strong>Tarifen</strong> aufgeführt.
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
                            Bleiben Sie auf dem Laufenden mit automatischen Benachrichtigungen – bereits in allen 
                            <strong>Tarifen</strong> inkludiert. Dieser wichtige Teil des <strong>Funktionsumfangs</strong> 
                            ist in den <strong>Produktdetails</strong> aller <strong>Lizenzmodelle</strong> enthalten.
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
                            Alle Daten werden ausschließlich in Deutschland gespeichert. Die <strong>vollständige</strong> 
                            DSGVO-Konformität ist in allen <strong>Lizenzmodellen</strong> garantiert und ohne Aufpreis 
                            in den <strong>Tarifen</strong> von <strong>{{ $brandName }}</strong> enthalten.
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
                            Arbeiten Sie gemeinsam mit Ihrem Team an Compliance-Projekten. Die Team-Funktionen sind 
                            Teil des erweiterten <strong>Funktionsumfangs</strong> und in den <strong>Produktdetails</strong> 
                            der Professional- und Enterprise-<strong>Lizenzmodelle</strong> beschrieben.
                        </p>
                    </div>
                </div>
            </section>

            {{-- Pakete-Überschrift mit allen Keywords --}}
            <div class="text-center mb-10" id="tarife">
                <h3 class="text-4xl font-black text-gray-900 mb-3">
                    Lizenzmodelle, Tarife & Vollständige Produktdetails
                </h3>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">
                    Wählen Sie das passende <strong>Lizenzmodell</strong> für {{ $tool->name }} – mit transparenten 
                    <strong>Tarifen</strong>, <strong>vollständigen Produktdetails</strong> und umfassendem 
                    <strong>Funktionsumfang</strong>. Diese <strong>{{ $uniqueKeywords['main_keyword'] }}</strong> 
                    von <strong>{{ $brandName }}</strong> ist speziell auf die Bedürfnisse deutscher Unternehmen zugeschnitten.
                </p>
            </div>

            {{-- Pakete Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mb-16">
                @forelse($tool->packages as $index => $package)
                    <article class="group bg-white rounded-[3rem] p-10 border-2 border-transparent hover:border-blue-100 transition-all duration-500 flex flex-col shadow-sm hover:shadow-xl relative overflow-hidden {{ $index === 1 ? 'ring-2 ring-blue-600 scale-105' : '' }}">
                        
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
                        <p class="text-xs text-slate-500 mb-4">Lizenzmodell mit vollständigen Produktdetails</p>
                        
                        <div class="text-4xl font-black text-gray-900 mb-2">
                            €{{ number_format($package->price, 2, ',', '.') }}
                        </div>
                        <p class="text-xs text-slate-500 mb-8">
                            Tarif zzgl. {{ number_format($package->price * 0.19, 2, ',', '.') }} € MwSt.
                        </p>
                        
                        <div class="flex-1">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">
                                Funktionsumfang dieses Lizenzmodells:
                            </p>
                            <ul class="space-y-4 mb-10">
                                @if($package->features && is_array($package->features))
                                    @foreach($package->features as $feature)
                                        <li class="flex items-start text-slate-600 font-semibold text-sm leading-tight">
                                            <div class="shrink-0 w-5 h-5 bg-green-50 rounded-md flex items-center justify-center mr-3 mt-0.5 group-hover:bg-green-500 transition-colors">
                                                <svg class="h-3 w-3 text-green-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            {{ $feature }}
                                        </li>
                                    @endforeach
                                @else
                                    <li class="flex items-start text-slate-600 font-semibold text-sm leading-tight">
                                        <div class="shrink-0 w-5 h-5 bg-green-50 rounded-md flex items-center justify-center mr-3 mt-0.5">
                                            <svg class="h-3 w-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        Standard-Funktionsumfang
                                    </li>
                                    <li class="flex items-start text-slate-600 font-semibold text-sm leading-tight">
                                        <div class="shrink-0 w-5 h-5 bg-green-50 rounded-md flex items-center justify-center mr-3 mt-0.5">
                                            <svg class="h-3 w-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        Vollständige Produktdetails
                                    </li>
                                    <li class="flex items-start text-slate-600 font-semibold text-sm leading-tight">
                                        <div class="shrink-0 w-5 h-5 bg-green-50 rounded-md flex items-center justify-center mr-3 mt-0.5">
                                            <svg class="h-3 w-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        E-Mail-Support inkl.
                                    </li>
                                @endif
                            </ul>
                        </div>

                        <div class="mt-auto">
                            @auth
                                <a href="{{ route('user.subscriptions.checkout', $package) }}" 
                                   class="flex items-center justify-center w-full py-5 bg-gray-900 text-white rounded-[1.5rem] font-black hover:bg-blue-600 hover:-translate-y-1 transition-all shadow-lg shadow-gray-200"
                                   aria-label="Lizenzmodell {{ $package->name }} jetzt aktivieren">
                                    Lizenzmodell wählen
                                </a>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="flex items-center justify-center w-full py-5 bg-slate-50 text-slate-600 rounded-[1.5rem] font-black hover:bg-blue-600 hover:text-white transition-all"
                                   aria-label="Anmelden um Lizenzmodell {{ $package->name }} zu buchen">
                                    Anmelden & Tarif wählen
                                </a>
                            @endauth
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-12 text-center bg-white rounded-[3rem] border-2 border-dashed border-slate-200">
                        <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <p class="text-slate-400 font-bold text-lg mb-2">Keine Lizenzmodelle verfügbar</p>
                        <p class="text-slate-500 text-sm">
                            Aktuell sind keine <strong>Tarife</strong> hinterlegt. Kontaktieren Sie <strong>{{ $brandName }}</strong> 
                            für vollständige <strong>Produktdetails</strong> und individuelle Angebote.
                        </p>
                    </div>
                @endforelse
            </div>

            {{-- Vergleichstabelle mit Keywords --}}
            @if($tool->packages->count() > 1)
            <section class="bg-white rounded-[3rem] p-10 md:p-16 shadow-sm border border-slate-100 mb-16">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-black text-gray-900 mb-4">
                        Funktionsumfang-Vergleich der Lizenzmodelle
                    </h3>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Vergleichen Sie den <strong>Funktionsumfang</strong> und die <strong>Tarife</strong> aller 
                        <strong>Lizenzmodelle</strong>. Die <strong>vollständigen Produktdetails</strong> helfen Ihnen 
                        bei der Auswahl der passenden <strong>{{ $uniqueKeywords['main_keyword'] }}</strong>.
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b-2 border-slate-200">
                                <th class="py-4 px-6 font-black text-gray-900">Funktionsumfang</th>
                                @foreach($tool->packages as $package)
                                    <th class="py-4 px-6 font-black text-gray-900 text-center">
                                        {{ $package->name }}<br>
                                        <span class="text-xs font-normal text-gray-500">Lizenzmodell</span>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-slate-100">
                                <td class="py-4 px-6 font-semibold text-gray-700">Vollständiger Datenzugriff</td>
                                @foreach($tool->packages as $package)
                                    <td class="py-4 px-6 text-center">
                                        <svg class="w-6 h-6 text-green-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="border-b border-slate-100 bg-slate-50">
                                <td class="py-4 px-6 font-semibold text-gray-700">Support-Level (Produktdetails)</td>
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
                                <td class="py-4 px-6 font-semibold text-gray-700">API-Zugriff (Funktionsumfang)</td>
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
                            <tr class="border-b border-slate-100 bg-slate-50">
                                <td class="py-4 px-6 font-semibold text-gray-700">Monatlicher Tarif (netto)</td>
                                @foreach($tool->packages as $package)
                                    <td class="py-4 px-6 text-center text-lg font-black text-gray-900">
                                        €{{ number_format($package->price, 2, ',', '.') }}
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-600">
                        Alle <strong>Tarife</strong> beinhalten vollständige <strong>Produktdetails</strong> 
                        und regelmäßige Updates. Der <strong>Funktionsumfang</strong> wird kontinuierlich erweitert.
                    </p>
                </div>
            </section>
            @endif

            {{-- Testimonials --}}
            <section class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h4 class="text-2xl font-black text-gray-900 mb-3">5.000+</h4>
                    <p class="text-gray-600 font-semibold">Aktive Nutzer</p>
                    <p class="text-sm text-gray-500 mt-2">
                        Vertrauen auf diese <strong>{{ $uniqueKeywords['main_keyword'] }}</strong>
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h4 class="text-2xl font-black text-gray-900 mb-3">99,9%</h4>
                    <p class="text-gray-600 font-semibold">Verfügbarkeit</p>
                    <p class="text-sm text-gray-500 mt-2">
                        Garantierte Uptime für alle <strong>Lizenzmodelle</strong>
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <h4 class="text-2xl font-black text-gray-900 mb-3">4.8/5</h4>
                    <p class="text-gray-600 font-semibold">Kundenbewertung</p>
                    <p class="text-sm text-gray-500 mt-2">
                        Durchschnittliche Zufriedenheit bei <strong>{{ $brandName }}</strong>
                    </p>
                </div>
            </section>

            {{-- Abschluss-CTA mit allen Keywords --}}
            <section class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[3rem] p-10 md:p-16 text-center text-white shadow-2xl">
                <h3 class="text-4xl font-black mb-6">
                    Jetzt {{ $tool->name }} testen – Vollständige Compliance-Lösung
                </h3>
                <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Überzeugen Sie sich von der Qualität dieser <strong>{{ $uniqueKeywords['main_keyword'] }}</strong> 
                    bei <strong>{{ $brandName }}</strong>. Wählen Sie ein <strong>Lizenzmodell</strong> mit transparenten 
                    <strong>Tarifen</strong>, <strong>vollständigen Produktdetails</strong> und umfassendem 
                    <strong>Funktionsumfang</strong>.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    @auth
                        @if($tool->packages->count() > 0)
                            <a href="#tarife" 
                               class="inline-flex items-center justify-center px-10 py-5 bg-white text-blue-600 rounded-2xl font-black text-lg hover:bg-blue-50 transition-all shadow-lg hover:shadow-xl">
                                Lizenzmodell & Tarife ansehen
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
                        🔒 <strong>{{ $brandName }}</strong> garantiert: Alle Daten werden ausschließlich in Deutschland 
                        gehostet. <strong>Vollständige</strong> DSGVO-Konformität in allen <strong>Lizenzmodellen</strong> – 
                        Details in unserer Datenschutzerklärung.
                    </p>
                </div>
            </section>

            {{-- Zusätzliche SEO-Informationen mit allen Keywords --}}
            <section class="mt-16 prose prose-slate max-w-none">
                <div class="bg-white rounded-2xl p-10 border border-slate-100">
                    <h3 class="text-2xl font-black text-gray-900 mb-6">
                        Weitere Produktdetails und Informationen zum Funktionsumfang
                    </h3>
                    
                    <div class="space-y-6 text-gray-600 leading-relaxed">
                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-3">
                                Warum diese Compliance-Lösung von Digital Packt wählen?
                            </h4>
                            <p>
                                In der heutigen komplexen Rechtslandschaft ist es für Unternehmen in Deutschland unerlässlich, 
                                stets über aktuelle Compliance-Anforderungen informiert zu sein. Diese 
                                <strong>{{ $uniqueKeywords['main_keyword'] }}</strong> von <strong>{{ $brandName }}</strong> 
                                bietet eine zentrale Anlaufstelle mit <strong>vollständigen Produktdetails</strong> und 
                                umfassendem <strong>Funktionsumfang</strong> für alle rechtlichen Begriffe und Definitionen, 
                                die im deutschen Wirtschaftsraum relevant sind.
                            </p>
                            <p class="mt-3">
                                Die Plattform wird kontinuierlich aktualisiert und alle <strong>Lizenzmodelle</strong> 
                                beinhalten regelmäßige Updates. Die <strong>Tarife</strong> sind transparent gestaltet 
                                und der <strong>Funktionsumfang</strong> wird ständig erweitert, um den neuesten gesetzlichen 
                                Entwicklungen gerecht zu werden.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-3">
                                Für wen eignet sich diese Compliance-Lösung?
                            </h4>
                            <p>
                                Die <strong>{{ $uniqueKeywords['main_keyword'] }}</strong> richtet sich primär an Compliance-Beauftragte, 
                                Rechtsabteilungen, Datenschutzbeauftragte, Wirtschaftsprüfer, Steuerberater und Unternehmensberater. 
                                Die <strong>vollständigen Produktdetails</strong> und der umfassende <strong>Funktionsumfang</strong> 
                                machen die Lösung auch für Geschäftsführer und Vorstände attraktiv, die einen schnellen Überblick 
                                über relevante Compliance-Themen benötigen.
                            </p>
                            <p class="mt-3">
                                Kleine und mittlere Unternehmen (KMU) finden bei <strong>{{ $brandName }}</strong> flexible 
                                <strong>Lizenzmodelle</strong> zu fairen <strong>Tarifen</strong>. Der <strong>Funktionsumfang</strong> 
                                ist so gestaltet, dass auch Nicht-Juristen die wichtigsten Compliance-Begriffe verstehen können. 
                                Alle <strong>Produktdetails</strong> sind übersichtlich aufbereitet.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-3">
                                Technische Integration und vollständiger Funktionsumfang
                            </h4>
                            <p>
                                Die <strong>{{ $uniqueKeywords['main_keyword'] }}</strong> lässt sich nahtlos in bestehende 
                                Unternehmens-Systeme integrieren. Über eine REST-API (ab Professional-<strong>Lizenzmodell</strong> – 
                                siehe <strong>Tarife</strong> oben) können Inhalte in interne Wissensdatenbanken, Intranets oder 
                                Compliance-Management-Systeme eingebunden werden. Die <strong>vollständigen Produktdetails</strong> 
                                zur API-Nutzung finden Sie in unserer Entwickler-Dokumentation.
                            </p>
                            <p class="mt-3">
                                Der <strong>Funktionsumfang</strong> umfasst gängige Authentifizierungsverfahren wie OAuth 2.0 
                                und SAML, wodurch eine sichere Single-Sign-On-Integration möglich ist. <strong>{{ $brandName }}</strong> 
                                stellt sicher, dass alle <strong>Lizenzmodelle</strong> mit den gängigsten Systemen kompatibel sind.
                            </p>
                        </div>

                                                <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-3">
                                Aktualität und Qualitätssicherung der Compliance-Lösung
                            </h4>
                            <p>
                                Ein Team aus Fachjuristen und Compliance-Experten bei <strong>{{ $brandName }}</strong> 
                                überwacht kontinuierlich die Rechtsprechung und gesetzgeberische Aktivitäten in Deutschland. 
                                Änderungen werden zeitnah in die Plattform eingepflegt – ohne zusätzliche Kosten in allen 
                                <strong>Tarifen</strong>. Die <strong>vollständigen Produktdetails</strong> zu jedem Update 
                                werden den Nutzern über automatische Benachrichtigungen mitgeteilt.
                            </p>
                            <p class="mt-3">
                                Jeder Eintrag wird vor Veröffentlichung von mindestens zwei unabhängigen Experten geprüft, 
                                um höchste Qualitätsstandards zu gewährleisten. Der <strong>Funktionsumfang</strong> wird 
                                ständig erweitert und alle <strong>Lizenzmodelle</strong> profitieren automatisch von neuen 
                                Features – bereits in den bestehenden <strong>Tarifen</strong> inkludiert.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-3">
                                Datenschutz und Sicherheit bei Digital Packt
                            </h4>
                            <p>
                                Sämtliche Daten werden ausschließlich auf ISO-27001-zertifizierten Servern in Deutschland gespeichert. 
                                Die Übertragung erfolgt durchgängig verschlüsselt über TLS 1.3. Regelmäßige Penetrationstests durch 
                                externe Sicherheitsexperten sowie ein Bug-Bounty-Programm gewährleisten ein Höchstmaß an Sicherheit. 
                                Die <strong>vollständigen Produktdetails</strong> zur Datenverarbeitung finden Sie in unserer 
                                Datenschutzerklärung.
                            </p>
                            <p class="mt-3">
                                <strong>{{ $brandName }}</strong> garantiert <strong>vollständige</strong> DSGVO-Konformität 
                                in allen <strong>Lizenzmodellen</strong> – ohne Aufpreis in den <strong>Tarifen</strong> enthalten. 
                                Der <strong>Funktionsumfang</strong> umfasst auch umfassende Audit-Logs und Exportfunktionen 
                                für Compliance-Nachweise.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-3">
                                Transparente Tarife und flexible Lizenzmodelle
                            </h4>
                            <p>
                                Alle auf dieser Seite angegebenen <strong>Tarife</strong> sind Endpreise zzgl. der gesetzlichen 
                                Mehrwertsteuer. Es gibt keine versteckten Gebühren, Setup-Kosten oder Bindungsfristen. 
                                Die <strong>Lizenzmodelle</strong> können jederzeit zum Monatsende gewechselt oder gekündigt werden. 
                                Der <strong>Funktionsumfang</strong> jedes Modells ist in den <strong>Produktdetails</strong> 
                                genau beschrieben.
                            </p>
                            <p class="mt-3">
                                Bei <strong>{{ $brandName }}</strong> setzen wir auf maximale Transparenz. Alle <strong>Produktdetails</strong> 
                                zu den <strong>Tarifen</strong>, dem <strong>Funktionsumfang</strong> und den <strong>Lizenzmodellen</strong> 
                                finden Sie in unseren allgemeinen Geschäftsbedingungen. Für individuelle Anforderungen erstellen wir 
                                gerne ein maßgeschneidertes Angebot mit <strong>vollständigen Produktdetails</strong>.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-3">
                                Vollständiger Support und Service-Level
                            </h4>
                            <p>
                                Je nach gewähltem <strong>Lizenzmodell</strong> erhalten Sie unterschiedliche Support-Level. 
                                Die <strong>Produktdetails</strong> zu den Support-Optionen variieren zwischen Community-Support 
                                (kostenlose <strong>Tarife</strong>), Standard-Support (Professional-<strong>Lizenzmodelle</strong>) 
                                und Priority-Support (Enterprise-<strong>Tarife</strong>).
                            </p>
                            <p class="mt-3">
                                Der <strong>Funktionsumfang</strong> des Supports umfasst technische Hilfestellung, Beratung zur 
                                Interpretation rechtlicher Begriffe und Unterstützung bei der Integration. <strong>{{ $brandName }}</strong> 
                                garantiert schnelle Reaktionszeiten und <strong>vollständige</strong> Dokumentation aller Support-Anfragen.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-3">
                                Funktionsumfang und Erweiterungen der Compliance-Lösung
                            </h4>
                            <p>
                                Der <strong>Funktionsumfang</strong> von {{ $tool->name }} wird kontinuierlich erweitert. 
                                Alle registrierten Nutzer erhalten automatisch Zugriff auf neue Features – ohne Aufpreis in den 
                                bestehenden <strong>Tarifen</strong>. Die <strong>vollständigen Produktdetails</strong> zu 
                                geplanten Erweiterungen finden Sie in unserer öffentlichen Roadmap.
                            </p>
                            <p class="mt-3">
                                Kommende Erweiterungen des <strong>Funktionsumfangs</strong> umfassen: erweiterte KI-gestützte 
                                Suchfunktionen, verbesserte Exportoptionen, zusätzliche Sprachen und branchenspezifische Module. 
                                Alle <strong>Lizenzmodelle</strong> profitieren von diesen Updates – die <strong>Tarife</strong> 
                                bleiben dabei stabil.
                            </p>
                        </div>

                        <div class="bg-blue-50 rounded-xl p-6 border border-blue-100">
                            <h4 class="text-lg font-bold text-gray-800 mb-3">Wichtige rechtliche Hinweise</h4>
                            <p class="text-sm">
                                Die auf dieser <strong>{{ $uniqueKeywords['main_keyword'] }}</strong> von 
                                <strong>{{ $brandName }}</strong> bereitgestellten Informationen und <strong>Produktdetails</strong> 
                                dienen ausschließlich zu allgemeinen Informationszwecken und stellen keine Rechtsberatung dar. 
                                Für individuelle rechtliche Fragestellungen empfehlen wir die Konsultation eines qualifizierten Rechtsanwalts. 
                                Alle Angaben zu <strong>Tarifen</strong>, <strong>Lizenzmodellen</strong> und <strong>Funktionsumfang</strong> 
                                erfolgen nach bestem Wissen und Gewissen, jedoch ohne Gewähr für <strong>Vollständigkeit</strong>, 
                                Richtigkeit und Aktualität.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</x-app-layout>

