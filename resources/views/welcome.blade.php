<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>DigitalPackt - Unified Digital Tool Ecosystem & SaaS Solutions</title>
    <meta name="title" content="DigitalPackt - Unified Digital Tool Ecosystem">
    <meta name="description" content="{{ $settings->site_description ?? 'Deploy professional-grade digital tools instantly.' }}">
    <meta name="keywords" content="SaaS, Digital Tools, Cloud Deployment, DigitalPackt">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="DigitalPackt - Scalable Digital Logic">
    <meta property="og:image" content="{{ asset('og-image.jpg') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; letter-spacing: -0.01em; }
        
        @keyframes subtle-float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-float { animation: subtle-float 5s ease-in-out infinite; }
        
        .text-gradient {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 50%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .bento-card { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .bento-card:hover {
            transform: translateY(-5px);
            border-color: rgba(59, 130, 246, 0.5);
            box-shadow: 0 20px 40px -15px rgba(59, 130, 246, 0.15);
        }
    </style>
</head>

<body class="antialiased bg-[#020617] text-slate-200 selection:bg-blue-500/30 overflow-x-hidden" 
      x-data="{ mobileMenuOpen: false, scrolled: false }" 
      @scroll.window="scrolled = window.pageYOffset > 20">

    <nav class="fixed w-full top-0 z-[100] transition-all duration-500"
         :class="scrolled ? 'py-3 bg-[#020617]/90 backdrop-blur-xl border-b border-slate-800' : 'py-6 bg-transparent'">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-10 h-10 bg-gradient-to-tr from-blue-600 to-violet-600 rounded-xl flex items-center justify-center shadow-lg group-hover:rotate-12 transition-transform">
                    <span class="text-white font-black text-xl">D</span>
                </div>
                <span class="text-2xl font-extrabold tracking-tighter text-white">Digital<span class="text-blue-500">Packt</span></span>
            </a>

            <div class="hidden md:flex items-center gap-8 font-semibold text-sm text-slate-400">
                <a href="#tools" class="hover:text-white transition-colors">Ecosystem</a>
                <a href="#pricing" class="hover:text-white transition-colors">Pricing</a>
                <div class="h-4 w-px bg-slate-800"></div>
                @auth
                    <a href="{{ route('dashboard') }}" class="px-5 py-2.5 bg-white text-black rounded-full hover:bg-blue-500 hover:text-white transition-all">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-white transition-colors">Sign In</a>
                    <a href="{{ route('register') }}" class="px-6 py-2.5 bg-blue-600 text-white rounded-full hover:bg-blue-500 shadow-lg shadow-blue-500/20 transition-all">Join the Pack</a>
                @endauth
            </div>

            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white">
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
                <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <div x-show="mobileMenuOpen" x-transition x-cloak class="fixed inset-0 z-[-1] bg-[#020617] p-10 pt-32 flex flex-col gap-6 text-center md:hidden">
            <a href="#tools" @click="mobileMenuOpen = false" class="text-2xl font-bold">Ecosystem</a>
            <a href="#pricing" @click="mobileMenuOpen = false" class="text-2xl font-bold">Pricing</a>
            <hr class="border-slate-800">
            @auth
                <a href="{{ route('dashboard') }}" class="text-blue-500 text-xl font-bold">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-xl">Login</a>
                <a href="{{ route('register') }}" class="py-4 bg-blue-600 rounded-2xl font-bold">Register</a>
            @endauth
        </div>
    </nav>

    <section class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-blue-900/20 via-transparent to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs font-bold uppercase tracking-widest mb-8">
                <span class="flex h-2 w-2 rounded-full bg-blue-500 animate-pulse"></span>
                V2.0 Ecosystem Live
            </div>

            <h1 class="text-5xl md:text-8xl font-black text-white mb-6 tracking-tight leading-[0.9]">
                One Pack.<br/>
                <span class="text-gradient">Infinite Tools.</span>
            </h1>
            
            <p class="text-lg md:text-xl text-slate-400 max-w-2xl mx-auto mb-10 leading-relaxed font-medium">
                {{ $settings->site_description ?? 'DigitalPackt unifies high-performance SaaS tools into a single, scalable ecosystem.' }}
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="#tools" class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-bold text-lg hover:scale-105 transition-transform shadow-2xl shadow-blue-600/20">Explore Ecosystem</a>
                <a href="{{ route('register') }}" class="px-8 py-4 bg-slate-800 text-white border border-slate-700 rounded-2xl font-bold text-lg hover:bg-slate-700 transition-all">Start Free Trial</a>
            </div>

            <div class="mt-20 pt-10 border-t border-slate-800/50 flex flex-col items-center opacity-50 grayscale">
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.3em] mb-6">Trusted Infrastructure</p>
                <div class="flex flex-wrap justify-center gap-8 md:gap-16 font-black text-xl md:text-2xl italic tracking-tighter">
                    <span>CLOUD.INFRA</span>
                    <span>LOGIC.FLOW</span>
                    <span>CORE.STACK</span>
                </div>
            </div>
        </div>
    </section>

    <section id="tools" class="py-32 relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <div class="max-w-xl">
                    <h2 class="text-4xl font-black text-white mb-4">The Tool Pack</h2>
                    <p class="text-slate-400 font-medium">Curated high-performance applications ready for deployment.</p>
                </div>
                <a href="{{ route('tools.index') }}" class="text-blue-500 font-bold hover:underline inline-flex items-center gap-2">
                    View all tools 
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($tools as $tool)
                <div class="bento-card group bg-slate-900/30 border border-slate-800 p-8 rounded-[2.5rem] flex flex-col justify-between">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-blue-600/10 flex items-center justify-center mb-6 border border-blue-500/20 group-hover:bg-blue-600 transition-colors duration-500">
                            @if($tool->logo)
                                <img src="{{ Storage::url($tool->logo) }}" class="w-7 h-7 object-contain" alt="{{ $tool->name }}">
                            @else
                                <span class="text-blue-500 group-hover:text-white font-black text-xl">{{ substr($tool->name, 0, 1) }}</span>
                            @endif
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">{{ $tool->name }}</h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6 line-clamp-2">{{ $tool->description }}</p>
                    </div>
                    
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-[10px] font-mono font-bold text-blue-400 bg-blue-400/10 px-3 py-1 rounded-full uppercase">{{ $tool->domain }}</span>
                        <a href="{{ route('tools.show', $tool) }}" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-blue-600 text-white transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-20 text-center border-2 border-dashed border-slate-800 rounded-[3rem]">
                    <p class="text-slate-500 font-bold">No tools available in the pack yet.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="pricing" class="py-32 border-t border-slate-900">
        <div class="max-w-5xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-white mb-4">Pricing</h2>
                <p class="text-slate-400">Scaling with your digital logic.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="p-10 rounded-[3rem] bg-slate-900/50 border border-slate-800 relative overflow-hidden">
                    <span class="text-blue-400 font-black text-[10px] uppercase tracking-widest">Professional</span>
                    <div class="text-5xl font-black text-white my-6">€49<span class="text-lg text-slate-500">/mo</span></div>
                    <ul class="space-y-4 mb-10 text-slate-400 font-medium">
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg> 5 Active Tools</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg> Priority Alpha Support</li>
                    </ul>
                    <button class="w-full py-4 bg-white text-black rounded-2xl font-black hover:bg-blue-600 hover:text-white transition-all">Get Started</button>
                </div>
                <div class="p-10 rounded-[3rem] bg-blue-600 text-white">
                    <span class="font-black text-[10px] uppercase tracking-widest opacity-80">Enterprise</span>
                    <h3 class="text-4xl font-black my-6">Custom Pack</h3>
                    <p class="mb-10 opacity-90 font-medium">Dedicated architecture for high-volume enterprise demands.</p>
                    <a href="mailto:sales@digitalpackt.com" class="block text-center py-4 bg-black text-white rounded-2xl font-black hover:bg-slate-900 transition-all">Contact Sales</a>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-black pt-24 pb-12 border-t border-slate-900">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-16 mb-20">
                <div class="col-span-2">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-black">D</span>
                        </div>
                        <span class="text-xl font-black text-white tracking-tighter">DigitalPackt</span>
                    </div>
                    <p class="text-slate-500 max-w-sm font-medium italic">"One Pack. Infinite Tools."</p>
                </div>
                
                <div>
                    <h4 class="text-white font-bold text-sm mb-6 uppercase tracking-widest">Navigation</h4>
                    <ul class="space-y-4 text-slate-500 text-sm font-bold">
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Tools Directory</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">API Reference</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold text-sm mb-6 uppercase tracking-widest">Legal</h4>
                    <ul class="space-y-4 text-slate-500 text-sm font-bold">
                        @foreach($footerPages as $fPage)
                            <li><a href="{{ route('pages.show', $fPage->slug) }}" class="hover:text-blue-500 transition-colors">{{ $fPage->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="pt-12 border-t border-slate-900 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-slate-600 text-[10px] font-black uppercase tracking-[0.2em]">
                    &copy; {{ date('Y') }} DigitalPackt. All Rights Reserved.
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                    <span class="text-slate-600 text-[10px] font-black uppercase tracking-widest">All Systems Operational</span>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>