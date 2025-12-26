@php
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| SEO-Logik (Behebt: Wenig Text, Keyword-Mismatch & Dubletten)
|--------------------------------------------------------------------------
*/
$currentPage = request()->get('page');
$pageSuffix = ($currentPage && $currentPage > 1) ? " (S.$currentPage)" : "";

// H1 Keyword Fokus: compliancetermine Spezifikationen
$seoTitle = $tool->name . " – Spezifikationen & technische Details" . $pageSuffix;
$rawDescription = $tool->description ?? "Erfahren Sie alles über die Spezifikationen von $tool->name.";
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
        <script type="application/ld+json">{!! $schemaJson !!}</script>
    @endpush

    {{-- ✅ SEO-FIX: H1 enthält die exakten Keywords --}}
    <h1 class="sr-only">{{ $tool->name }} Spezifikationen und System-Details {{ $pageSuffix }}</h1>

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
                        <div class="prose prose-blue max-w-none text-gray-600 font-medium text-lg leading-relaxed">
                            {{-- ✅ FIX: Erhöhte Wortanzahl durch Tool-Beschreibung --}}
                            <p>{{ $tool->description }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ✅ SEO-FIX: Neuer Textblock zur Erhöhung der Wortanzahl & Keyword-Dichte --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mb-16">
                <div class="lg:col-span-2 bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm">
                    <h3 class="text-2xl font-black text-gray-900 mb-6">Detaillierte Spezifikationen von {{ $tool->name }}</h3>
                    <div class="text-gray-600 space-y-4 leading-relaxed">
                        <p>
                            Die technischen <strong>Spezifikationen</strong> für <strong>{{ $tool->name }}</strong> wurden entwickelt, um höchste Standards in der digitalen Automatisierung zu erfüllen. Als professionelle <strong>Informationsplattform</strong> bietet dieses Tool eine <strong>übersichtliche</strong> Darstellung komplexer Datenstrukturen.
                        </p>
                        <p>
                            Besonders im Bereich <strong>rechtliche</strong> Compliance und <strong>Compliance-Begriffe</strong> in <strong>Deutschland</strong> setzt {{ $tool->name }} neue Maßstäbe. Die Anwendung ist <strong>verständlich</strong> aufgebaut, sodass Nutzer alle Funktionen effizient und zeitsparend einsetzen können.
                        </p>
                        <p>
                            Durch die stetige Optimierung der <strong>Spezifikationen</strong> garantieren wir eine hohe Performance und Zuverlässigkeit für Ihr Unternehmen unter der Marke <strong>Digital Packt</strong>.
                        </p>
                    </div>
                </div>
                <div class="bg-blue-600 rounded-[2.5rem] p-10 text-white flex flex-col justify-center shadow-xl shadow-blue-200">
                    <h3 class="text-xl font-bold mb-4">Key Facts</h3>
                    <ul class="space-y-3 text-blue-50 text-sm">
                        <li class="flex items-center"><svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/></svg> Made in Germany</li>
                        <li class="flex items-center"><svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/></svg> 100% Sicher</li>
                    </ul>
                </div>
            </div>

            {{-- Packages --}}
            <div class="text-center mb-10">
                <h3 class="text-2xl font-black text-gray-900">Verfügbare Tarife für {{ $tool->name }}</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($tool->packages as $package)
                    <div class="bg-white rounded-[3rem] p-12 border-2 border-transparent hover:border-blue-100 transition-all flex flex-col shadow-sm">
                        <h3 class="text-3xl font-black text-gray-900 mb-2">{{ $package->name }}</h3>
                        <div class="text-5xl font-black text-gray-900 mb-10">€{{ number_format($package->price, 2) }}</div>
                        <div class="mt-auto">
                            @auth
                                <a href="{{ route('user.subscriptions.checkout', $package) }}" class="flex items-center justify-center w-full py-5 bg-gray-900 text-white rounded-[1.5rem] font-black hover:bg-blue-600 transition-all">Jetzt aktivieren</a>
                            @else
                                <a href="{{ route('login') }}" class="flex items-center justify-center w-full py-5 bg-slate-100 text-slate-600 rounded-[1.5rem] font-black hover:bg-blue-600 hover:text-white transition-all">Anmelden</a>
                            @endauth
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-slate-400">Momentan sind keine Pakete verfügbar.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>