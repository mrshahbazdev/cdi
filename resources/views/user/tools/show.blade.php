@php
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| SEO-Optimierung & Variablen-Definition
|--------------------------------------------------------------------------
*/
$currentPage = request()->get('page');
$pageSuffix = ($currentPage && $currentPage > 1) ? " (S.$currentPage)" : "";

// 1. Titel generieren (für @yield('title') im Layout)
$seoTitle = Str::limit($tool->name, 25) . " – Tool" . $pageSuffix;

// 2. Beschreibung generieren (für @yield('meta_description') im Layout)
$rawDescription = $tool->description ?? 'Professionelles SaaS Tool für Entwickler.';
$seoDescription = Str::limit(strip_tags($rawDescription), 145) . $pageSuffix;

// 3. Schema.org JSON generieren (Behebt den "Undefined variable $schemaJson" Fehler)
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

{{-- ✅ Diese Sections füllen die Lücken in deinem Layout --}}
@section('title', $seoTitle)
@section('meta_description', $seoDescription)

<x-app-layout>
    {{-- ✅ Pusht zusätzliche Meta-Tags in den Head --}}
    @push('meta')
        <link rel="canonical" href="{{ url()->current() }}">
        <script type="application/ld+json">{!! $schemaJson !!}</script>
        
        {{-- Social Media Description --}}
        <meta property="og:title" content="{{ $seoTitle }}">
        <meta property="og:description" content="{{ $seoDescription }}">
        <meta property="og:url" content="{{ url()->current() }}">
    @endpush

    {{-- SEO H1 --}}
    <h1 class="sr-only">{{ $tool->name }} Spezifikationen {{ $pageSuffix }}</h1>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('tools.index') }}" class="group flex items-center justify-center w-12 h-12 bg-white border border-blue-100 rounded-2xl shadow-sm hover:bg-blue-600 hover:text-white transition-all duration-300">
                    <svg class="w-6 h-6 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div>
                    <h2 class="font-extrabold text-2xl text-gray-900 tracking-tight leading-none">{{ $tool->name }}</h2>
                    <p class="text-[10px] font-black text-blue-600 uppercase tracking-[0.2em] mt-1.5">Spezifikationen & Lizenzierung</p>
                </div>
            </div>
            
            @if($hasActiveSubscription)
                <div class="flex items-center px-5 py-2.5 bg-green-50 border border-green-100 rounded-2xl shadow-sm">
                    <span class="flex h-2.5 w-2.5 rounded-full bg-green-500 mr-3 animate-pulse"></span>
                    <span class="text-xs font-black text-green-700 uppercase tracking-widest">Aktive Lizenz</span>
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-16 bg-slate-50/50 relative min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            {{-- Tool Card --}}
            <div class="bg-white rounded-[3rem] shadow-sm p-10 md:p-16 border border-white mb-16">
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
                        <h2 class="text-5xl font-black text-gray-900 mb-6">{{ $tool->name }}</h2>
                        <p class="text-xl text-gray-500 font-medium mb-10 max-w-4xl">
                            {{ $tool->description ?? 'Professionelle Utility.' }}
                        </p>
                        <span class="font-mono bg-slate-100 px-4 py-2 rounded-xl text-sm font-bold">{{ $tool->domain }}</span>
                    </div>
                </div>
            </div>

            {{-- Lizenz-Pakete --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($tool->packages as $package)
                    <div class="bg-white rounded-[3rem] p-12 border-2 border-transparent hover:border-blue-100 transition-all flex flex-col">
                        <h3 class="text-3xl font-black text-gray-900 mb-2">{{ $package->name }}</h3>
                        <div class="text-5xl font-black text-gray-900 mb-10">€{{ number_format($package->price, 2) }}</div>
                        
                        @if($package->features)
                            <ul class="space-y-4 mb-10">
                                @foreach($package->features as $feature)
                                    <li class="flex items-center text-slate-600 font-bold text-sm">
                                        <svg class="h-4 w-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg>
                                        {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="mt-auto">
                            @auth
                                <a href="{{ route('user.subscriptions.checkout', $package) }}" class="flex items-center justify-center w-full py-5 bg-gray-900 text-white rounded-[1.5rem] font-black hover:bg-blue-600 transition-all">Freischalten</a>
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