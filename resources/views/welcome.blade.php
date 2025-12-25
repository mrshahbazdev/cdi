<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Digitalpackt – Digitale SaaS & Automatisierungsplattform</title>

    <meta name="description" content="Digitalpackt ist eine professionelle SaaS- und Automatisierungsplattform für Unternehmen, Agenturen und Startups in Europa.">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Digitalpackt – SaaS & Automatisierung">
    <meta property="og:description" content="Digitale Tools schneller entwickeln, bereitstellen und skalieren.">
    <meta property="og:type" content="website">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,600,700&display=swap" rel="stylesheet">
    <meta name="seobility" content="fd402df0ec93277527efbc1c09c8da01">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', system-ui, -apple-system, sans-serif; }
        .backdrop-blur { backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); }
    </style>
</head>

<body class="bg-white text-slate-900 antialiased">

<a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 z-50 bg-white px-4 py-2 rounded shadow border border-blue-600">
    Zum Inhalt springen
</a>

<header role="banner" class="fixed top-0 w-full bg-white/80 backdrop-blur-md border-b border-slate-200 z-50">
  <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
    
    <a href="/" aria-label="Zur Startseite" class="text-2xl font-black text-slate-900 tracking-tighter">
      Digital<span class="text-blue-600">packt</span>
    </a>

    <nav role="navigation" aria-label="Hauptnavigation" class="hidden md:flex items-center gap-1">
      <a href="#vorteile" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-blue-600 hover:bg-blue-50 transition-all">Vorteile</a>
      <a href="#plattform" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-blue-600 hover:bg-blue-50 transition-all">Plattform</a>
      <a href="#preise" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-blue-600 hover:bg-blue-50 transition-all">Preise</a>
      
      <div class="w-px h-6 bg-slate-200 mx-2"></div>
      
      <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-blue-600 transition-all">Login</a>
      <a href="{{ route('register') }}" 
         class="ml-2 px-5 py-2.5 rounded-xl bg-blue-600 text-white text-sm font-bold shadow-sm shadow-blue-200 hover:bg-blue-700 hover:shadow-lg transition-all active:scale-95">
         Kostenlos starten
      </a>
    </nav>

    <div class="md:hidden flex items-center gap-2">
      <a href="{{ route('login') }}" class="text-xs font-bold text-slate-600 px-3 py-2">Login</a>
      <a href="{{ route('register') }}" class="text-xs font-bold bg-blue-600 text-white px-4 py-2 rounded-lg">Start</a>
    </div>

  </div>
</header>

<main id="main">

<section class="pt-32 pb-24 bg-gradient-to-br from-slate-50 via-white to-blue-50">
  <div class="max-w-6xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">
    <div>
      <h1 class="text-4xl md:text-6xl font-extrabold leading-tight tracking-tight">
        Digitale Produkte<br>
        <span class="text-blue-600">einfach erstellen & skalieren</span>
      </h1>

      <p class="mt-6 text-lg text-slate-600 max-w-xl">
        Digitalpackt ist eine moderne, europaweit ausgerichtete SaaS‑Plattform, die Unternehmen,
        Agenturen und Startups dabei hilft, digitale Produkte deutlich schneller zu entwickeln,
        sicher zu betreiben und effizient zu skalieren. Unsere Lösung vereint leistungsfähige
        Automatisierungs‑Workflows, wiederverwendbare SaaS‑Bausteine und ein flexibles Subdomain‑Deployment,
        sodass Teams Infrastrukturaufwand deutlich reduzieren und sich auf die Produktinnovation
        konzentrieren können. Mit EU‑Hosting, umfassender DSGVO‑Konformität, rollenbasierter Zugriffskontrolle
        und optionalen SLA‑Paketen bieten wir ein hohes Maß an Sicherheit und Rechtssicherheit für
        sensible Geschäftsanwendungen. Digitalpackt unterstützt nahtlose API‑Integrationen, integrierte
        Abrechnung, Echtzeit‑Metriken und anpassbare Onboarding‑Flows — ideal für Proof‑of‑Concepts,
        schnell wachsende Produkte und Enterprise‑Deployments gleichermaßen.
      </p>

      <div class="mt-10 flex flex-wrap gap-4">
        <a href="{{ route('register') }}" class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-bold hover:bg-blue-700 transition-shadow hover:shadow-lg">
           Kostenlos starten
        </a>
        <a href="#plattform" class="px-8 py-4 rounded-2xl border border-slate-300 font-bold hover:bg-white transition-colors">
           Plattform entdecken
        </a>
      </div>

      <ul class="mt-10 flex flex-wrap gap-6 text-sm text-slate-700 font-medium">
        <li><span class="text-green-600">✔</span> DSGVO-konform</li>
        <li><span class="text-green-600">✔</span> EU-Hosting</li>
        <li><span class="text-green-600">✔</span> Skalierbar</li>
      </ul>
    </div>

    <div class="rounded-3xl border bg-white shadow-xl p-8 transform hover:-translate-y-1 transition-transform">
      <h2 class="text-xl font-bold mb-4">Plattform-Highlights</h2>
      <ul class="space-y-4 text-slate-700">
        <li class="flex items-center gap-3">
            <span class="w-2 h-2 bg-blue-600 rounded-full"></span> Sofortige Bereitstellung
        </li>
        <li class="flex items-center gap-3">
            <span class="w-2 h-2 bg-blue-600 rounded-full"></span> Mehrmandanten-Architektur
        </li>
        <li class="flex items-center gap-3">
            <span class="w-2 h-2 bg-blue-600 rounded-full"></span> Sichere Cloud-Infrastruktur
        </li>
        <li class="flex items-center gap-3">
            <span class="w-2 h-2 bg-blue-600 rounded-full"></span> Flexible Abonnements
        </li>
      </ul>
    </div>
  </div>
</section>

<section id="vorteile" class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-14">
      Warum Digitalpackt?
    </h2>

    <div class="grid md:grid-cols-3 gap-10">
      <div class="p-8 rounded-3xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:shadow-lg transition-all">
        <h3 class="font-bold text-lg mb-2">Schneller Start</h3>
        <p class="text-slate-700">
          Digitale Tools ohne Infrastruktur-Aufwand innerhalb weniger Minuten live bringen.
        </p>
      </div>

      <div class="p-8 rounded-3xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:shadow-lg transition-all">
        <h3 class="font-bold text-lg mb-2">Hohe Sicherheit</h3>
        <p class="text-slate-700">
          Enterprise-Architektur mit Fokus auf Datenschutz und modernste Verschlüsselung.
        </p>
      </div>

      <div class="p-8 rounded-3xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:shadow-lg transition-all">
        <h3 class="font-bold text-lg mb-2">Flexible Skalierung</h3>
        <p class="text-slate-700">
          Unsere Infrastruktur wächst mit dir – vom ersten Kunden bis zum Weltmarkt.
        </p>
      </div>
    </div>
  </div>
</section>

<section id="plattform" class="py-24 bg-slate-50">
  <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">
    <div>
      <h2 class="text-3xl font-extrabold mb-6">
        Eine Plattform für digitale Geschäftsmodelle
      </h2>
      <p class="text-slate-700 mb-6">
        Digitalpackt bündelt Automatisierung, modulare SaaS‑Tools und bewährte Cloud‑Architekturen in einer
        zentralen Plattform, die darauf ausgelegt ist, wiederkehrende Prozesse zu vereinfachen und
        operative Abläufe zu beschleunigen. Entwicklerteams profitieren von sofort einsatzbereiten
        Templates und integrationsfreundlichen APIs, Produktteams von vorkonfigurierten Workflows und
        Marketing‑Teams von zentralen Analyse‑ und Reporting‑Funktionen. Durch die Kombination aus
        Automatisierung, Observability und einfacher Multi‑Tenant‑Verwaltung minimieren Unternehmen
        die Time‑to‑Market und reduzieren gleichzeitig Betriebskosten und Sicherheitsrisiken.
      </p>
      <ul class="space-y-3 text-slate-700 font-medium">
        <li class="flex items-center gap-2"><span class="text-blue-600">✔</span> Automatisierung & Workflows</li>
        <li class="flex items-center gap-2"><span class="text-blue-600">✔</span> Business-SaaS Anwendungen</li>
        <li class="flex items-center gap-2"><span class="text-blue-600">✔</span> Enterprise-Lösungen</li>
        <li class="flex items-center gap-2"><span class="text-blue-600">✔</span> Subdomain-basierte Bereitstellung</li>
      </ul>
    </div>

    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-8">
      <h3 class="font-bold text-lg mb-4 text-blue-600">Technologie-Stack</h3>
      <ul class="space-y-3 text-slate-700">
        <li class="flex justify-between border-b border-slate-100 pb-2">
            <span>Architektur</span>
            <span class="font-semibold">Modern SaaS</span>
        </li>
        <li class="flex justify-between border-b border-slate-100 pb-2">
            <span>Hosting</span>
            <span class="font-semibold">Cloud-Optimized</span>
        </li>
        <li class="flex justify-between border-b border-slate-100 pb-2">
            <span>Uptime</span>
            <span class="font-semibold">99.9%</span>
        </li>
        <li class="flex justify-between">
            <span>Schnittstellen</span>
            <span class="font-semibold">REST API</span>
        </li>
      </ul>
    </div>
  </div>
</section>

<section id="preise" class="py-24 bg-white">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-extrabold text-center mb-14">Einfache Preisgestaltung</h2>

    <div class="grid md:grid-cols-3 gap-8">
      <div class="border rounded-3xl p-8 hover:shadow-md transition-shadow">
        <h3 class="font-bold text-lg">Starter</h3>
        <p class="text-4xl font-extrabold my-4">€0</p>
        <p class="text-slate-600 mb-6">Ein Tool · Basis-Support</p>
        <a href="#" class="block text-center py-2 border border-blue-600 text-blue-600 rounded-xl font-bold">Wählen</a>
      </div>

      <div class="border rounded-3xl p-8 bg-blue-600 text-white scale-105 shadow-2xl relative">
        <span class="absolute -top-4 left-1/2 -translate-x-1/2 bg-yellow-400 text-blue-900 text-xs font-bold px-3 py-1 rounded-full uppercase">Beliebt</span>
        <h3 class="font-bold text-lg">Professional</h3>
        <p class="text-4xl font-extrabold my-4">€49</p>
        <p class="mb-6 opacity-90">Mehrere Tools · Prioritäts-Support</p>
        <a href="#" class="block text-center py-2 bg-white text-blue-600 rounded-xl font-bold">Jetzt starten</a>
      </div>

      <div class="border rounded-3xl p-8 hover:shadow-md transition-shadow">
        <h3 class="font-bold text-lg">Enterprise</h3>
        <p class="text-3xl font-extrabold my-4">Individuell</p>
        <p class="text-slate-600 mb-6">SLA · Dedizierte Systeme</p>
        <a href="#" class="block text-center py-2 border border-slate-900 text-slate-900 rounded-xl font-bold">Kontakt</a>
      </div>
    </div>
  </div>
</section>

</main>

<footer role="contentinfo" class="bg-slate-900 text-slate-400 pt-20 pb-10">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-12">

    <div class="md:col-span-2">
      <h3 class="text-white text-2xl font-extrabold mb-4">Digitalpackt</h3>
      <p class="max-w-md">
        Professionelle SaaS‑ und Automatisierungsplattform für Unternehmen in Europa — sicher,
        skalierbar und zukunftssicher. Wir unterstützen Migrationen, bieten umfangreiche
        Integrationsmöglichkeiten für Drittsysteme und liefern transparentes Monitoring sowie
        Support‑Optionen, die Unternehmen bei ihrem Wachstum begleiten. Vertrauen, Compliance und
        Performance stehen bei uns an erster Stelle.
      </p>
    </div>

    <div>
      <h4 class="text-white font-bold mb-4">Plattform</h4>
      <ul class="space-y-2">
        <li><a href="#" class="hover:text-blue-500 transition-colors">Dashboard</a></li>
        <li><a href="#" class="hover:text-blue-500 transition-colors">Tools</a></li>
        <li><a href="#" class="hover:text-blue-500 transition-colors">Blog</a></li>
      </ul>
    </div>

    <div>
      <h4 class="text-white font-bold mb-4">Rechtliches</h4>
      <ul class="space-y-2">
        <li><a href="#" class="hover:text-blue-500 transition-colors">Impressum</a></li>
        <li><a href="#" class="hover:text-blue-500 transition-colors">Datenschutz</a></li>
        <li><a href="#" class="hover:text-blue-500 transition-colors">AGB</a></li>
      </ul>
    </div>
  </div>

  <div class="mt-12 text-center text-sm border-t border-slate-800 pt-6">
    © {{ date('Y') }} Digitalpackt. Alle Rechte vorbehalten.
  </div>
</footer>

</body>
</html>