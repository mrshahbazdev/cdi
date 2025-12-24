<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>DigitalPackt - Unified Digital Tool Ecosystem & SaaS Solutions</title>
    <meta name="title" content="DigitalPackt - Unified Digital Tool Ecosystem">
    <meta name="description" content="{{ $settings->site_description ?? 'Deploy professional-grade digital tools instantly. DigitalPackt provides a high-performance pack of SaaS solutions for developers and enterprises.' }}">
    <meta name="keywords" content="SaaS, Digital Tools, Cloud Deployment, Enterprise Solutions, DigitalPackt">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="DigitalPackt - Scalable Digital Logic">
    <meta property="og:description" content="Unlock a powerhouse of tools with instant deployment.">
    <meta property="og:image" content="{{ asset('og-image.jpg') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; letter-spacing: -0.01em; }
        
        /* High-Performance Animations */
        @keyframes subtle-float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-float { animation: subtle-float 5s ease-in-out infinite; }
        
        .glass-dark {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .text-gradient {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 50%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .bento-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .bento-card:hover {
            transform: translateY(-5px);
            border-color: rgba(59, 130, 246, 0.5);
            box-shadow: 0 20px 40px -15px rgba(59, 130, 246, 0.15);
        }
    </style>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "SoftwareApplication",
      "name": "DigitalPackt",
      "operatingSystem": "Cloud",
      "applicationCategory": "BusinessApplication",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "EUR"
      }
    }
    </script>
</head>

<body class="antialiased bg-[#020617] text-slate-200 selection:bg-blue-500/30" 
      x-data="{ mobileMenuOpen: false, scrolled: false }" 
      @scroll.window="scrolled = window.pageYOffset > 20">

    <nav class="fixed w-full top-0 z-[100] transition-all duration-500"
         :class="scrolled ? 'py-3 bg-[#020617]/80 backdrop-blur-md border-b border-slate-800' : 'py-6 bg-transparent'">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-10 h-10 bg-gradient-to-tr from-blue-600 to-violet-600 rounded-xl flex items-center justify-center shadow-lg group-hover:rotate-12 transition-transform">
                    <span class="text-white font-black text-xl">D</span>
                </div>
                <span class="text-2xl font-extrabold tracking-tighter text-white">Digital<span class="text-blue-500">Packt</span></span>
            </a>

            <div class="hidden md:flex items-center gap-8 font-semibold text-sm text-slate-400">
                <a href="#tools" class="hover:text-white transition-colors">Ecosystem</a>
                <a href="#features" class="hover:text-white transition-colors">Infrastructure</a>
                <a href="#pricing" class="hover:text-white transition-colors">Pricing</a>
                <div class="h-4 w-px bg-slate-800"></div>
                @auth
                    <a href="{{ route('dashboard') }}" class="px-5 py-2.5 bg-white text-black rounded-full hover:bg-blue-500 hover:text-white transition-all">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-white transition-colors">Sign In</a>
                    <a href="{{ route('register') }}" class="px-6 py-2.5 bg-blue-600 text-white rounded-full hover:bg-blue-500 shadow-lg shadow-blue-500/20 transition-all">Join the Pack</a>
                @endauth
            </div>
        </div>
    </nav>

    <section class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-blue-900/20 via-transparent to-transparent"></div>
            <div class="absolute h-full w-full bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 brightness-100 contrast-150"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs font-bold uppercase tracking-widest mb-8 animate-fade-in">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                </span>
                V2.0 Ecosystem Live
            </div>

            <h1 class="text-5xl md:text-8xl font-black text-white mb-6 tracking-tight leading-[0.9]">
                One Pack.<br/>
                <span class="text-gradient">Infinite Tools.</span>
            </h1>
            
            <p class="text-lg md:text-xl text-slate-400 max-w-2xl mx-auto mb-10 leading-relaxed font-medium">
                DigitalPackt unifies high-performance SaaS tools into a single, scalable ecosystem. Deploy, manage, and scale your digital logic without the infra-headache.
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="#tools" class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-bold text-lg hover:scale-105 transition-transform shadow-2xl shadow-blue-600/20">
                    Explore Ecosystem
                </a>
                <a href="{{ route('register') }}" class="px-8 py-4 bg-slate-800 text-white border border-slate-700 rounded-2xl font-bold text-lg hover:bg-slate-700 transition-all">
                    Start Free Trial
                </a>
            </div>

            <div class="mt-20 pt-10 border-t border-slate-800/50 flex flex-col items-center">
                <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-6">Trusted by tech-forward teams</p>
                <div class="flex flex-wrap justify-center gap-12 opacity-40 grayscale hover:grayscale-0 transition-all duration-700">
                    <span class="text-2xl font-black tracking-tighter">CLOUD.INFRA</span>
                    <span class="text-2xl font-black tracking-tighter">LOGIC.FLOW</span>
                    <span class="text-2xl font-black tracking-tighter">CORE.STACK</span>
                    <span class="text-2xl font-black tracking-tighter">NEXT.GEN</span>
                </div>
            </div>
        </div>
    </section>

    <section id="tools" class="py-32 relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <div class="max-w-xl text-left">
                    <h2 class="text-4xl font-black text-white mb-4">The Tool Pack</h2>
                    <p class="text-slate-400 font-medium">Curated high-performance applications ready for instant deployment on your subdomains.</p>
                </div>
                <a href="{{ route('tools.index') }}" class="text-blue-500 font-bold hover:underline">View all 24+ tools →</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($tools as $tool)
                <div class="bento-card group bg-slate-900/50 border border-slate-800 p-8 rounded-[2rem] flex flex-col justify-between">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-blue-500/10 flex items-center justify-center mb-6 border border-blue-500/20 group-hover:bg-blue-600 transition-colors duration-500">
                            @if($tool->logo)
                                <img src="{{ Storage::url($tool->logo) }}" class="w-7 h-7 object-contain" alt="">
                            @else
                                <span class="text-blue-500 group-hover:text-white font-black text-xl">{{ substr($tool->name, 0, 1) }}</span>
                            @endif
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">{{ $tool->name }}</h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6 line-clamp-2">{{ $tool->description }}</p>
                    </div>
                    
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-xs font-mono text-blue-400 bg-blue-400/10 px-3 py-1 rounded-full">{{ $tool->domain }}</span>
                        <a href="{{ route('tools.show', $tool) }}" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-blue-600 text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="pricing" class="py-32 bg-[#020617] border-y border-slate-900">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-black text-white mb-16">Simple. Scalable. Packt.</h2>
            
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gradient-to-b from-slate-900 to-slate-950 border border-slate-800 p-10 rounded-[3rem] text-left relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-8 opacity-5">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 12h3v9h6v-6h4v6h6v-9h3L12 2z"/></svg>
                    </div>
                    <span class="px-4 py-1 bg-blue-500/10 text-blue-400 text-[10px] font-black uppercase tracking-tighter rounded-full border border-blue-500/20 mb-6 inline-block">Professional</span>
                    <div class="flex items-baseline gap-2 mb-8">
                        <span class="text-6xl font-black text-white">€49</span>
                        <span class="text-slate-500 font-bold italic">/month</span>
                    </div>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center gap-3 text-slate-300 font-medium"><svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg> 5 Active Pack Tools</li>
                        <li class="flex items-center gap-3 text-slate-300 font-medium"><svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg> Unlimited Logic Users</li>
                        <li class="flex items-center gap-3 text-slate-300 font-medium"><svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg> Priority Alpha Support</li>
                    </ul>
                    <button class="w-full py-4 bg-white text-black rounded-2xl font-black hover:bg-blue-500 hover:text-white transition-all">Get Started</button>
                </div>

                <div class="bg-blue-600 p-10 rounded-[3rem] text-left text-white shadow-2xl shadow-blue-600/20 flex flex-col justify-between">
                    <div>
                        <span class="px-4 py-1 bg-white/20 text-white text-[10px] font-black uppercase tracking-tighter rounded-full mb-6 inline-block">Enterprise</span>
                        <h3 class="text-4xl font-black mb-4">Custom Architecture</h3>
                        <p class="text-blue-100 font-medium mb-8">Full-scale ecosystem deployment with dedicated multi-tenant infrastructure.</p>
                    </div>
                    <a href="mailto:sales@digitalpackt.com" class="w-full py-4 bg-black text-white text-center rounded-2xl font-black hover:bg-slate-900 transition-all">Contact Sales</a>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-black pt-24 pb-12 border-t border-slate-900">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-16 mb-20">
                <div class="col-span-2">
                    <a href="/" class="flex items-center gap-3 mb-8">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-black">D</span>
                        </div>
                        <span class="text-xl font-black text-white tracking-tighter">DigitalPackt</span>
                    </a>
                    <p class="text-slate-500 max-w-sm leading-relaxed font-medium italic">
                        "Unifying the digital fragmented landscape into one cohesive pack of high-performance logic."
                    </p>
                </div>
                
                <div>
                    <h4 class="text-white font-bold text-sm mb-6 uppercase tracking-widest">Navigation</h4>
                    <ul class="space-y-4 text-slate-500 text-sm font-bold">
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Tools Directory</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">System Status</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">API Reference</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold text-sm mb-6 uppercase tracking-widest">Company</h4>
                    <ul class="space-y-4 text-slate-500 text-sm font-bold">
                        @foreach($footerPages as $fPage)
                            <li><a href="{{ route('pages.show', $fPage->slug) }}" class="hover:text-blue-500 transition-colors">{{ $fPage->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="pt-12 border-t border-slate-900 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-slate-600 text-xs font-bold uppercase tracking-widest">
                    &copy; {{ date('Y') }} DigitalPackt. All Rights Reserved. Built for the next web.
                </p>
                <div class="flex gap-6">
                    <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                    <span class="text-slate-600 text-[10px] font-black uppercase tracking-widest leading-none">All Systems Operational</span>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>