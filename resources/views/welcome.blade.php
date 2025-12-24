<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO META -->
    <title>Digitalpackt – Smart SaaS & Digital Automation Platform</title>
    <meta name="description" content="Digitalpackt is a modern SaaS platform offering powerful digital tools, automation systems and cloud-based solutions for businesses." />
    <meta name="keywords" content="Digitalpackt, SaaS tools, automation, digital platform, cloud software" />
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:title" content="Digitalpackt – Smart SaaS Platform">
    <meta property="og:description" content="Launch and scale digital tools instantly with Digitalpackt. Secure, fast and enterprise-ready.">
    <meta property="og:type" content="website">

    <!-- Fonts & Tailwind -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 antialiased">

<!-- ================= NAVBAR ================= -->
<header class="fixed top-0 w-full bg-white/80 backdrop-blur border-b border-slate-100 z-50">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
        <a href="/" class="text-2xl font-extrabold text-blue-600">
            Digitalpackt
        </a>

        <nav class="hidden md:flex items-center space-x-8 text-sm font-semibold">
            <a href="#features" class="hover:text-blue-600">Features</a>
            <a href="#solutions" class="hover:text-blue-600">Solutions</a>
            <a href="#pricing" class="hover:text-blue-600">Pricing</a>
            <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
            <a href="{{ route('register') }}" class="px-5 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700">
                Get Started
            </a>
        </nav>
    </div>
</header>

<!-- ================= HERO ================= -->
<section class="pt-40 pb-32 text-center">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
            Build & Scale  
            <span class="text-blue-600">Digital Products Faster</span>
        </h1>

        <p class="mt-6 text-xl text-slate-500">
            Digitalpackt is a modern SaaS ecosystem delivering automation tools,
            cloud solutions and ready-to-use digital products on secure infrastructure.
        </p>

        <div class="mt-10 flex flex-col sm:flex-row justify-center gap-6">
            <a href="{{ route('register') }}"
               class="px-10 py-4 bg-blue-600 text-white rounded-2xl font-bold hover:bg-blue-700 transition">
                Get Started Free
            </a>
            <a href="#solutions"
               class="px-10 py-4 border border-slate-200 rounded-2xl font-bold hover:bg-white">
                Explore Tools
            </a>
        </div>
    </div>
</section>

<!-- ================= FEATURES ================= -->
<section id="features" class="py-28 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-20">
            <h2 class="text-4xl font-extrabold">Why Digitalpackt?</h2>
            <p class="mt-4 text-lg text-slate-500">
                Everything you need to launch scalable digital systems.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
            <div class="p-10 rounded-3xl border bg-slate-50">
                <h3 class="text-xl font-bold mb-3">Instant Deployment</h3>
                <p class="text-slate-500">
                    Launch tools instantly without manual setup or infrastructure management.
                </p>
            </div>

            <div class="p-10 rounded-3xl border bg-slate-50">
                <h3 class="text-xl font-bold mb-3">Secure Architecture</h3>
                <p class="text-slate-500">
                    Built on modern SaaS architecture with strong security practices.
                </p>
            </div>

            <div class="p-10 rounded-3xl border bg-slate-50">
                <h3 class="text-xl font-bold mb-3">Scalable Systems</h3>
                <p class="text-slate-500">
                    Designed to grow with your business from startup to enterprise.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= SOLUTIONS ================= -->
<section id="solutions" class="py-28 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-20">
            <h2 class="text-4xl font-extrabold">Available Solutions</h2>
            <p class="mt-4 text-lg text-slate-500">
                Ready-to-use digital tools for modern businesses.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
            <div class="bg-white p-10 rounded-3xl border">
                <h3 class="text-xl font-bold mb-3">Automation Tools</h3>
                <p class="text-slate-500 mb-6">
                    Simplify workflows and reduce manual operations.
                </p>
                <span class="text-blue-600 font-bold">From €0/month</span>
            </div>

            <div class="bg-white p-10 rounded-3xl border">
                <h3 class="text-xl font-bold mb-3">Business SaaS Apps</h3>
                <p class="text-slate-500 mb-6">
                    CRM, analytics and productivity systems.
                </p>
                <span class="text-blue-600 font-bold">From €19/month</span>
            </div>

            <div class="bg-white p-10 rounded-3xl border">
                <h3 class="text-xl font-bold mb-3">Enterprise Systems</h3>
                <p class="text-slate-500 mb-6">
                    Custom multi-tenant and high-scale solutions.
                </p>
                <span class="text-blue-600 font-bold">Custom Pricing</span>
            </div>
        </div>
    </div>
</section>

<!-- ================= PRICING ================= -->
<section id="pricing" class="py-28 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-20">
            <h2 class="text-4xl font-extrabold">Simple Pricing</h2>
            <p class="mt-4 text-lg text-slate-500">
                Transparent plans for every stage.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
            <div class="border p-10 rounded-3xl">
                <h3 class="font-bold text-xl mb-2">Starter</h3>
                <p class="text-4xl font-extrabold mb-6">€0</p>
                <ul class="space-y-3 text-slate-500 mb-8">
                    <li>✔ 1 Tool</li>
                    <li>✔ Basic Support</li>
                </ul>
                <a href="{{ route('register') }}" class="block text-center py-3 bg-slate-100 rounded-xl font-bold">
                    Start Free
                </a>
            </div>

            <div class="border p-10 rounded-3xl bg-blue-600 text-white scale-105">
                <h3 class="font-bold text-xl mb-2">Professional</h3>
                <p class="text-4xl font-extrabold mb-6">€49</p>
                <ul class="space-y-3 mb-8">
                    <li>✔ Unlimited Tools</li>
                    <li>✔ Priority Support</li>
                </ul>
                <a href="{{ route('register') }}" class="block text-center py-3 bg-white text-blue-600 rounded-xl font-bold">
                    Choose Plan
                </a>
            </div>

            <div class="border p-10 rounded-3xl">
                <h3 class="font-bold text-xl mb-2">Enterprise</h3>
                <p class="text-3xl font-extrabold mb-6">Custom</p>
                <ul class="space-y-3 text-slate-500 mb-8">
                    <li>✔ Dedicated SLA</li>
                    <li>✔ Custom Architecture</li>
                </ul>
                <a href="mailto:sales@digitalpackt.com" class="block text-center py-3 bg-slate-900 text-white rounded-xl font-bold">
                    Contact Sales
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-slate-900 text-slate-400 py-16">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h3 class="text-white text-2xl font-extrabold mb-4">Digitalpackt</h3>
        <p class="max-w-xl mx-auto mb-8">
            Digitalpackt is a professional SaaS and automation platform delivering
            secure, scalable digital solutions worldwide.
        </p>
        <p class="text-sm">
            © {{ date('Y') }} Digitalpackt. All rights reserved.
        </p>
    </div>
</footer>

</body>
</html>
