@php
use Illuminate\Support\Str;

$currentPage = request()->get('page');
$pageSuffix = ($currentPage && $currentPage > 1) ? " (S.$currentPage)" : "";

// Titel für @yield('title')
$seoTitle = Str::limit($tool->name, 25) . " – Tool" . $pageSuffix;

// Beschreibung für @yield('meta_description')
$rawDescription = $tool->description ?? 'Professionelles SaaS Tool für Entwickler.';
$seoDescription = Str::limit(strip_tags($rawDescription), 145) . $pageSuffix;
@endphp

{{-- ✅ Füllt den Titel im Layout --}}
@section('title', $seoTitle)

{{-- ✅ Füllt die Description im Layout (behebt dein Problem!) --}}
@section('meta_description', $seoDescription)

<x-app-layout>
    {{-- ✅ Canonical & Schema bleiben im Stack --}}
    @push('meta')
        <link rel="canonical" href="{{ url()->current() }}">
        <script type="application/ld+json">{!! $schemaJson !!}</script>
        
        {{-- Social Media Description --}}
        <meta property="og:description" content="{{ $seoDescription }}">
    @endpush

    {{-- Rest deines Contents... --}}
    <h1 class="sr-only">{{ $tool->name }} Spezifikationen {{ $pageSuffix }}</h1>
    ...
</x-app-layout>