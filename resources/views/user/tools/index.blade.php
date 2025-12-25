<x-app-layout>
    {{-- 1. ADD PAGE-SPECIFIC METADATA IN THE LAYOUT SLOT --}}
    <x-slot name="title">Professional Development Tools & SaaS Utilities | Digital Packt Ecosystem</x-slot>
    <x-slot name="metaDescription">Explore and launch premium development utilities, SaaS tools, and automation platforms. Find the right software solution with scalable pricing and secure provisioning.</x-slot>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/20">
                    <!-- Icon remains the same -->
                </div>
                <div>
                    <!-- 2. CHANGE MAIN PAGE TITLE TO H1 -->
                    <h1 class="font-extrabold text-2xl text-gray-900 tracking-tight">
                        {{ __('Explore Development Tools Ecosystem') }}
                    </h1>
                    <p class="text-[10px] font-black text-blue-600 uppercase tracking-[0.2em] mt-1">Premium Development Utilities & SaaS Platforms</p>
                </div>
            </div>
            <!-- Counter remains the same -->
        </div>
    </x-slot>

    <!-- Main Content -->
    <div class="py-16 bg-slate-50/50 relative overflow-hidden min-h-screen">
        <!-- Background decor remains the same -->

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- 3. ADD INTRODUCTIONAL CONTENT FOR TOPICAL AUTHORITY -->
            <section class="mb-12 max-w-4xl">
                <p class="text-lg text-gray-700 leading-relaxed">
                    Discover the <strong>Digital Packt ecosystem</strong> of professional <strong>development tools</strong>, <strong>SaaS utilities</strong>, and <strong>automation platforms</strong>. Each utility is engineered for high performance, security, and scalability, ready to launch on your custom subdomain. Filter and find the perfect tool to build, automate, and grow your digital products.
                </p>
            </section>

            <!-- Search & Filter Section (remains the same) -->
            <div class="mb-16">...</div>

            <!-- Tools Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($tools as $tool)
                    <!-- 4. WRAP EACH TOOL IN AN <article> TAG FOR SEMANTICS -->
                    <article itemscope itemtype="https://schema.org/SoftwareApplication" class="group ...">
                        <div class="p-10">
                            <!-- Logo Area -->
                            <div class="flex items-center justify-between mb-10">
                                <div class="w-20 h-20 ...">
                                    @if($tool->logo)
                                        <!-- 5. IMPROVE IMAGE ALT TEXT FOR SEO -->
                                        <img src="{{ Storage::url($tool->logo) }}"
                                             alt="Logo for {{ $tool->name }}, a {{ $tool->category ?? 'development' }} tool"
                                             itemprop="image"
                                             class="h-10 w-10 ...">
                                    @else
                                        <span ...>{{ strtoupper(substr($tool->name, 0, 1)) }}</span>
                                    @endif
                                </div>
                                <!-- Badge remains the same -->
                            </div>

                            <!-- Info Body -->
                            <h2 class="text-2xl font-black text-gray-900 ..." itemprop="name">
                                {{ $tool->name }}
                            </h2>
                            <div ... itemprop="applicationCategory">
                                <svg ...></svg>
                                {{ $tool->domain }}
                            </div>

                            <p class="text-gray-500 ..." itemprop="description">
                                {{ $tool->description ?? 'Launch this high-performance utility...' }}
                            </p>

                            <!-- Pricing Badge -->
                            <div ... itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                                <meta itemprop="priceCurrency" content="EUR" />
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col">
                                        <span ...>Starting at</span>
                                        <span ... itemprop="price">
                                            @if($tool->packages->count() > 0)
                                                €{{ number_format($tool->packages->min('price'), 2) }}
                                            @else
                                                N/A
                                            @endif
                                        </span>
                                    </div>
                                    <!-- Tiers info -->
                                </div>
                            </div>

                            <!-- 6. USE DESCRIPTIVE LINK TEXT FOR SEO -->
                            <a href="{{ route('tools.show', $tool) }}"
                               aria-label="View details and launch {{ $tool->name }}"
                               class="flex items-center justify-center w-full ...">
                                Launch {{ $tool->name }}
                                <svg ...></svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <!-- Empty state remains the same -->
                @endforelse
            </div>

            <!-- 7. ENSURE PAGINATION HAS CORRECT LINK ATTRIBUTES -->
            @if($tools->hasPages())
                <div class="mt-20 flex justify-center">
                    <div class="bg-white rounded-3xl shadow-xl p-4 border border-slate-100">
                        {{ $tools->withQueryString()->links() }}
                    </div>
                </div>
                <!-- Consider adding rel="prev/next" links via a custom pagination view -->
            @endif
        </div>
    </div>
</x-app-layout>