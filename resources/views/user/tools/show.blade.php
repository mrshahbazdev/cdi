@php
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Dynamische SEO-Variablen
|--------------------------------------------------------------------------
*/
$currentPage = request()->get('page');
$pageSuffix = ($currentPage && $currentPage > 1) ? " – Seite $currentPage" : "";

$seoTitle = $tool->name . " – Professionelles Entwickler-Tool" . $pageSuffix;
$seoDescription = Str::limit(strip_tags($tool->description ?? 'Nutzen Sie diese Hochleistungs-Utility mit automatisierter Bereitstellung.'), 150) . $pageSuffix;

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

{{-- ✅ WICHTIG: Das hier füllt @yield('title') in deinem Layout --}}
@section('title', $seoTitle)

<x-app-layout :metaDescription="$seoDescription">

    @push('meta')
        {{-- Erzwingt die Meta-Description, falls der Slot im Layout nicht greift --}}
        <meta name="description" content="{{ $seoDescription }}">
        <link rel="canonical" href="{{ url()->current() }}">
        
        <script type="application/ld+json">
        {!! $schemaJson !!}
        </script>
    @endpush

    {{-- Rest deines Contents (H1, Header Slot, Cards etc.) --}}
    <x-slot name="header">
        {{-- ... dein Header Code ... --}}
    </x-slot>

    <div class="py-16 bg-slate-50/50 relative overflow-hidden min-h-screen">
        {{-- ... dein restlicher Body Code ... --}}
    </div>
</x-app-layout>