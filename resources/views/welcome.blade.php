<!DOCTYPE html>
<html lang="de" class="scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Digitalpackt – Digitale SaaS & Automatisierungsplattform</title>
<meta name="description" content="Digitalpackt bietet professionelle SaaS-Tools, Automatisierung und digitale Plattformlösungen für Unternehmen in Europa.">
<meta name="robots" content="index, follow">

<!-- Performance -->
<link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
<link rel="preload" as="style" href="https://fonts.bunny.net/css?family=inter:400,600,700&display=swap">
<link href="https://fonts.bunny.net/css?family=inter:400,600,700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com" defer></script>

<style>
body { font-family: Inter, system-ui, sans-serif; }
</style>
</head>

<body class="bg-white text-slate-900 antialiased">

<!-- ================= NAVBAR ================= -->
<header class="fixed top-0 w-full bg-white/80 backdrop-blur border-b border-slate-200 z-50">
  <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
    <a href="/" class="text-xl font-extrabold tracking-tight text-slate-900">
      Digital<span class="text-blue-600">packt</span>
    </a>

    <nav class="hidden md:flex items-center gap-8 text-sm font-semibold">
      <a href="#vorteile" class="hover:text-blue-600">Vorteile</a>
      <a href="#plattform" class="hover:text-blue-600">Plattform</a>
      <a href="#preise" class="hover:text-blue-600">Preise</a>
      <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
      <a href="{{ route('register') }}"
         class="px-4 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700">
        Kostenlos starten
      </a>
    </nav>
  </div>
</header>

<!-- ================= HERO ================= -->
<section class="pt-32 pb-28 bg-gradient-to-br from-slate-50 via-white to-blue-50">
  <div class="max-w-6xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">
    
    <div>
      <h1 class="text-4xl md:text-6xl font-extrabold leading-tight tracking-tight">
        Digitale Produkte<br>
        <span class="text-blue-600">schneller entwickeln & skalieren</span>
      </h1>

      <p class="mt-6 text-lg text-slate-600 max-w-xl">
        Digitalpackt ist eine moderne SaaS-Plattform für Automatisierung,
        Cloud-Tools und digitale Geschäftslösungen – entwickelt für
        Unternehmen, Agenturen und Startups.
      </p>

      <div class="mt-10 flex flex-wrap gap-4">
        <a href="{{ route('register') }}"
           class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-bold hover:bg-blue-700 transition">
          Kostenlos starten
        </a>
        <a href="#plattform"
           class="px-8 py-4 rounded-2xl border border-slate-200 font-bold hover:bg-white">
          Plattform entdecken
        </a>
      </div>

      <div class="mt-10 flex items-center gap-8 text-sm text-slate-500">
        <span>✔ DSGVO-konform</span>
        <span>✔ EU-Hosting</span>
        <span>✔ Skalierbar</span>
      </div>
    </div>

    <!-- Visual Card -->
    <div class="relative">
      <div class="rounded-3xl border bg-white shadow-xl p-8">
        <p class="text-sm text-slate-500 mb-2">Plattform Übersicht</p>
        <h3 class="text-xl font-bold mb-6">Digitale Tools auf Abruf</h3>
        <ul class="space-y-4 text-slate-600">
          <li>✔ Sofortige Bereitstellung</li>
          <li>✔ Mehrmandanten-Architektur</li>
          <li>✔ Sichere Cloud-Infrastruktur</li>
          <li>✔ Flexible Abonnements</li>
        </ul>
      </div>
    </div>

  </div>
</section>

<!-- ================= VORTEILE ================= -->
<section id="vorteile" class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-4xl font-extrabold">
        Warum Digitalpackt?
      </h2>
      <p class="mt-4 text-slate-600 max-w-2xl mx-auto">
        Eine Plattform, entwickelt für langfristiges Wachstum und
        professionelle digitale Geschäftsmodelle.
      </p>
    </div>

    <div class="grid md:grid-cols-3 gap-10">
      <div class="p-8 rounded-3xl border hover:shadow-lg transition">
        <h3 class="font-bold text-lg mb-3">Schnelle Markteinführung</h3>
        <p class="text-slate-600">
          Starten Sie digitale Produkte ohne komplexe Infrastruktur.
        </p>
      </div>

      <div class="p-8 rounded-3xl border hover:shadow-lg transition">
        <h3 class="font-bold text-lg mb-3">Enterprise-Sicherheit</h3>
        <p class="text-slate-600">
          Sichere Architektur mit Fokus auf Datenschutz & Stabilität.
        </p>
      </div>

      <div class="p-8 rounded-3xl border hover:shadow-lg transition">
        <h3 class="font-bold text-lg mb-3">Flexible Skalierung</h3>
        <p class="text-slate-600">
          Von Startup bis Enterprise – alles auf einer Plattform.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ================= PLATTFORM ================= -->
<section id="plattform" class="py-24 bg-slate-50">
  <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">
    <div>
      <h2 class="text-3xl font-extrabold mb-6">
        Eine Plattform. Viele Möglichkeiten.
      </h2>
      <p class="text-slate-600 mb-6">
        Digitalpackt kombiniert Automatisierung, SaaS-Tools und Cloud-Systeme
        in einer zentralen, leistungsstarken Plattform.
      </p>

      <ul class="space-y-4 text-slate-600">
        <li>✔ Automatisierungs-Tools</li>
        <li>✔ Business-SaaS Anwendungen</li>
        <li>✔ Individuelle Enterprise-Lösungen</li>
        <li>✔ Subdomain-basierte Bereitstellung</li>
      </ul>
    </div>

    <div class="rounded-3xl bg-white border shadow-lg p-10">
      <p class="text-sm text-slate-500 mb-2">Technologie-Stack</p>
      <ul class="space-y-3 text-slate-700 font-medium">
        <li>• Moderne SaaS-Architektur</li>
        <li>• Cloud-optimiert</li>
        <li>• Hohe Verfügbarkeit</li>
        <li>• API-bereit</li>
      </ul>
    </div>
  </div>
</section>

<!-- ================= PREISE ================= -->
<section id="preise" class="py-24 bg-white">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-3xl font-extrabold">Preismodell</h2>
      <p class="mt-3 text-slate-600">Transparent. Fair. Skalierbar.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
      <div class="border rounded-3xl p-8">
        <h3 class="font-bold text-lg">Starter</h3>
        <p class="text-4xl font-extrabold my-4">€0</p>
        <p class="text-slate-600">Ein Tool · Community Support</p>
      </div>

      <div class="border rounded-3xl p-8 bg-blue-600 text-white scale-105 shadow-xl">
        <h3 class="font-bold text-lg">Professional</h3>
        <p class="text-4xl font-extrabold my-4">€49</p>
        <p>Mehrere Tools · Priorisierter Support</p>
      </div>

      <div class="border rounded-3xl p-8">
        <h3 class="font-bold text-lg">Enterprise</h3>
        <p class="text-3xl font-extrabold my-4">Individuell</p>
        <p class="text-slate-600">SLA · Dedizierte Systeme</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-slate-900 text-slate-400 pt-20 pb-10">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-12">
    <div class="md:col-span-2">
      <h3 class="text-white text-2xl font-extrabold mb-4">
        Digitalpackt
      </h3>
      <p class="max-w-md">
        Digitale SaaS- & Automatisierungsplattform für Unternehmen
        in Europa – sicher, skalierbar und zukunftssicher.
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
