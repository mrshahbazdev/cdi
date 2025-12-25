<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Digitalpackt – Digitale Produkte einfach erstellen & skalieren</title>

    <meta name="description" content="Digitalpackt: Moderne SaaS-Plattform für digitale Produkte. DSGVO-konform, EU-Hosting, schnelle Bereitstellung. Jetzt kostenlos starten!">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Digitalpackt – Digitale Produkte erstellen & skalieren">
    <meta property="og:description" content="Professionelle SaaS-Plattform für Unternehmen, Agenturen und Startups. Digitale Tools schneller entwickeln, bereitstellen und skalieren.">
    <meta property="og:type" content="website">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,600,700&display=swap" rel="stylesheet">
    <meta name="seobility" content="fd402df0ec93277527efbc1c09c8da01">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', system-ui, -apple-system, sans-serif; }
        .backdrop-blur { backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); }
    </style>

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "SoftwareApplication",
      "name": "Digitalpackt",
      "applicationCategory": "BusinessApplication",
      "offers": {
        "@type": "AggregateOffer",
        "lowPrice": "0",
        "highPrice": "49",
        "priceCurrency": "EUR"
      },
      "description": "Professionelle SaaS- und Automatisierungsplattform für Unternehmen, Agenturen und Startups in Europa",
      "operatingSystem": "Web-based",
      "provider": {
        "@type": "Organization",
        "name": "Digitalpackt"
      }
    }
    </script>
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
      <a href="#anwendungsfaelle" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-blue-600 hover:bg-blue-50 transition-all">Anwendungsfälle</a>
      <a href="#plattform" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-blue-600 hover:bg-blue-50 transition-all">Plattform</a>
      <a href="#preise" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-blue-600 hover:bg-blue-50 transition-all">Preise</a>
      
      <div class="w-px h-6 bg-slate-200 mx-2"></div>
      
      @auth
        <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-blue-600 transition-all">Dashboard</a>
      @else
        <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-blue-600 transition-all">Login</a>
        <a href="{{ route('register') }}" 
           class="ml-2 px-5 py-2.5 rounded-xl bg-blue-600 text-white text-sm font-bold shadow-sm shadow-blue-200 hover:bg-blue-700 hover:shadow-lg transition-all active:scale-95">
           Kostenlos starten
        </a>
      @endauth
    </nav>

    <div class="md:hidden flex items-center gap-2">
      @auth
        <a href="{{ route('dashboard') }}" class="text-xs font-bold text-slate-600 px-3 py-2">Dashboard</a>
      @else
        <a href="{{ route('login') }}" class="text-xs font-bold text-slate-600 px-3 py-2">Login</a>
        <a href="{{ route('register') }}" class="text-xs font-bold bg-blue-600 text-white px-4 py-2 rounded-lg">Start</a>
      @endauth
    </div>

  </div>
</header>

<main id="main">

<!-- Hero Section -->
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
        Automatisierungs‑Workflows, wiederverwendbare SaaS‑Bausteine und ein flexibles 
        Subdomain‑Deployment, sodass Teams Infrastrukturaufwand deutlich reduzieren und sich 
        auf die Produktinnovation konzentrieren können.
      </p>

      <p class="mt-4 text-base text-slate-600 max-w-xl">
        Mit EU‑Hosting, umfassender DSGVO‑Konformität, rollenbasierter Zugriffskontrolle
        und optionalen SLA‑Paketen bieten wir ein hohes Maß an Sicherheit und Rechtssicherheit 
        für sensible Geschäftsanwendungen. Digitalpackt unterstützt nahtlose API‑Integrationen, 
        integrierte Abrechnung, Echtzeit‑Metriken und anpassbare Onboarding‑Flows — ideal für 
        Proof‑of‑Concepts, schnell wachsende Produkte und Enterprise‑Deployments gleichermaßen.
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

<!-- Benefits Section -->
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
          Dank vorkonfigurierter Templates und automatisierter Deployments können Sie sofort 
          mit der Entwicklung beginnen und Ihre digitalen Produkte schneller am Markt etablieren.
        </p>
      </div>

      <div class="p-8 rounded-3xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:shadow-lg transition-all">
        <h3 class="font-bold text-lg mb-2">Hohe Sicherheit</h3>
        <p class="text-slate-700">
          Enterprise-Architektur mit Fokus auf Datenschutz und modernste Verschlüsselung. 
          Alle Server befinden sich in Deutschland, unterliegen strengen EU-Datenschutzrichtlinien 
          und erfüllen höchste Compliance-Standards gemäß DSGVO und ISO-Zertifizierungen.
        </p>
      </div>

      <div class="p-8 rounded-3xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:shadow-lg transition-all">
        <h3 class="font-bold text-lg mb-2">Flexible Skalierung</h3>
        <p class="text-slate-700">
          Unsere Infrastruktur wächst mit Ihnen – vom ersten Kunden bis zum globalen Weltmarkt. 
          Automatische Ressourcen-Skalierung, Load-Balancing und 99.9% Uptime-Garantie sorgen 
          dafür, dass Ihre Anwendungen auch bei hohem Traffic performant bleiben.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Use Cases Section -->
<section id="anwendungsfaelle" class="py-24 bg-slate-50">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-14">
      Für wen ist Digitalpackt geeignet?
    </h2>

    <div class="grid md:grid-cols-3 gap-10">
      <div class="p-8 rounded-3xl border border-slate-100 bg-white hover:shadow-lg transition-all">
        <h3 class="font-bold text-xl mb-4 text-blue-600">Startups & Gründer</h3>
        <p class="text-slate-700 mb-4">
          Validieren Sie Ihre Geschäftsideen schnell mit minimalen Vorabinvestitionen. 
          Unsere Plattform ermöglicht es Ihnen, MVPs (Minimum Viable Products) innerhalb 
          von Tagen statt Monaten zu launchen, ohne sich um komplexe Infrastruktur kümmern 
          zu müssen. Erstellen und skalieren Sie digitale Produkte agil und kosteneffizient.
        </p>
        <ul class="space-y-2 text-sm text-slate-600">
          <li class="flex items-center gap-2">
            <span class="text-blue-600">→</span> Schnelle Marktvalidierung
          </li>
          <li class="flex items-center gap-2">
            <span class="text-blue-600">→</span> Kosteneffiziente Entwicklung
          </li>
          <li class="flex items-center gap-2">
            <span class="text-blue-600">→</span> Flexible Skalierung bei Wachstum
          </li>
        </ul>
      </div>

      <div class="p-8 rounded-3xl border border-slate-100 bg-white hover:shadow-lg transition-all">
        <h3 class="font-bold text-xl mb-4 text-blue-600">Agenturen & Entwickler</h3>
        <p class="text-slate-700 mb-4">
          Bieten Sie Ihren Kunden professionelle digitale Lösungen mit White-Label-Optionen. 
          Nutzen Sie unsere vorkonfigurierten Module, um Projekte schneller auszuliefern und 
          gleichzeitig höhere Margen zu erzielen. Multi-Tenant-Architektur ermöglicht die 
          Verwaltung mehrerer Kundenprojekte auf einer einzigen Plattform mit zentralem Dashboard.
        </p>
        <ul class="space-y-2 text-sm text-slate-600">
          <li class="flex items-center gap-2">
            <span class="text-blue-600">→</span> White-Label-Lösungen
          </li>
          <li class="flex items-center gap-2">
            <span class="text-blue-600">→</span> Mehrere Kundenprojekte verwalten
          </li>
          <li class="flex items-center gap-2">
            <span class="text-blue-600">→</span> Zeit- und Kostenersparnis
          </li>
        </ul>
      </div>

      <div class="p-8 rounded-3xl border border-slate-100 bg-white hover:shadow-lg transition-all">
        <h3 class="font-bold text-xl mb-4 text-blue-600">Unternehmen & Corporates</h3>
        <p class="text-slate-700 mb-4">
          Digitalisieren Sie interne Prozesse und entwickeln Sie kundenorientierte 
          Anwendungen mit Enterprise-Grade-Sicherheit. Von Automatisierungs-Tools bis 
          zu komplexen B2B-Portalen – unsere Plattform erfüllt höchste Compliance- und 
          Sicherheitsstandards gemäß DSGVO und ISO-Zertifizierungen mit dedizierten Ressourcen.
        </p>
        <ul class="space-y-2 text-sm text-slate-600">
          <li class="flex items-center gap-2">
            <span class="text-blue-600">→</span> DSGVO-konform & ISO-zertifiziert
          </li>
          <li class="flex items-center gap-2">
            <span class="text-blue-600">→</span> Dedizierte Ressourcen verfügbar
          </li>
          <li class="flex items-center gap-2">
            <span class="text-blue-600">→</span> SLA-Garantien & Premium-Support
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Platform Section -->
<section id="plattform" class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">
    <div>
      <h2 class="text-3xl font-extrabold mb-6">
        Eine Plattform für digitale Geschäftsmodelle
      </h2>
      <p class="text-slate-700 mb-6">
        Digitalpackt bündelt Automatisierung, modulare SaaS‑Tools und bewährte Cloud‑Architekturen 
        in einer zentralen Plattform, die darauf ausgelegt ist, wiederkehrende Prozesse zu 
        vereinfachen und operative Abläufe zu beschleunigen. Entwicklerteams profitieren von 
        sofort einsatzbereiten Templates und integrationsfreundlichen APIs, Produktteams von 
        vorkonfigurierten Workflows und Marketing‑Teams von zentralen Analyse‑ und 
        Reporting‑Funktionen.
      </p>
      <p class="text-slate-700 mb-6">
        Durch die Kombination aus Automatisierung, Observability und einfacher Multi‑Tenant‑Verwaltung 
        minimieren Unternehmen die Time‑to‑Market und reduzieren gleichzeitig Betriebskosten und 
        Sicherheitsrisiken. Unsere Infrastruktur basiert auf bewährten Cloud-Technologien und bietet 
        automatische Backups, 99.9% Uptime-Garantie und 24/7-Monitoring für geschäftskritische 
        Anwendungen. Skalieren Sie digitale Produkte mühelos mit unserer robusten Plattform.
      </p>
      <ul class="space-y-3 text-slate-700 font-medium">
        <li class="flex items-center gap-2"><span class="text-blue-600">✔</span> Automatisierung & Workflows</li>
        <li class="flex items-center gap-2"><span class="text-blue-600">✔</span> Business-SaaS Anwendungen</li>
        <li class="flex items-center gap-2"><span class="text-blue-600">✔</span> Enterprise-Lösungen</li>
        <li class="flex items-center gap-2"><span class="text-blue-600">✔</span> Subdomain-basierte Bereitstellung</li>
        <li class="flex items-center gap-2"><span class="text-blue-600">✔</span> API-First Architektur</li>
        <li class="flex items-center gap-2"><span class="text-blue-600">✔</span> Echtzeit-Analytics & Monitoring</li>
      </ul>
    </div>

    <div class="rounded-3xl bg-slate-50 border border-slate-200 shadow-sm p-8">
      <h3 class="font-bold text-lg mb-4 text-blue-600">Technologie-Stack</h3>
      <ul class="space-y-3 text-slate-700">
        <li class="flex justify-between border-b border-slate-100 pb-2">
            <span>Architektur</span>
            <span class="font-semibold">Modern SaaS</span>
        </li>
        <li class="flex justify-between border-b border-slate-100 pb-2">
            <span>Hosting</span>
            <span class="font-semibold">Cloud-Optimized EU</span>
        </li>
        <li class="flex justify-between border-b border-slate-100 pb-2">
            <span>Uptime</span>
            <span class="font-semibold">99.9%</span>
        </li>
        <li class="flex justify-between border-b border-slate-100 pb-2">
            <span>Schnittstellen</span>
            <span class="font-semibold">REST API</span>
        </li>
        <li class="flex justify-between border-b border-slate-100 pb-2">
            <span>Sicherheit</span>
            <span class="font-semibold">DSGVO-konform</span>
        </li>
        <li class="flex justify-between">
            <span>Support</span>
            <span class="font-semibold">24/7 verfügbar</span>
        </li>
      </ul>

      <div class="mt-6 p-4 bg-blue-50 rounded-xl">
        <p class="text-sm text-slate-700">
          <strong class="text-blue-600">Tipp:</strong> Unsere Plattform unterstützt nahtlose 
          Integrationen mit über 100+ Tools und Services. Erstellen Sie komplexe Workflows 
          ohne eine einzige Zeile Code zu schreiben.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Features Grid -->
<section class="py-24 bg-slate-50">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-14">
      Leistungsmerkmale der Plattform
    </h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
      <div class="p-6 bg-white rounded-2xl border border-slate-100 hover:shadow-md transition-all">
        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
          <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
          </svg>
        </div>
        <h3 class="font-bold mb-2">Automatisierung</h3>
        <p class="text-sm text-slate-600">
          Erstellen Sie komplexe Workflows und automatisieren Sie wiederkehrende Aufgaben.
        </p>
      </div>

      <div class="p-6 bg-white rounded-2xl border border-slate-100 hover:shadow-md transition-all">
        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4">
          <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
          </svg>
        </div>
        <h3 class="font-bold mb-2">Sicherheit</h3>
        <p class="text-sm text-slate-600">
          Enterprise-Grade Sicherheit mit SSL, Verschlüsselung und regelmäßigen Audits.
        </p>
      </div>

      <div class="p-6 bg-white rounded-2xl border border-slate-100 hover:shadow-md transition-all">
        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
          <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
          </svg>
        </div>
        <h3 class="font-bold mb-2">Analytics</h3>
        <p class="text-sm text-slate-600">
          Echtzeit-Einblicke in Nutzung, Performance und Geschäftskennzahlen.
        </p>
      </div>

      <div class="p-6 bg-white rounded-2xl border border-slate-100 hover:shadow-md transition-all">
        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mb-4">
          <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
          </svg>
        </div>
        <h3 class="font-bold mb-2">Integrationen</h3>
        <p class="text-sm text-slate-600">
          Verbinden Sie über 100+ Tools und Services über unsere REST API.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Pricing Section -->
<section id="preise" class="py-24 bg-white">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-extrabold text-center mb-4">Einfache, transparente Preisgestaltung</h2>
    <p class="text-center text-slate-600 mb-14 max-w-2xl mx-auto">
      Wählen Sie das passende Paket für Ihre Bedürfnisse. Alle Pläne beinhalten 
      EU-Hosting, DSGVO-Konformität und können jederzeit angepasst werden.
    </p>

    <div class="grid md:grid-cols-3 gap-8">
      <div class="border rounded-3xl p-8 hover:shadow-md transition-shadow">
        <h3 class="font-bold text-lg">Starter</h3>
        <p class="text-4xl font-extrabold my-4">€0<span class="text-base font-normal text-slate-600">/Monat</span></p>
        <p class="text-slate-600 mb-6">Perfekt zum Testen und für kleine Projekte</p>
        <ul class="space-y-3 mb-8 text-sm text-slate-700">
          <li class="flex items-center gap-2">
            <span class="text-green-600">✓</span> 1 digitales Produkt
          </li>
          <li class="flex items-center gap-2">
            <span class="text-green-600">✓</span> Basis-Support
          </li>
          <li class="flex items-center gap-2">
            <span class="text-green-600">✓</span> 10 GB Speicher
          </li>
          <li class="flex items-center gap-2">
            <span class="text-green-600">✓</span> DSGVO-konform
          </li>
        </ul>
        <a href="{{ route('register') }}" class="block text-center py-3 border-2 border-blue-600 text-blue-600 rounded-xl font-bold hover:bg-blue-50 transition-colors">
          Kostenlos starten
        </a>
      </div>

      <div class="border-2 border-blue-600 rounded-3xl p-8 bg-blue-600 text-white scale-105 shadow-2xl relative">
        <span class="absolute -top-4 left-1/2 -translate-x-1/2 bg-yellow-400 text-blue-900 text-xs font-bold px-3 py-1 rounded-full uppercase">
          Beliebt
        </span>
        <h3 class="font-bold text-lg">Professional</h3>
        <p class="text-4xl font-extrabold my-4">€49<span class="text-base font-normal opacity-90">/Monat</span></p>
        <p class="mb-6 opacity-90">Für wachsende Unternehmen und Agenturen</p>
        <ul class="space-y-3 mb-8 text-sm">
          <li class="flex items-center gap-2">
            <span>✓</span> Unbegrenzte digitale Produkte
          </li>
          <li class="flex items-center gap-2">
            <span>✓</span> Prioritäts-Support (24h Response)
          </li>
          <li class="flex items-center gap-2">
            <span>✓</span> 100 GB Speicher
          </li>
          <li class="flex items-center gap-2">
            <span>✓</span> White-Label-Option
          </li>
          <li class="flex items-center gap-2">
            <span>✓</span> Erweiterte Analytics
          </li>
          <li class="flex items-center gap-2">
            <span>✓</span> API-Zugang
          </li>
        </ul>
        <a href="{{ route('register') }}" class="block text-center py-3 bg-white text-blue-600 rounded-xl font-bold hover:shadow-lg transition-all">
          Jetzt starten
        </a>
      </div>

      <div class="border rounded-3xl p-8 hover:shadow-md transition-shadow">
        <h3 class="font-bold text-lg">Enterprise</h3>
        <p class="text-3xl font-extrabold my-4">Individuell</p>
        <p class="text-slate-600 mb-6">Maßgeschneiderte Lösungen für große Unternehmen</p>
        <ul class="space-y-3 mb-8 text-sm text-slate-700">
          <li class="flex items-center gap-2">
            <span class="text-green-600">✓</span> Alle Professional-Features
          </li>
          <li class="flex items-center gap-2">
            <span class="text-green-600">✓</span> SLA-Garantien (99.9% Uptime)
          </li>
          <li class="flex items-center gap-2">
            <span class="text-green-600">✓</span> Dedizierte Ressourcen
          </li>
          <li class="flex items-center gap-2">
            <span class="text-green-600">✓</span> Premium-Support 24/7
          </li>
          <li class="flex items-center gap-2">
            <span class="text-green-600">✓</span> Custom Integrationen
          </li>
          <li class="flex items-center gap-2">
            <span class="text-green-600">✓</span> Schulungen & Onboarding
          </li>
        </ul>
        <a href="mailto:contact@digitalpackt.de" class="block text-center py-3 border-2 border-slate-900 text-slate-900 rounded-xl font-bold hover:bg-slate-900 hover:text-white transition-colors">
          Kontakt aufnehmen
        </a>
      </div>
    </div>

    <div class="mt-12 text-center">
      <p class="text-sm text-slate-600">
        Alle Preise zzgl. MwSt. • Jederzeit kündbar • Keine Setup-Gebühren • 14 Tage Geld-zurück-Garantie
      </p>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="py-24 bg-slate-50">
  <div class="max-w-4xl mx-auto px-6">
    <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-14">
      Häufig gestellte Fragen
    </h2>

    <div class="space-y-6">
      <div class="bg-white p-6 rounded-2xl border border-slate-100">
        <h3 class="font-bold text-lg mb-2">Wie schnell kann ich digitale Produkte erstellen?</h3>
        <p class="text-slate-700">
          Mit Digitalpackt können Sie innerhalb weniger Minuten loslegen. Unsere Plattform bietet 
          vorkonfigurierte Templates und automatisierte Deployments, sodass Sie sich auf die 
          Entwicklung Ihrer Geschäftslogik konzentrieren können, anstatt sich mit Infrastruktur zu befassen.
        </p>
      </div>

      <div class="bg-white p-6 rounded-2xl border border-slate-100">
        <h3 class="font-bold text-lg mb-2">Ist Digitalpackt DSGVO-konform?</h3>
        <p class="text-slate-700">
          Ja, absolut. Alle unsere Server befinden sich in Deutschland und unterliegen strengen 
          EU-Datenschutzrichtlinien. Wir bieten vollständige DSGVO-Konformität, 
          Datenverarbeitungsverträge (AVV) und regelmäßige Sicherheitsaudits.
        </p>
      </div>

      <div class="bg-white p-6 rounded-2xl border border-slate-100">
        <h3 class="font-bold text-lg mb-2">Kann ich meine bestehenden Tools integrieren?</h3>
        <p class="text-slate-700">
          Definitiv! Digitalpackt bietet eine REST API und unterstützt über 100+ Integrationen 
          mit gängigen Business-Tools. Von CRM-Systemen über Payment-Provider bis zu 
          Marketing-Automation – Sie können nahtlos Ihre bestehende Tool-Landschaft anbinden.
        </p>
      </div>

      <div class="bg-white p-6 rounded-2xl border border-slate-100">
        <h3 class="font-bold text-lg mb-2">Wie funktioniert die Skalierung?</h3>
        <p class="text-slate-700">
          Unsere Cloud-Infrastruktur skaliert automatisch mit Ihrem Wachstum. Sie zahlen nur 
          für die Ressourcen, die Sie tatsächlich nutzen. Bei steigender Last werden automatisch 
          zusätzliche Kapazitäten bereitgestellt, um optimale Performance zu gewährleisten.
        </p>
      </div>

      <div class="bg-white p-6 rounded-2xl border border-slate-100">
        <h3 class="font-bold text-lg mb-2">Welchen Support bietet Digitalpackt?</h3>
        <p class="text-slate-700">
          Je nach gewähltem Paket erhalten Sie E-Mail-Support, Prioritäts-Support mit 24h 
          Response-Zeit oder 24/7 Premium-Support. Zusätzlich bieten wir umfangreiche 
          Dokumentation, Video-Tutorials und für Enterprise-Kunden persönliche Schulungen an.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-gradient-to-br from-blue-600 to-blue-700 text-white">
  <div class="max-w-4xl mx-auto px-6 text-center">
    <h2 class="text-3xl md:text-5xl font-extrabold mb-6">
      Bereit, Ihre digitalen Produkte zu skalieren?
    </h2>
    <p class="text-xl mb-10 text-blue-100">
      Starten Sie noch heute kostenlos und erleben Sie, wie einfach es ist, 
      professionelle SaaS-Lösungen zu entwickeln und zu betreiben.
    </p>
    <div class="flex flex-wrap gap-4 justify-center">
      <a href="{{ route('register') }}" 
         class="px-10 py-4 bg-white text-blue-600 rounded-2xl font-bold text-lg hover:shadow-2xl transition-all transform hover:-translate-y-1">
        Kostenlos starten
      </a>
      <a href="#preise" 
         class="px-10 py-4 border-2 border-white text-white rounded-2xl font-bold text-lg hover:bg-white/10 transition-all">
        Preise ansehen
      </a>
    </div>
    <p class="mt-8 text-sm text-blue-100">
      Keine Kreditkarte erforderlich • 14 Tage Geld-zurück-Garantie
    </p>
  </div>
</section>

<!-- Trust Badges Section -->
<section class="py-16 bg-white border-t border-slate-200">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid md:grid-cols-4 gap-8 text-center">
      <div>
        <div class="text-4xl font-extrabold text-blue-600 mb-2">99.9%</div>
        <p class="text-sm text-slate-600">Uptime-Garantie</p>
      </div>
      <div>
        <div class="text-4xl font-extrabold text-blue-600 mb-2">24/7</div>
        <p class="text-sm text-slate-600">Monitoring & Support</p>
      </div>
      <div>
        <div class="text-4xl font-extrabold text-blue-600 mb-2">DSGVO</div>
        <p class="text-sm text-slate-600">100% Konform</p>
      </div>
      <div>
        <div class="text-4xl font-extrabold text-blue-600 mb-2">ISO</div>
        <p class="text-sm text-slate-600">Zertifiziert</p>
      </div>
    </div>
  </div>
</section>

</main>

<!-- Footer -->
<footer role="contentinfo" class="bg-slate-900 text-slate-400 pt-20 pb-10">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-12">

    <div class="md:col-span-2">
      <h3 class="text-white text-2xl font-extrabold mb-4">Digitalpackt</h3>
      <p class="max-w-md mb-6">
        Professionelle SaaS‑ und Automatisierungsplattform für Unternehmen in Europa — sicher,
        skalierbar und zukunftssicher. Wir unterstützen Migrationen, bieten umfangreiche
        Integrationsmöglichkeiten für Drittsysteme und liefern transparentes Monitoring sowie
        Support‑Optionen, die Unternehmen bei ihrem Wachstum begleiten. Vertrauen, Compliance und
        Performance stehen bei uns an erster Stelle. Unsere Server befinden sich ausschließlich 
        in Deutschland und unterliegen strengen EU-Datenschutzrichtlinien.
      </p>
      <p class="text-sm text-slate-500">
        Digitalpackt hilft Ihnen dabei, digitale Produkte einfach zu erstellen, sicher zu betreiben 
        und effizient zu skalieren – von der ersten Idee bis zum globalen Erfolg.
      </p>
    </div>

    <div>
      <h4 class="text-white font-bold mb-4">Plattform</h4>
      <ul class="space-y-2">
        <li><a href="#vorteile" class="hover:text-blue-400 transition-colors">Vorteile</a></li>
        <li><a href="#anwendungsfaelle" class="hover:text-blue-400 transition-colors">Anwendungsfälle</a></li>
        <li><a href="#plattform" class="hover:text-blue-400 transition-colors">Features</a></li>
        <li><a href="#preise" class="hover:text-blue-400 transition-colors">Preise</a></li>
        <li><a href="{{ route('login') }}" class="hover:text-blue-400 transition-colors">Login</a></li>
        <li><a href="{{ route('register') }}" class="hover:text-blue-400 transition-colors">Registrieren</a></li>
      </ul>
    </div>

    <div>
      <h4 class="text-white font-bold mb-4">Rechtliches</h4>
      <ul class="space-y-2">
        <li><a href="#" class="hover:text-blue-400 transition-colors">Impressum</a></li>
        <li><a href="#" class="hover:text-blue-400 transition-colors">Datenschutz</a></li>
        <li><a href="#" class="hover:text-blue-400 transition-colors">AGB</a></li>
        <li><a href="#" class="hover:text-blue-400 transition-colors">Cookie-Richtlinie</a></li>
      </ul>

      <h4 class="text-white font-bold mb-4 mt-8">Ressourcen</h4>
      <ul class="space-y-2">
        <li><a href="#" class="hover:text-blue-400 transition-colors">Dokumentation</a></li>
        <li><a href="#" class="hover:text-blue-400 transition-colors">API-Referenz</a></li>
        <li><a href="#" class="hover:text-blue-400 transition-colors">Blog</a></li>
        <li><a href="#" class="hover:text-blue-400 transition-colors">Status</a></li>
      </ul>
    </div>
  </div>

  <div class="max-w-7xl mx-auto px-6 mt-12 pt-8 border-t border-slate-800">
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
      <p class="text-sm text-center md:text-left">
        © @php echo date('Y'); @endphp Digitalpackt. Alle Rechte vorbehalten. Made with ❤️ in Germany.
      </p>
      <div class="flex gap-6">
        <a href="#" class="hover:text-blue-400 transition-colors" aria-label="LinkedIn">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
          </svg>
        </a>
        <a href="#" class="hover:text-blue-400 transition-colors" aria-label="Twitter">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
          </svg>
        </a>
        <a href="#" class="hover:text-blue-400 transition-colors" aria-label="GitHub">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
          </svg>
        </a>
      </div>
    </div>
  </div>
</footer>

</body>
</html>