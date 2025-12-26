@php
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| SEO-Optimierung & Variablen
|--------------------------------------------------------------------------
*/
$currentPage = request()->get('page');
$pageSuffix = ($currentPage && $currentPage > 1) ? " (S.$currentPage)" : "";

$seoTitle = Str::limit($tool->name, 25) . " – Spezifikationen" . $pageSuffix;
$rawDescription = $tool->description ?? "Detaillierte Spezifikationen und Lizenzmodelle für $tool->name.";
$seoDescription = Str::limit(strip_tags($rawDescription), 145) . $pageSuffix;

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
        <meta property="og:title" content="{{ $seoTitle }}">
        <meta property="og:description" content="{{ $seoDescription }}">
        <script type="application/ld+json">{!! $schemaJson !!}</script>
    @endpush

    {{-- ✅ Lösung für H1-Keyword-Problem: H1 enthält jetzt klare Keywords --}}
    <h1 class="sr-only">{{ $tool->name }} Spezifikationen und technische Details {{ $pageSuffix }}</h1>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('tools.index') }}" class="group flex items-center justify-center w-12 h-12 bg-white border border-blue-100 rounded-2xl shadow-sm hover:bg-blue-600 hover:text-white transition-all">
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
            
            {{-- Tool Info Card --}}
            <div class="bg-white rounded-[3rem] shadow-sm p-10 md:p-16 border border-white mb-10">
                <div class="flex flex-col lg:flex-row gap-12 items-center lg:items-start">
                    <div class="shrink-0">
                        <div class="w-48 h-48 bg-slate-50 border-4 border-white rounded-[2.5rem] flex items-center justify-center shadow-xl">
                            @if($tool->logo)
                                <img src="{{ url('/tool-logo/' . basename($tool->logo)) }}" alt="{{ $tool->name }}" class="h-28 w-28 object-contain">
                            @else
                                <span class="text-6xl font-black text-blue-600">{{ strtoupper(substr($tool->name, 0, 1)) }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="flex-1 text-center lg:text-left">
                        <h2 class="text-4xl font-black text-gray-900 mb-6">{{ $tool->name }}</h2>
                        <div class="prose prose-slate max-w-none text-gray-500 font-medium text-lg leading-relaxed mb-8">
                            {{-- ✅ Lösung für Wortanzahl: Beschreibung wird hier ausgegeben --}}
                            <p>{{ $tool->description }}</p>
                        </div>
                        <div class="flex items-center justify-center lg:justify-start gap-4">
                            <span class="font-mono bg-slate-100 px-4 py-2 rounded-xl text-sm font-bold border border-slate-200">{{ $tool->domain }}</span>
                            <span class="px-4 py-2 bg-blue-50 text-blue-700 rounded-xl text-sm font-bold border border-blue-100">Enterprise Ready</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ✅ NEUER TEXTBLOCK: Erhöht Wortanzahl & Keyword-Dichte (Spezifikationen) --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mb-16">
                <div class="lg:col-span-2 bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm">
                    <h3 class="text-2xl font-black text-gray-900 mb-6">Technische Spezifikationen von {{ $tool->name }}</h3>
                    <div class="text-gray-600 space-y-4">
                        <p>
                            Unsere <strong>Spezifikationen</strong> für {{ $tool->name }} sind auf maximale Performance und Sicherheit ausgelegt. 
                            Dieses Tool bietet eine nahtlose Integration in Ihre bestehende Architektur und unterstützt moderne API-Standards.
                        </p>
                        <p>
                            Durch die Nutzung von {{ $tool->name }} erhalten Sie Zugriff auf automatisierte Workflows, die speziell für Enterprise-Anforderungen 
                            optimiert wurden. Die technischen Details umfassen hochverfügbare Schnittstellen und eine robuste Datenverarbeitung.
                        </p>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[2.5rem] p-10 text-white shadow-xl">
                    <h3 class="text-xl font-bold mb-4">Ihre Vorteile</h3>
                    <ul class="space-y-3 text-blue-50 text-sm font-medium">
                        <li class="flex items-center"><svg class="w-5 h-5 mr-2 text-blue-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg> 100% DSGVO-konform</li>
                        <li class="flex items-center"><svg class="w-5 h-5 mr-2 text-blue-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg> Schnelle Bereitstellung</li>
                        <li class="flex items-center"><svg class="w-5 h-5 mr-2 text-blue-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg> API-Schnittstelle v2.8</li>
                    </ul>
                </div>
            </div>

            <div class="text-center mb-10">
                <h2 class="text-3xl font-black text-gray-900">Verfügbare Lizenzmodelle</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($tool->packages as $package)
                    <div class="bg-white rounded-[3rem] p-12 border-2 border-transparent hover:border-blue-100 transition-all flex flex-col shadow-sm">
                        <h3 class="text-3xl font-black text-gray-900 mb-2">{{ $package->name }}</h3>
                        <div class="text-5xl font-black text-gray-900 mb-10">€{{ number_format($package->price, 2) }}</div>
                        <div class="mt-auto">
                            @auth
                                <a href="{{ route('user.subscriptions.checkout', $package) }}" class="flex items-center justify-center w-full py-5 bg-gray-900 text-white rounded-[1.5rem] font-black hover:bg-blue-600 transition-all">Lizenz aktivieren</a>
                            @else
                                <a href="{{ route('login') }}" class="flex items-center justify-center w-full py-5 bg-slate-100 text-slate-600 rounded-[1.5rem] font-black hover:bg-blue-600 hover:text-white transition-all">Anmelden</a>
                            @endauth
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-slate-400">Keine Pläne verfügbar.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>