<x-app-layout
    title="Professionelle SaaS Tools & Software-Plattformen | Digitalpackt"
    metaDescription="Entdecken Sie professionelle SaaS Tools und Software-Plattformen von Digitalpackt zur Automatisierung, Skalierung und zum sicheren Betrieb digitaler Produkte."
>
    {{-- ================= HEADER (UI ONLY) ================= --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/20">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div>
                    <h2 class="font-extrabold text-2xl text-gray-900 tracking-tight">
                        Explore Ecosystem
                    </h2>
                    <p class="text-[10px] font-black text-blue-600 uppercase tracking-[0.2em] mt-1">
                        Premium Development Utilities
                    </p>
                </div>
            </div>

            <div class="hidden sm:flex items-center px-4 py-2 bg-indigo-50 border border-indigo-100 rounded-xl">
                <span class="text-sm font-black text-indigo-700">
                    {{ $tools->total() }} Available {{ Str::plural('Utility', $tools->total()) }}
                </span>
            </div>
        </div>
    </x-slot>

    {{-- ================= MAIN CONTENT ================= --}}
    <div class="py-16 bg-slate-50/50 relative overflow-hidden min-h-screen">

        {{-- Background decor --}}
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-blue-100 rounded-full blur-3xl opacity-30 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-96 h-96 bg-indigo-100 rounded-full blur-3xl opacity-30 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            {{-- ================= SEO H1 + INTRO TEXT ================= --}}
            <section class="mb-16 max-w-4xl space-y-6">
                <h1 class="text-4xl font-black text-gray-900 tracking-tight">
                    Professionelle SaaS Tools & Software-Plattformen von Digitalpackt
                </h1>

                <p class="text-gray-700 leading-relaxed text-lg">
                    Digitalpackt bietet eine kuratierte Auswahl leistungsstarker
                    <strong>SaaS Tools</strong> und <strong>Software-Plattformen</strong>,
                    die Unternehmen bei der Automatisierung, Skalierung und dem sicheren
                    Betrieb digitaler Produkte unterstützen.
                </p>

                <p class="text-gray-700 leading-relaxed">
                    Unsere <strong>SaaS Plattformen</strong> sind für moderne Web-Technologien,
                    API-basierte Anwendungen und Multi-Tenant-Architekturen optimiert.
                    Jedes Tool wurde mit Fokus auf Performance, Sicherheit und
                    Skalierbarkeit entwickelt.
                </p>

                <p class="text-gray-700 leading-relaxed">
                    Ob Startups, Agenturen oder Enterprise-Unternehmen –
                    die Tools von <strong>Digitalpackt</strong> ermöglichen eine
                    professionelle Umsetzung digitaler Projekte mit flexiblen
                    Lizenzmodellen und nachhaltiger Software-Architektur.
                </p>
            </section>

            {{-- ================= SEARCH & FILTER ================= --}}
            <div class="mb-16">
                <div class="bg-white rounded-[2.5rem] shadow-[0_8px_30px_rgba(0,0,0,0.04)] p-10 border border-blue-50/50">
                    <form method="GET" action="{{ route('tools.index') }}" class="flex flex-col lg:flex-row gap-6">
                        <div class="flex-1 relative">
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Search SaaS tools and platforms…"
                                class="w-full pl-8 pr-8 py-5 bg-slate-50 border-2 border-slate-100 rounded-[1.5rem] focus:bg-white focus:border-blue-600 outline-none font-semibold"
                            >
                        </div>
                        <button type="submit"
                                class="px-12 py-5 bg-gray-900 text-white font-black rounded-[1.5rem] hover:bg-blue-600 transition">
                            Find Utility
                        </button>
                    </form>
                </div>
            </div>

            {{-- ================= TOOLS GRID (ORIGINAL UI) ================= --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($tools as $tool)
                    <div class="group bg-white rounded-[3rem] shadow hover:shadow-2xl transition-all">
                        <div class="p-10">
                            <h2 class="text-2xl font-black text-gray-900 mb-4">
                                {{ $tool->name }}
                            </h2>
                            <p class="text-gray-500 leading-relaxed mb-8">
                                {{ $tool->description }}
                            </p>
                            <a href="{{ route('tools.show', $tool) }}"
                               class="block text-center py-4 bg-gray-900 text-white rounded-xl font-black hover:bg-blue-600 transition">
                                Launch Utility
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-24">
                        <h3 class="text-3xl font-black text-gray-400">
                            No tools available
                        </h3>
                    </div>
                @endforelse
            </div>

            {{-- ================= PAGINATION ================= --}}
            @if($tools->hasPages())
                <div class="mt-20 flex justify-center">
                    {{ $tools->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
