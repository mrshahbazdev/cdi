<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    @php $settings = \App\Models\Setting::first(); @endphp

    <!-- ================= META ================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description"
          content="{{ $metaDescription ?? $settings->site_description ?? 'Professional SaaS & Automation Platform' }}">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#2563eb">

    <!-- Canonical -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- ================= TITLE ================= -->
    <title>
        @hasSection('title')
            @yield('title') – {{ config('app.name', 'Digitalpackt') }}
        @else
            {{ $title ?? (config('app.name', 'Digitalpackt').' – Professional SaaS Platform') }}
        @endif
    </title>

    <!-- ================= OPEN GRAPH ================= -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('app.name', 'Digitalpackt') }}">
    <meta property="og:title"
          content="@hasSection('title')@yield('title')@else{{ config('app.name', 'Digitalpackt') }}@endif">
    <meta property="og:description"
          content="{{ $metaDescription ?? $settings->site_description ?? 'Professional SaaS Platform' }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- ================= TWITTER ================= -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title"
          content="@hasSection('title')@yield('title')@else{{ config('app.name', 'Digitalpackt') }}@endif">
    <meta name="twitter:description"
          content="{{ $metaDescription ?? $settings->site_description ?? 'Professional SaaS Platform' }}">

    <!-- ================= PREFETCH ================= -->
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet">

    <!-- ================= ASSETS ================= -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <!-- ================= CSS ================= -->
    <style>
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Inter', system-ui, sans-serif;
            line-height: 1.6;
        }
        *:focus-visible {
            outline: 2px solid #2563eb;
            outline-offset: 2px;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50 text-gray-900 antialiased">

<!-- Skip link -->
<a href="#main-content"
   class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 z-50 bg-white px-4 py-2 rounded shadow">
    Skip to main content
</a>

<x-banner />

<div class="min-h-screen flex flex-col">

    <!-- ================= HEADER ================= -->
    <header role="banner" class="sticky top-0 z-50 bg-white/80 backdrop-blur border-b">
        <nav role="navigation" aria-label="Main Navigation">
            @livewire('navigation-menu')
        </nav>
    </header>

    <!-- ================= MAIN ================= -->
    <main id="main-content" role="main" class="flex-1">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

    <!-- ================= FOOTER ================= -->
    @php
        $footerPages = \App\Models\Page::where('is_visible', true)->orderBy('sort_order')->get();
    @endphp

    <footer role="contentinfo" class="bg-gray-900 text-gray-400 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-6 py-12">

            <div class="grid md:grid-cols-4 gap-10 mb-10">

                <div class="md:col-span-2">
                    <p class="text-white font-extrabold text-xl mb-4">
                        {{ config('app.name', 'Digitalpackt') }}
                    </p>
                    <p class="text-sm max-w-md">
                        {{ $settings->site_description ?? 'Professional SaaS & Automation Platform.' }}
                    </p>
                </div>

                <div>
                    <p class="text-white font-semibold mb-3">Platform</p>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('dashboard') }}" class="hover:text-blue-400">Dashboard</a></li>
                        <li><a href="{{ route('tools.index') }}" class="hover:text-blue-400">Tools</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-blue-400">Blog</a></li>
                    </ul>
                </div>

                <div>
                    <p class="text-white font-semibold mb-3">Legal</p>
                    <ul class="space-y-2 text-sm">
                        @foreach($footerPages as $page)
                            <li>
                                <a href="{{ route('pages.show', $page->slug) }}" class="hover:text-blue-400">
                                    {{ $page->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>

            <div class="border-t border-gray-800 pt-6 flex flex-col md:flex-row justify-between text-sm">
                <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-gray-300">Status</a>
                    <a href="#" class="hover:text-gray-300">Security</a>
                    <a href="#" class="hover:text-gray-300">Sitemap</a>
                </div>
            </div>

        </div>
    </footer>

</div>

@livewireScripts
@stack('modals')

</body>
</html>
