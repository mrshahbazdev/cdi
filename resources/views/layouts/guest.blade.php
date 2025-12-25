<!DOCTYPE html>
<html lang="de" class="h-full">
    <head>
        @php
            $settings = \App\Models\Setting::first();
        @endphp

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Dynamic title: view can use @section('title', 'Page Title') or pass $title variable --}}
        <title>
            @hasSection('title')
                @yield('title') - {{ config('app.name', 'CIP Tools') }}
            @else
                {{ $title ?? config('app.name', 'CIP Tools') }}
            @endif
        </title>

        <!-- SEO & Social -->
        <meta name="description" content="{{ $metaDescription ?? $settings->site_description ?? 'CIP Tools — Practical developer utilities.' }}">
        <link rel="canonical" href="{{ $canonical ?? url()->current() }}">
        <meta name="robots" content="index, follow">

        <!-- Open Graph -->
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ strip_tags(View::getSections()['title'] ?? ($title ?? config('app.name'))) }}">
        <meta property="og:description" content="{{ $metaDescription ?? $settings->site_description ?? '' }}">
        <meta property="og:url" content="{{ url()->current() }}">
        @if($settings?->site_logo)
            <meta property="og:image" content="{{ Storage::url($settings->site_logo) }}">
        @endif

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ strip_tags(View::getSections()['title'] ?? ($title ?? config('app.name'))) }}">
        <meta name="twitter:description" content="{{ $metaDescription ?? $settings->site_description ?? '' }}">

        <!-- Fonts: Inter -->
        <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Assets -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles

        <style>
            body { font-family: 'Inter', sans-serif; }

            @keyframes blob { 0%,100% { transform: translate(0,0) scale(1); } 33% { transform: translate(30px,-50px) scale(1.1); } 66% { transform: translate(-20px,20px) scale(0.9); } }
            .animate-blob { animation: blob 7s infinite; }
            .animation-delay-2000 { animation-delay: 2s; }

            ::-webkit-scrollbar { width: 8px; }
            ::-webkit-scrollbar-track { background: #f8fafc; }
            ::-webkit-scrollbar-thumb { background: linear-gradient(to bottom, #2563eb, #4f46e5); border-radius: 10px; }

            .page-enter { animation: fadeIn 0.5s ease-out forwards; }
            @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        </style>
    </head>
    <body class="antialiased h-full bg-gradient-to-br from-blue-50 via-white to-indigo-50 text-gray-900 selection:bg-blue-100 selection:text-blue-700">
        
        <div class="min-h-screen flex flex-col relative overflow-hidden">
            <!-- Global Background Elements (Blobs) -->
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-96 h-96 bg-indigo-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000 pointer-events-none"></div>

            <!-- Content Container -->
            <div class="font-sans relative z-10 flex-1 flex flex-col page-enter">
                {{ $slot }}
            </div>

            <!-- Bottom Brand Accent -->
            <div class="h-1 w-full bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 pointer-events-none"></div>
        </div>

        @livewireScripts
    </body>
</html>