<x-app-layout>
    {{-- META --}}
    <x-slot name="title">{{ $tool->name }} - SaaS Tool | Digital Packt</x-slot>
    <x-slot name="metaDescription">{{ $tool->short_description ?? $tool->name }}</x-slot>

    {{-- SCHEMA --}}
    <x-slot name="schema">
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "SoftwareApplication",
            "name": "{{ $tool->name }}",
            "applicationCategory": "DeveloperApplication",
            "operatingSystem": "Web"
        }
        </script>
    </x-slot>

    {{-- HEADER --}}
    <x-slot name="header">
        <h1 class="text-2xl font-black">{{ $tool->name }}</h1>
    </x-slot>

    <div class="py-16 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">

            {{-- TOOL CARD --}}
            <div class="bg-white rounded-3xl p-12 mb-16 shadow">
                <h2 class="text-4xl font-black mb-6">{{ $tool->name }}</h2>
                <p class="text-lg text-gray-600">{{ $tool->description }}</p>
            </div>

            {{-- FAQ --}}
            <div class="bg-white rounded-3xl p-12 mb-16 shadow">
                <h2 class="text-3xl font-black mb-8">FAQ</h2>

                <details open class="mb-4">
                    <summary class="font-bold cursor-pointer">Was ist {{ $tool->name }}?</summary>
                    <p class="mt-2 text-gray-600">
                        {{ $tool->name }} ist ein professionelles SaaS-Tool.
                    </p>
                </details>
            </div>

            {{-- PAKETE --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mb-20">
                @forelse($tool->packages as $package)
                    <div class="bg-white rounded-3xl p-10 shadow border">
                        <h3 class="text-2xl font-black mb-2">{{ $package->name }}</h3>
                        <p class="text-4xl font-black mb-6">€{{ number_format($package->price, 2) }}</p>

                        @auth
                            <a href="{{ route('user.subscriptions.checkout', $package) }}"
                               class="block text-center bg-blue-600 text-white py-4 rounded-xl font-black">
                                Kaufen
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="block text-center bg-gray-200 py-4 rounded-xl font-black">
                                Login erforderlich
                            </a>
                        @endauth
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-400">
                        Keine Pakete verfügbar
                    </div>
                @endforelse
            </div>

            {{-- ✅ FIX: RELATED TOOLS (NULL-SAFE) --}}
            @if(($relatedTools?->count() ?? 0) > 0)
                <div class="mb-16">
                    <h2 class="text-3xl font-black mb-10 text-center">Ähnliche Tools</h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @foreach($relatedTools as $relatedTool)
                            <a href="{{ route('tools.show', $relatedTool) }}"
                               class="bg-white p-8 rounded-3xl border hover:shadow transition">
                                <h3 class="text-xl font-bold">{{ $relatedTool->name }}</h3>
                                <p class="text-gray-600 mt-2">
                                    {{ Str::limit($relatedTool->description, 90) }}
                                </p>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- FOOTER CTA --}}
            <div class="bg-gray-900 rounded-3xl p-12 text-white flex justify-between items-center">
                <div>
                    <h4 class="text-3xl font-black mb-2">Enterprise-Lösung?</h4>
                    <p class="text-gray-400">Individuelle Architektur & SLA</p>
                </div>

                <a href="mailto:sales@cip-tools.com"
                   class="bg-white text-black px-8 py-4 rounded-xl font-black">
                    Kontakt
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
