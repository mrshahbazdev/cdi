<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Digitalpackt – Digitale SaaS & Automatisierungsplattform</title>

<meta name="description" content="Digitalpackt ist eine professionelle SaaS- und Automatisierungsplattform für Unternehmen, Agenturen und Startups in Europa.">
<meta name="robots" content="index, follow">

<!-- Open Graph -->
<meta property="og:title" content="Digitalpackt – SaaS & Automatisierung">
<meta property="og:description" content="Digitale Tools schneller entwickeln, bereitstellen und skalieren.">
<meta property="og:type" content="website">

<!-- Performance -->
<link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
<link rel="preload" as="style" href="https://fonts.bunny.net/css?family=inter:400,600,700&display=swap">
<link href="https://fonts.bunny.net/css?family=inter:400,600,700&display=swap" rel="stylesheet">

<script src="https://cdn.tailwindcss.com" defer></script>

<style>
body { font-family: Inter, system-ui, -apple-system, sans-serif; }
</style>
</head>

<body class="bg-white text-slate-900 antialiased">

<!-- Skip Link -->
<a href="#main"
   class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 z-50 bg-white px-4 py-2 rounded shadow">
   Zum Inhalt springen
</a>

<!-- ================= HEADER ================= -->
<header role="banner" class="fixed top-0 w-full bg-white/90 backdrop-blur border-b border-slate-200 z-40">
  <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
    <a href="/" aria-label="Zur Startseite"
       class="text-xl font-extrabold text-slate-900">
      Digital<span class="text-blue-600">packt</span>
    </a>

    <nav role="navigation" aria-label="Hauptnavigation"
         class="hidden md:flex items-center gap-8 text-sm font-semibold">
      <a href="#vorteile" class="hover:text-blue-600">Vorteile</a>
      <a href="#plattform" class="hover:text-blue-600">Plattform</a>
      <a href="#preise" class="hover:text-blue-600">Preise</a>
      <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
      <a href="{{ route('register') }}"
         role="button"
         aria-label="Kostenlos registrieren"
         class="px-4 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700">
         Kostenlos starten
      </a>
    </nav>
  </div>
</header>

<!-- ================= MAIN ================= -->
<main id="main">

<!-- ================= HERO ================= -->
<section class="pt-32 pb-24 bg-gradient-to-br from-slate-50 via-white to-blue-50">
  <div class="max-w-6xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">

    <div>
      <h1 class="text-4xl md:text-6xl font-extrabold leading-tight tracking-tight">
        Digitale Produkte<br>
        <span class="text-blue-600">einfach erstellen & skalieren</span>
      </h1>

      <p class="mt-6 text-lg text-slate-600 max-w-xl">
        Digitalpackt ist eine moderne SaaS-Plattform für Automatisierung,
        Cloud-Tools und skalierbare digitale Geschäftslösungen.
      </p>

      <div class="mt-10 flex flex-wrap gap-4">
        <a href="{{ route('register') }}"
           role="button"
           aria-label="Kostenlos starten"
           class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-bold hover:bg-blue-700">
           Kostenlos starten
        </a>

        <a href="#plattform"
           role="button"
           aria-label="Plattform entdecken"
           class="px-8 py-4 rounded-2xl border border-slate-300 font-bold hover:bg-white">
           Plattform entdecken
        </a>
      </div>

      <ul class="mt-10 flex flex-wrap gap-6 text-sm text-slate-700 font-medium">
        <li>✔ DSGVO-konform</li>
        <li>✔ EU-Hosting</li>
        <li>✔ Skalierbar</li>
      </ul>
    </div>

    <div class="rounded-3xl border bg-white shadow-lg p-8">
      <h2 class="text-xl font-bold mb-4">Plattform-Highlights</h2>
      <ul class="space-y-3 text-slate-700">
        <li>• Sofortige Bereitstellung</li>
        <li>• Mehrmandanten-Architektur</li>
        <li>• Sichere Cloud-Infrastruktur</li>
        <li>• Flexible Abonnements</li>
      </ul>
    </div>

  </div>
</section>

<!-- ================= VORTEILE ================= -->
<section id="vorteile" class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-14">
      Warum Digitalpackt?
    </h2>

    <div class="grid md:grid-cols-3 gap-10">
      <div class="p-8 rounded-3xl border">
        <h3 class="font-bold text-lg mb-2">Schneller Start</h3>
        <p class="text-slate-700">
          Digitale Tools ohne Infrastruktur-Aufwand starten.
        </p>
      </div>

      <div class="p-8 rounded-3xl border">
        <h3 class="font-bold text-lg mb-2">Hohe Sicherheit</h3>
        <p class="text-slate-700">
          Enterprise-Architektur mit Fokus auf Datenschutz.
        </p>
      </div>

      <div class="p-8 rounded-3xl border">
        <h3 class="font-bold text-lg mb-2">Flexible Skalierung</h3>
        <p class="text-slate-700">
          Wachstum vom Startup bis zum Großunternehmen.
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
        Eine Plattform für digitale Geschäftsmodelle
      </h2>
      <p class="text-slate-700 mb-6">
        Digitalpackt vereint Automatisierung, SaaS-Tools und Cloud-Systeme
        in einer zentralen Plattform.
      </p>
      <ul class="space-y-3 text-slate-700">
        <li>✔ Automatisierung & Workflows</li>
        <li>✔ Business-SaaS Anwendungen</li>
        <li>✔ Enterprise-Lösungen</li>
        <li>✔ Subdomain-basierte Bereitstellung</li>
      </ul>
    </div>

    <div class="rounded-3xl bg-white border shadow p-8">
      <h3 class="font-bold text-lg mb-4">Technologie</h3>
      <ul class="space-y-2 text-slate-700">
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
    <h2 class="text-3xl font-extrabold text-center mb-14">
      Preise
    </h2>

    <div class="grid md:grid-cols-3 gap-8">
      <div class="border rounded-3xl p-8">
        <h3 class="font-bold text-lg">Starter</h3>
        <p class="text-4xl font-extrabold my-4">€0</p>
        <p class="text-slate-700">Ein Tool · Basis-Support</p>
      </div>

      <div class="border rounded-3xl p-8 bg-blue-600 text-white scale-105 shadow-lg">
        <h3 class="font-bold text-lg">Professional</h3>
        <p class="text-4xl font-extrabold my-4">€49</p>
        <p>Mehrere Tools · Prioritäts-Support</p>
      </div>

      <div class="border rounded-3xl p-8">
        <h3 class="font-bold text-lg">Enterprise</h3>
        <p class="text-3xl font-extrabold my-4">Individuell</p>
        <p class="text-slate-700">SLA · Dedizierte Systeme</p>
      </div>
    </div>
  </div>
</section>

</main>

<!-- ================= FOOTER ================= -->
<footer role="contentinfo" class="bg-slate-900 text-slate-400 pt-20 pb-10">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-12">

    <div class="md:col-span-2">
      <h3 class="text-white text-2xl font-extrabold mb-4">
        Digitalpackt
      </h3>
      <p class="max-w-md">
        Professionelle SaaS- und Automatisierungsplattform für Unternehmen
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
