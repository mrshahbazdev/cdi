<!DOCTYPE html>
<html lang="de" class="scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- ================= SEO ================= -->
<title>Digitalpackt – SaaS & Digitale Automatisierungsplattform</title>
<meta name="description" content="Digitalpackt ist eine moderne SaaS-Plattform für digitale Tools, Automatisierung und skalierbare Cloud-Lösungen für Unternehmen.">
<meta name="robots" content="index, follow">

<!-- ================= PERFORMANCE ================= -->
<link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
<link rel="preload" as="style" href="https://fonts.bunny.net/css?family=inter:400,600,700&display=swap">
<link href="https://fonts.bunny.net/css?family=inter:400,600,700&display=swap" rel="stylesheet">

<script src="https://cdn.tailwindcss.com" defer></script>

<style>
body { font-family: 'Inter', system-ui, sans-serif; }
</style>
</head>

<body class="bg-slate-50 text-slate-900 antialiased">

<!-- ================= NAVBAR ================= -->
<header class="fixed top-0 w-full bg-white/90 backdrop-blur border-b border-slate-200 z-50">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
        <a href="/" class="text-xl font-extrabold text-blue-600">
            Digitalpackt
        </a>

        <nav class="hidden md:flex gap-8 text-sm font-semibold">
            <a href="#funktionen" class="hover:text-blue-600">Funktionen</a>
            <a href="#loesungen" class="hover:text-blue-600">Lösungen</a>
            <a href="#preise" class="hover:text-blue-600">Preise</a>
            <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700">
                Starten
            </a>
        </nav>
    </div>
</header>

<!-- ================= HERO (LCP OPTIMIZED) ================= -->
<section class="pt-28 pb-24 text-center">
    <div class="max-w-3xl mx-auto px-6">
        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">
            Digitale Tools  
            <span class="text-blue-600">einfach erstellen & skalieren</span>
        </h1>

        <p class="mt-5 text-lg text-slate-500">
            Digitalpackt ist eine leistungsstarke SaaS-Plattform für Automatisierung,
            Cloud-Tools und digitale Geschäftslösungen – sicher, schnell und skalierbar.
        </p>

        <div class="mt-8 flex justify-center gap-5">
            <a href="{{ route('register') }}"
               class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-bold hover:bg-blue-700">
                Kostenlos starten
            </a>
            <a href="#loesungen"
               class="px-8 py-4 border border-slate-200 rounded-2xl font-bold hover:bg-white">
                Tools entdecken
            </a>
        </div>
    </div>
</section>

<!-- ================= FUNKTIONEN ================= -->
<section id="funktionen" class="py-20 bg-white">
<div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-16">
        <h2 class="text-3xl font-extrabold">Warum Digitalpackt?</h2>
        <p class="mt-3 text-slate-500">Moderne Technologie für moderne Unternehmen</p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        <div class="p-8 rounded-3xl border bg-slate-50">
            <h3 class="font-bold text-lg mb-2">Sofortige Bereitstellung</h3>
            <p class="text-slate-500">Tools sofort einsatzbereit – ohne Setup.</p>
        </div>

        <div class="p-8 rounded-3xl border bg-slate-50">
            <h3 class="font-bold text-lg mb-2">Sichere Architektur</h3>
            <p class="text-slate-500">Mehrmandantenfähig & DSGVO-konform.</p>
        </div>

        <div class="p-8 rounded-3xl border bg-slate-50">
            <h3 class="font-bold text-lg mb-2">Skalierbar</h3>
            <p class="text-slate-500">Wächst mit Ihrem Unternehmen.</p>
        </div>
    </div>
</div>
</section>

<!-- ================= LÖSUNGEN ================= -->
<section id="loesungen" class="py-20 bg-slate-50">
<div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-16">
        <h2 class="text-3xl font-extrabold">Unsere Lösungen</h2>
        <p class="mt-3 text-slate-500">Digitale Werkzeuge für jeden Bedarf</p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-3xl border">
            <h3 class="font-bold text-lg mb-2">Automatisierung</h3>
            <p class="text-slate-500">Workflows automatisieren & Zeit sparen.</p>
        </div>

        <div class="bg-white p-8 rounded-3xl border">
            <h3 class="font-bold text-lg mb-2">Business SaaS</h3>
            <p class="text-slate-500">CRM, Analyse & Produktivität.</p>
        </div>

        <div class="bg-white p-8 rounded-3xl border">
            <h3 class="font-bold text-lg mb-2">Enterprise Systeme</h3>
            <p class="text-slate-500">Individuelle Großlösungen.</p>
        </div>
    </div>
</div>
</section>

<!-- ================= PREISE ================= -->
<section id="preise" class="py-20 bg-white">
<div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-16">
        <h2 class="text-3xl font-extrabold">Preise</h2>
        <p class="mt-3 text-slate-500">Transparent & fair</p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        <div class="border p-8 rounded-3xl">
            <h3 class="font-bold text-lg">Starter</h3>
            <p class="text-4xl font-extrabold my-4">€0</p>
            <p class="text-slate-500">Ein Tool · Basis Support</p>
        </div>

        <div class="border p-8 rounded-3xl bg-blue-600 text-white scale-105">
            <h3 class="font-bold text-lg">Professional</h3>
            <p class="text-4xl font-extrabold my-4">€49</p>
            <p>Unbegrenzte Tools · Priorität Support</p>
        </div>

        <div class="border p-8 rounded-3xl">
            <h3 class="font-bold text-lg">Enterprise</h3>
            <p class="text-3xl font-extrabold my-4">Individuell</p>
            <p class="text-slate-500">SLA & dedizierte Systeme</p>
        </div>
    </div>
</div>
</section>

<!-- ================= FOOTER (NEW, ENTERPRISE) ================= -->
<footer class="bg-slate-900 text-slate-400 pt-20 pb-10">
<div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-12">

    <div class="md:col-span-2">
        <h3 class="text-white text-2xl font-extrabold mb-4">Digitalpackt</h3>
        <p class="max-w-md">
            Digitalpackt ist eine professionelle SaaS- und Automatisierungsplattform
            für Unternehmen, Agenturen und Entwickler.
        </p>
    </div>

    <div>
        <h4 class="text-white font-bold mb-4">Plattform</h4>
        <ul class="space-y-2">
            <li><a href="#" class="hover:text-blue-500">Dashboard</a></li>
            <li><a href="#" class="hover:text-blue-500">Tools</a></li>
            <li><a href="#" class="hover:text-blue-500">Blog</a></li>
        </ul>
    </div>

    <div>
        <h4 class="text-white font-bold mb-4">Rechtliches</h4>
        <ul class="space-y-2">
            <li><a href="#" class="hover:text-blue-500">Impressum</a></li>
            <li><a href="#" class="hover:text-blue-500">Datenschutz</a></li>
            <li><a href="#" class="hover:text-blue-500">AGB</a></li>
        </ul>
    </div>
</div>

<div class="mt-12 text-center text-sm border-t border-slate-800 pt-6">
    © {{ date('Y') }} Digitalpackt. Alle Rechte vorbehalten.
</div>
</footer>

</body>
</html>
