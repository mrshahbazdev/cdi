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
$seoTitle = Str::limit($tool->name, 20) . " – Details" . $pageSuffix;

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
    <h1 class="sr-only">{{ $tool->name }} Spezifikationen, Preise und Details {{ $pageSuffix }}</h1>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('tools.index') }}" class="group flex items-center justify-center w-12 h-12 bg-white border border-blue-100 rounded-2xl shadow-sm hover:bg-blue-600 hover:text-white transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
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
            <div class="bg-white rounded-[3rem] shadow-sm p-10 md:p-16 border border-white mb-10">
                <div class="flex flex-col lg:flex-row gap-12 items-center lg:items-start">
                    <div class="shrink-0">
                        <div class="w-48 h-48 bg-slate-50 border-4 border-white rounded-[2.5rem] flex items-center justify-center shadow-xl">
                            @if($tool->logo)
                                <img src="{{ url('/tool-logo/' . basename($tool->logo)) }}" alt="{{ $tool->name }} Logo" class="h-28 w-28 object-contain">
                            @else
                                <span class="text-6xl font-black text-blue-600">{{ strtoupper(substr($tool->name, 0, 1)) }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="flex-1 text-center lg:text-left">
                        <h2 class="text-4xl font-black text-gray-900 mb-6">{{ $tool->name }}</h2>
                        <div class="text-gray-600 font-medium text-lg leading-relaxed">
                            {{ $tool->description }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Ergänzter Textblock für SEO Relevanz --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-16">
                <div class="bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm">
                    <h3 class="text-2xl font-black text-gray-900 mb-6">Detaillierte Analyse & Spezifikationen</h3>
                    <div class="text-gray-600 leading-relaxed space-y-4">
                        <p>
                            Die Nutzung von <strong>{{ $tool->name }}</strong> bietet Unternehmen, Experten und Fachanwendern eine professionelle und strukturierte Grundlage für die Optimierung interner Prozesse. Durch die präzise Bereitstellung technischer Details, Systemanforderungen und spezifischer Lizenzmodelle ermöglicht diese Übersicht eine fundierte und sichere Entscheidungshilfe für Ihre digitale Infrastruktur.
                        </p>
                        <p>
                            Besonders im Bereich der <strong>Compliance, Rechtssicherheit und Datenschutz-Standards</strong> setzt {{ $tool->name }} neue Maßstäbe. Die hier aufgeführten Tarife und Leistungspakete sind exakt darauf ausgelegt, sowohl für spezialisierte Einzelprojekte als auch für großflächig skalierende Unternehmen in Deutschland eine maximale Transparenz und Planungssicherheit zu gewährleisten.
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm">
                    <h3 class="text-2xl font-black text-gray-900 mb-6">Häufige Fragen zu {{ $tool->name }}</h3>
                    <div class="space-y-4">
                        <details class="group border-b border-slate-100 pb-4">
                            <summary class="list-none font-bold text-gray-800 cursor-pointer flex justify-between items-center">
                                Was ist der primäre Vorteil von {{ $tool->name }} für Profis?
                                <span class="text-blue-600 group-open:rotate-180 transition-transform">+</span>
                            </summary>
                            <p class="text-gray-600 text-sm mt-2 leading-relaxed">
                                {{ $tool->name }} bietet eine hochspezialisierte Lösung zur effizienten Aufbereitung komplexer Datensätze und rechtlicher Compliance-Begriffe. Die Plattform ist explizit für den deutschen Markt optimiert und garantiert eine verständliche Darstellung aller relevanten regulatorischen Anforderungen.
                            </p>
                        </details>
                        <details class="group">
                            <summary class="list-none font-bold text-gray-800 cursor-pointer flex justify-between items-center">
                                Sind die Preismodelle für {{ $tool->name }} inklusive technischem Support?
                                <span class="text-blue-600 group-open:rotate-180 transition-transform">+</span>
                            </summary>
                            <p class="text-gray-600 text-sm mt-2 leading-relaxed">
                                Ja, absolute Sicherheit steht an erster Stelle. Je nach gewähltem Lizenzmodell (siehe Preisübersicht unten) ist entweder ein zuverlässiger Standard-Support oder ein dedizierter Priority-Support enthalten, um eine reibungslose und unterbrechungsfreie Anwendung in Ihrem Betrieb zu garantieren.
                            </p>
                        </details>
                    </div>
                </div>
            </div>

            {{-- Pakete --}}
            <div class="text-center mb-10">
                <h3 class="text-3xl font-black text-gray-900">Verfügbare Tarife & Pakete</h3>
                <p class="text-gray-500 mt-2 font-medium">Wählen Sie die passende Lizenzierung für {{ $tool->name }} basierend auf Ihren individuellen Anforderungen.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($tool->packages as $package)
                    <div class="group bg-white rounded-[3rem] p-10 border-2 border-transparent hover:border-blue-100 transition-all duration-500 flex flex-col shadow-sm hover:shadow-xl relative overflow-hidden">
                        
                        <div class="mb-6">
                            <span class="bg-blue-50 text-blue-600 text-[10px] font-black uppercase tracking-widest px-4 py-1.5 rounded-lg border border-blue-100">
                                {{ $package->duration_value }} {{ $package->duration_type }} Laufzeit-Paket
                            </span>
                        </div>

                        <h3 class="text-2xl font-black text-gray-900 mb-2">{{ $package->name }}</h3>
                        <div class="text-4xl font-black text-gray-900 mb-8">€{{ number_format($package->price, 2) }}</div>
                        
                        <div class="flex-1">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Inbegriffene Leistungen im Detail:</p>
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
                                    <li class="text-slate-400 text-sm italic">Vollständiger Standard-Zugriff auf alle Funktionen von {{ $tool->name }}</li>
                                @endif
                            </ul>
                        </div>

                        <div class="mt-auto">
                            @auth
                                <a href="{{ route('user.subscriptions.checkout', $package) }}" 
                                class="flex items-center justify-center w-full py-5 bg-gray-900 text-white rounded-[1.5rem] font-black hover:bg-blue-600 hover:-translate-y-1 transition-all shadow-lg shadow-gray-200">
                                    Jetzt Tarif aktivieren
                                </a>
                            @else
                                <a href="{{ route('login') }}" 
                                class="flex items-center justify-center w-full py-5 bg-slate-50 text-slate-600 rounded-[1.5rem] font-black hover:bg-blue-600 hover:text-white transition-all">
                                    Anmelden & Tarif buchen
                                </a>
                            @endauth
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center bg-white rounded-[3rem] border-2 border-dashed border-slate-200">
                        <p class="text-slate-400 font-bold">Aktuell sind keine speziellen Tarife für die Anwendung {{ $tool->name }} in unserer Datenbank hinterlegt.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>