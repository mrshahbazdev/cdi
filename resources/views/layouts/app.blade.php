<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Digitalpackt') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link href="https://fonts.bunny.net/css?family=inter:400,600,700&display=swap" rel="stylesheet">
    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    <style>
        body { font-family: 'Inter', sans-serif; }
        html { scroll-behavior: smooth; }

        /* Scrollbar Styling */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #2563eb, #4f46e5);
            border-radius: 10px;
        }

        /* Blob Animation */
        @keyframes blob {
            0%, 100% { transform: translate(0,0) scale(1); }
            33% { transform: translate(20px,-30px) scale(1.05); }
            66% { transform: translate(-20px,20px) scale(0.95); }
        }
        .animate-blob { animation: blob 8s infinite; }

        .glass {
            background: rgba(255,255,255,.75);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>

<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">

<a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 z-[100] bg-white px-4 py-2 rounded shadow border border-blue-600">
    Zum Inhalt springen
</a>

<x-banner />

<div class="min-h-screen flex flex-col relative">

    <div aria-hidden="true" class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-blue-100 rounded-full blur-3xl opacity-40 animate-blob pointer-events-none"></div>
    <div aria-hidden="true" class="absolute top-40 left-0 -ml-20 w-96 h-96 bg-indigo-100 rounded-full blur-3xl opacity-40 animate-blob animation-delay-2000 pointer-events-none"></div>

    <header role="banner" class="sticky top-0 z-50 glass border-b border-slate-200">
        @livewire('navigation-menu')
    </header>

    <main id="main-content" role="main" class="flex-1 relative z-10">
        <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

    @php
        $settings = \App\Models\Setting::first();
        $footerPages = \App\Models\Page::where('is_visible', true)->orderBy('sort_order')->get();
    @endphp

    <footer role="contentinfo" class="bg-slate-900 text-slate-300 relative z-20 border-t border-slate-800">
        <div class="max-w-7xl mx-auto pt-16 pb-8 px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">

                <div class="md:col-span-2 space-y-6">
                    <a href="/" class="inline-block">
                        @if($settings?->site_logo)
                            <img src="{{ Storage::url($settings->site_logo) }}" alt="Digitalpackt" class="h-10 w-auto brightness-0 invert">
                        @else
                            <span class="text-white text-2xl font-black tracking-tighter">
                                Digital<span class="text-blue-500">packt</span>
                            </span>
                        @endif
                    </a>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-sm">
                        {{ $settings->site_description ?? 'Professionelle SaaS- und Automatisierungsplattform für moderne Unternehmen in Europa.' }}
                    </p>
                    
                    @if($settings?->linkedin_url)
                    <div class="flex items-center space-x-4">
                        <a href="{{ $settings->linkedin_url }}" target="_blank" rel="noopener" class="text-slate-500 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.8 0-5 2.2-5 5v14c0 2.8 2.2 5 5 5h14c2.8 0 5-2.2 5-5v-14c0-2.8-2.2-5-5-5zM8 19h-3v-10h3v10zm-1.5-11.2c-.9 0-1.6-.7-1.6-1.6s.7-1.6 1.6-1.6 1.6.7 1.6 1.6-.7 1.6-1.6 1.6zm13.5 11.2h-3v-5.6c0-1.3 0-3.1-1.9-3.1s-2.2 1.5-2.2 3v5.7h-3v-10h2.9v1.4h.1c.4-.7 1.3-1.5 2.7-1.5 2.9 0 3.4 1.9 3.4 4.4v5.7z"/></svg>
                        </a>
                    </div>
                    @endif
                </div>

                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-widest mb-6">Plattform</h4>
                    <ul class="space-y-4 text-sm">
                        <li><a href="{{ route('dashboard') }}" class="hover:text-blue-400 transition-colors">Dashboard</a></li>
                        <li><a href="{{ route('tools.index') }}" class="hover:text-blue-400 transition-colors">Tools</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-blue-400 transition-colors">Blog</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-widest mb-6">Rechtliches</h4>
                    <ul class="space-y-4 text-sm">
                        @foreach($footerPages as $page)
                            <li><a href="{{ route('pages.show', $page->slug) }}" class="hover:text-blue-400 transition-colors">{{ $page->title }}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>

            <div class="pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-slate-500">
                <p>© {{ date('Y') }} {{ config('app.name') }}. Alle Rechte vorbehalten.</p>
                <p class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                    System Status: Operational
                </p>
            </div>
        </div>
    </footer>
</div>

@livewireScripts
@stack('modals')

<button id="scrollToTop" type="button" aria-label="Nach oben scrollen" 
    class="fixed bottom-6 right-6 w-12 h-12 rounded-2xl bg-blue-600 text-white shadow-2xl opacity-0 pointer-events-none transition-all duration-300 hover:bg-blue-700 hover:-translate-y-1 z-50 flex items-center justify-center font-bold">
    ↑
</button>

<script>
    const btn = document.getElementById('scrollToTop');
    window.addEventListener('scroll', () => {
        const isVisible = window.scrollY > 400;
        btn.classList.toggle('opacity-100', isVisible);
        btn.classList.toggle('opacity-0', !isVisible);
        btn.classList.toggle('pointer-events-auto', isVisible);
        btn.classList.toggle('pointer-events-none', !isVisible);
    });
    btn.addEventListener('click', () => window.scrollTo({top:0, behavior:'smooth'}));
</script>

</body>
</html>