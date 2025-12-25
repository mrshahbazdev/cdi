<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    @php $settings = \App\Models\Setting::first(); @endphp
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $metaDescription ?? $settings->site_description ?? 'Professional SaaS & Automation Platform' }}">
    <meta name="theme-color" content="#2563eb">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- Security Headers -->
    <meta http-equiv="Permissions-Policy" content="geolocation=(), microphone=(), camera=()">

    <title>
        @hasSection('title')
            @yield('title') - {{ config('app.name', 'Digitalpackt') }}
        @else
            {{ $title ?? (config('app.name', 'Digitalpackt') . ' - Professional SaaS Platform') }}
        @endif
    </title>

    <!-- Preconnect & DNS Prefetch -->
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.example.com">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet">

    <!-- Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire -->
    @livewireStyles

    <!-- Professional CSS -->
    <style>
        :root {
            --color-primary: #2563eb;
            --color-secondary: #4f46e5;
            --color-accent: #7c3aed;
            --transition-smooth: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { box-sizing: border-box; }

        html {
            scroll-behavior: smooth;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            letter-spacing: -0.3px;
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, var(--color-primary), var(--color-secondary));
            border-radius: 10px;
            border: 2px solid rgba(0, 0, 0, 0.05);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, var(--color-secondary), var(--color-accent));
        }

        /* Animations */
        @keyframes blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(20px, -30px) scale(1.05); }
            66% { transform: translate(-20px, 20px) scale(0.95); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-blob {
            animation: blob 8s infinite;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Glass Morphism */
        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Transitions */
        a, button {
            transition: all var(--transition-smooth);
        }

        /* Focus States for Accessibility */
        *:focus-visible {
            outline: 2px solid var(--color-primary);
            outline-offset: 2px;
        }

        /* Prevent CLS */
        img {
            height: auto;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50 text-gray-900 antialiased">

<!-- Skip to content (Accessibility) -->
<a href="#main-content"
   class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:bg-white focus:px-4 focus:py-2 focus:rounded focus:shadow-lg focus:text-sm focus:font-medium">
    Skip to main content
</a>

<x-banner />

<div class="min-h-screen flex flex-col relative overflow-hidden">

    <!-- Decorative Elements -->
    <div aria-hidden="true" class="absolute top-0 right-0 -mt-40 -mr-40 w-80 h-80 bg-blue-100 rounded-full blur-3xl opacity-30 animate-blob"></div>
    <div aria-hidden="true" class="absolute bottom-0 left-0 -mb-40 -ml-40 w-80 h-80 bg-indigo-100 rounded-full blur-3xl opacity-30 animate-blob" style="animation-delay: 2s;"></div>

    <!-- ================= HEADER / NAVIGATION ================= -->
    <header role="banner" class="sticky top-0 z-50 glass border-b border-blue-100/30 shadow-sm">
        <nav role="navigation" aria-label="Main Navigation">
            @livewire('navigation-menu')
        </nav>
    </header>

    <!-- ================= MAIN CONTENT ================= -->
    <main id="main-content" role="main" class="flex-1 relative z-10 w-full">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

    <!-- ================= FOOTER ================= -->
    @php
        $settings = \App\Models\Setting::first();
        $footerPages = \App\Models\Page::where('is_visible', true)->orderBy('sort_order')->get();
    @endphp

    <footer role="contentinfo" class="bg-gradient-to-b from-gray-900 to-black border-t border-gray-800 w-full mt-20">
        <div class="w-full overflow-hidden">
            <div class="max-w-7xl mx-auto pt-16 pb-12 px-4 sm:px-6 lg:px-8">

                <!-- Footer Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">

                    <!-- Brand Section -->
                    <div class="md:col-span-2 lg:col-span-1">
                        <div class="mb-6">
                            @if($settings?->site_logo)
                                <img src="{{ Storage::url($settings->site_logo) }}"
                                     alt="{{ config('app.name') }} Logo"
                                     class="h-14 w-auto"
                                     loading="lazy">
                            @else
                                <div class="flex items-center gap-2">
                                    <span class="text-white text-2xl font-extrabold tracking-tight">
                                        {{ config('app.name') }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <p class="text-gray-400 text-sm leading-relaxed max-w-sm mb-6">
                            {{ $settings->site_description ?? 'Professional SaaS & automation platform for modern enterprises.' }}
                        </p>

                        <!-- Social Links -->
                        <div class="flex gap-3">
                            @if($settings?->linkedin_url)
                                <a href="{{ $settings->linkedin_url }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   aria-label="Visit us on LinkedIn"
                                   class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-800/50 text-gray-400 hover:text-white hover:bg-blue-600 transition-all duration-300 hover:scale-110">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M19 0h-14c-2.8 0-5 2.2-5 5v14c0 2.8 2.2 5 5 5h14c2.8 0 5-2.2 5-5v-14c0-2.8-2.2-5-5-5z"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Platform Section -->
                    <div>
                        <h4 class="text-white font-bold text-sm mb-5 tracking-wide">PLATFORM</h4>
                        <ul class="space-y-3 text-gray-400">
                            <li><a href="{{ route('dashboard') }}" class="text-sm hover:text-blue-400 transition-colors duration-300">Dashboard</a></li>
                            <li><a href="{{ route('tools.index') }}" class="text-sm hover:text-blue-400 transition-colors duration-300">Tools</a></li>
                            <li><a href="{{ route('blog.index') }}" class="text-sm hover:text-blue-400 transition-colors duration-300">Blog</a></li>
                        </ul>
                    </div>

                    <!-- Legal Section -->
                    <div>
                        <h4 class="text-white font-bold text-sm mb-5 tracking-wide">LEGAL</h4>
                        <ul class="space-y-3 text-gray-400">
                            @forelse($footerPages as $page)
                                <li>
                                    <a href="{{ route('pages.show', $page->slug) }}"
                                       class="text-sm hover:text-blue-400 transition-colors duration-300">
                                        {{ $page->title }}
                                    </a>
                                </li>
                            @empty
                                <li><a href="#" class="text-sm hover:text-blue-400 transition-colors duration-300">Terms of Service</a></li>
                                <li><a href="#" class="text-sm hover:text-blue-400 transition-colors duration-300">Privacy Policy</a></li>
                            @endforelse
                        </ul>
                    </div>

                    <!-- Company Section -->
                    <div>
                        <h4 class="text-white font-bold text-sm mb-5 tracking-wide">COMPANY</h4>
                        <ul class="space-y-3 text-gray-400">
                            <li><a href="#" class="text-sm hover:text-blue-400 transition-colors duration-300">About Us</a></li>
                            <li><a href="#" class="text-sm hover:text-blue-400 transition-colors duration-300">Contact</a></li>
                            <li><a href="#" class="text-sm hover:text-blue-400 transition-colors duration-300">Support</a></li>
                        </ul>
                    </div>

                </div>

                <!-- Divider -->
                <div class="border-t border-gray-800"></div>

                <!-- Footer Bottom -->
                <div class="pt-8 flex flex-col md:flex-row items-center justify-between text-sm text-gray-500">
                    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    <div class="flex gap-6 mt-4 md:mt-0">
                        <a href="#" class="hover:text-gray-300 transition-colors duration-300">Status</a>
                        <a href="#" class="hover:text-gray-300 transition-colors duration-300">Security</a>
                        <a href="#" class="hover:text-gray-300 transition-colors duration-300">Sitemap</a>
                    </div>
                </div>

            </div>
        </div>
    </footer>
</div>

@livewireScripts
@stack('modals')

<!-- Scroll to Top Button -->
<button id="scrollToTop"
        type="button"
        aria-label="Scroll to top"
        class="fixed bottom-6 right-6 w-12 h-12 rounded-lg bg-blue-600 text-white shadow-lg opacity-0 pointer-events-none transition-all duration-300 hover:bg-blue-700 hover:shadow-xl flex items-center justify-center font-semibold">
    ↑
</button>

<script>
    const scrollBtn = document.getElementById('scrollToTop');
    
    window.addEventListener('scroll', () => {
        const isVisible = window.scrollY > 300;
        scrollBtn.classList.toggle('opacity-0', !isVisible);
        scrollBtn.classList.toggle('pointer-events-none', !isVisible);
    });
    
    scrollBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>

</body>
</html>