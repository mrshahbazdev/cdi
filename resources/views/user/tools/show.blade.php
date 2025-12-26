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
// Ergebnis: "Toolname – Details (S.2) | Digital Packt"
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
    <h1 class="sr-only">{{ $tool->name }} Spezifikationen {{ $pageSuffix }}</h1>

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
                                <img src="{{ url('/tool-logo/' . basename($tool->logo)) }}" alt="{{ $tool->name }}" class="h-28 w-28 object-contain">
                            @else
                                <span class="text-6xl font-black text-blue-600">{{ strtoupper(substr($tool->name, 0, 1)) }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="flex-1 text-center lg:text-left">
                        <h2 class="text-4xl font-black text-gray-900 mb-6">{{ $tool->name }}</h2>
                        <div class="text-gray-600 font-medium text-lg leading-relaxed">
                            {{-- ✅ FIX: Keine unnötigen Strong-Tags im Haupttext --}}
                            {{ $tool->description }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Textblock für SEO Relevanz --}}
            <div class="bg-white rounded-[2.5rem] p-10 border border-slate-100 mb-16 shadow-sm">
                <h3 class="text-2xl font-black text-gray-900 mb-6">Technische Details</h3>
                <div class="text-gray-600 leading-relaxed space-y-4">
                    {{-- ✅ FIX: Nur wichtige Begriffe einmalig fett markieren --}}
                    <p>
                        Die <strong>Spezifikationen</strong> für {{ $tool->name }} wurden optimiert, um eine effiziente Nutzung als Informationsplattform zu ermöglichen. 
                        In Deutschland entwickelte Standards garantieren eine verständliche Aufbereitung rechtlicher Compliance-Begriffe.
                    </p>
                </div>
            </div>

            {{-- Pakete --}}
            <div class="text-center mb-10">
    <h3 class="text-2xl font-black text-gray-900">Verfügbare Tarife für {{ $tool->name }}</h3>
</div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse($tool->packages as $package)
            <div class="group bg-white rounded-[3rem] p-10 border-2 border-transparent hover:border-blue-100 transition-all duration-500 flex flex-col shadow-sm hover:shadow-xl relative overflow-hidden">
                
                {{-- Badge für Laufzeit --}}
                <div class="mb-6">
                    <span class="bg-blue-50 text-blue-600 text-[10px] font-black uppercase tracking-widest px-4 py-1.5 rounded-lg border border-blue-100">
                        {{ $package->duration_value }} {{ $package->duration_type }}
                    </span>
                </div>

                <h3 class="text-2xl font-black text-gray-900 mb-2">{{ $package->name }}</h3>
                <div class="text-4xl font-black text-gray-900 mb-8">€{{ number_format($package->price, 2) }}</div>
                
                {{-- ✅ HIER WERDEN DIE DETAILS ANGEZEIGT --}}
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
                            {{-- Fallback, falls keine Features in der DB stehen --}}
                            <li class="text-slate-400 text-sm italic">Standard-Zugriff auf {{ $tool->name }}</li>
                        @endif
                    </ul>
                </div>

                <div class="mt-auto">
                    @auth
                        <a href="{{ route('user.subscriptions.checkout', $package) }}" 
                        class="flex items-center justify-center w-full py-5 bg-gray-900 text-white rounded-[1.5rem] font-black hover:bg-blue-600 hover:-translate-y-1 transition-all shadow-lg shadow-gray-200">
                            Jetzt aktivieren
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                        class="flex items-center justify-center w-full py-5 bg-slate-50 text-slate-600 rounded-[1.5rem] font-black hover:bg-blue-600 hover:text-white transition-all">
                            Anmelden & Buchen
                        </a>
                    @endauth
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center bg-white rounded-[3rem] border-2 border-dashed border-slate-200">
                <p class="text-slate-400 font-bold">Aktuell sind keine speziellen Tarife für dieses Tool hinterlegt.</p>
            </div>
        @endforelse
    </div>

    </div>
        </div>
    </div>
</x-app-layout>