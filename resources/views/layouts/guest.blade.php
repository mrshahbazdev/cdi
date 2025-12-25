<!DOCTYPE html>
<html lang="de" class="h-full">
    <head>
        @php
            $settings = \App\Models\Setting::first();
        @endphp

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ? $title . ' - ' . config('app.name') : config('app.name') }}</title>

        <meta name="description" content="{{ $metaDescription ?? $settings->site_description ?? 'CIP Tools — Practical developer utilities.' }}">
        <link rel="canonical" href="{{ $canonical ?? url()->current() }}">
        <meta name="robots" content="{{ $robots ?? 'index, follow' }}">

        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $title ?? config('app.name') }}">
        <meta property="og:description" content="{{ $metaDescription ?? $settings->site_description ?? '' }}">
        <meta property="og:url" content="{{ url()->current() }}">
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        <style>
            body { font-family: 'Inter', sans-serif; }
            @keyframes blob { 0%,100% { transform: translate(0,0) scale(1); } 33% { transform: translate(30px,-50px) scale(1.1); } 66% { transform: translate(-20px,20px) scale(0.9); } }
            .animate-blob { animation: blob 7s infinite; }
            .animation-delay-2000 { animation-delay: 2s; }
            .page-enter { animation: fadeIn 0.5s ease-out forwards; }
            @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        </style>
    </head>
    <body class="antialiased h-full bg-gradient-to-br from-blue-50 via-white to-indigo-50 text-gray-900">
        
        <div class="min-h-screen flex flex-col relative overflow-hidden">
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-96 h-96 bg-indigo-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000 pointer-events-none"></div>

            <div class="font-sans relative z-10 flex-1 flex flex-col page-enter">
                {{ $slot }}

                <footer class="mt-auto py-10">
                    <div class="max-w-md mx-auto px-4">
                        <div class="flex flex-wrap justify-center gap-x-6 gap-y-3 text-xs font-bold text-slate-400 uppercase tracking-widest">
                            <a href="{{ url('/') }}" class="hover:text-blue-600 transition-colors">Startseite</a>
                            <a href="{{ route('imprint') }}" class="hover:text-blue-600 transition-colors">Impressum</a>
                            <a href="{{ route('privacy') }}" class="hover:text-blue-600 transition-colors">Datenschutz</a>
                            <a href="{{ route('help') }}" class="hover:text-blue-600 transition-colors">Hilfe</a>
                        </div>
                        <div class="mt-6 text-center">
                            <p class="text-[10px] text-slate-400 font-medium">
                                &copy; {{ date('Y') }} {{ config('app.name') }}. Alle Rechte vorbehalten.
                            </p>
                        </div>
                    </div>
                </footer>
                </div>

            <div class="h-1 w-full bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 pointer-events-none"></div>
        </div>

        @livewireScripts
    </body>
</html>