<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Digitalpackt') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link href="https://fonts.bunny.net/css?family=inter:400,600,700&display=swap" rel="stylesheet">

    <!-- Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire -->
    @livewireStyles

    <!-- Minimal safe CSS -->
    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        html { scroll-behavior: smooth; }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #2563eb, #4f46e5);
            border-radius: 10px;
        }

        @keyframes blob {
            0%,100% { transform: translate(0,0) scale(1); }
            33% { transform: translate(20px,-30px) scale(1.05); }
            66% { transform: translate(-20px,20px) scale(0.95); }
        }
        .animate-blob { animation: blob 8s infinite; }

        .glass {
            background: rgba(255,255,255,.75);
            backdrop-filter: blur(12px);
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50 text-gray-900 antialiased">

<!-- Skip to content -->
<a href="#main-content"
   class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 z-50 bg-white px-4 py-2 rounded shadow">
    Skip to content
</a>

<x-banner />

<div class="min-h-screen flex flex-col relative overflow-hidden">

    <!-- Decorative blobs -->
    <div aria-hidden="true" class="absolute top-0 right-0 -mt-24 -mr-24 w-96 h-96 bg-blue-100 rounded-full blur-3xl opacity-40 animate-blob"></div>
    <div aria-hidden="true" class="absolute bottom-0 left-0 -mb-24 -ml-24 w-96 h-96 bg-indigo-100 rounded-full blur-3xl opacity-40 animate-blob"></div>

    <!-- ================= HEADER / NAV ================= -->
    <header role="banner" class="sticky top-0 z-50 glass border-b border-blue-100/50 shadow-sm">
        <nav role="navigation" aria-label="Hauptnavigation">
            @livewire('navigation-menu')
        </nav>
    </header>

    <!-- ================= MAIN ================= -->
    <main id="main-content" role="main" class="flex-1 relative z-10">
        <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

    <!-- ================= FOOTER ================= -->
    @php
        $settings = \App\Models\Setting::first();
        $footerPages = \App\Models\Page::where('is_visible', true)->orderBy('sort_order')->get();
    @endphp

    <footer role="contentinfo" class="bg-gray-900 border-t border-gray-800 w-full overflow-hidden">
        <div class="w-full bg-gray-900">
            <div class="max-w-7xl mx-auto pt-20 pb-10 px-4 sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 md:grid-cols-4 gap-14 mb-16">

                    <!-- Brand -->
                    <div class="md:col-span-2">
                        <div class="mb-6">
                            @if($settings?->site_logo)
                                <img src="{{ Storage::url($settings->site_logo) }}"
                                     alt="Digitalpackt Logo"
                                     class="h-16 w-auto"
                                     loading="lazy">
                            @else
                                <span class="text-white text-2xl font-extrabold">
                                    Digitalpackt
                                </span>
                            @endif
                        </div>

                        <p class="text-gray-400 max-w-md">
                            {{ $settings->site_description ?? 'Professionelle SaaS- und Automatisierungsplattform für moderne Unternehmen.' }}
                        </p>

                        <!-- Socials -->
                        <div class="flex gap-4 mt-6">
                            @if($settings?->linkedin_url)
                                <a href="{{ $settings->linkedin_url }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   aria-label="LinkedIn"
                                   class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-800 text-gray-400 hover:text-white hover:bg-blue-700 transition">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 0h-14c-2.8 0-5 2.2-5 5v14c0 2.8 2.2 5 5 5h14c2.8 0 5-2.2 5-5v-14c0-2.8-2.2-5-5-5z"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Platform -->
                    <div>
                        <h4 class="text-white font-bold mb-4">Plattform</h4>
                        <ul class="space-y-3 text-gray-400">
                            <li><a href="{{ route('dashboard') }}" class="hover:text-blue-500">Dashboard</a></li>
                            <li><a href="{{ route('tools.index') }}" class="hover:text-blue-500">Tools</a></li>
                            <li><a href="{{ route('blog.index') }}" class="hover:text-blue-500">Blog</a></li>
                        </ul>
                    </div>

                    <!-- Legal -->
                    <div>
                        <h4 class="text-white font-bold mb-4">Rechtliches</h4>
                        <ul class="space-y-3 text-gray-400">
                            @foreach($footerPages as $page)
                                <li>
                                    <a href="{{ route('pages.show', $page->slug) }}"
                                       class="hover:text-blue-500">
                                        {{ $page->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>

                <div class="border-t border-gray-800 pt-6 text-center text-sm text-gray-500">
                    © {{ date('Y') }} {{ config('app.name') }}. Alle Rechte vorbehalten.
                </div>

            </div>
        </div>
    </footer>
</div>

@livewireScripts
@stack('modals')

<!-- Scroll to Top -->
<button id="scrollToTop"
        type="button"
        aria-label="Nach oben scrollen"
        class="fixed bottom-6 right-6 w-12 h-12 rounded-xl bg-blue-600 text-white shadow-lg opacity-0 pointer-events-none transition">
    ↑
</button>

<script>
const btn = document.getElementById('scrollToTop');
window.addEventListener('scroll', () => {
    btn.classList.toggle('opacity-0', window.scrollY < 300);
    btn.classList.toggle('pointer-events-none', window.scrollY < 300);
});
btn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
</script>

</body>
</html>
