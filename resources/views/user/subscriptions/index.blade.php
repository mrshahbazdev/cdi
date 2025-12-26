<x-app-layout>
    {{-- ================= HEADER ================= --}}
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-600 to-blue-600 flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                    </svg>
                </div>

                <div>
                    <h2 class="text-2xl font-extrabold text-gray-900">
                        Active Portfolio
                    </h2>
                    <p class="text-xs font-semibold text-indigo-600 tracking-widest uppercase">
                        Managed Tools & Licenses
                    </p>
                </div>
            </div>

            <div class="hidden sm:flex px-5 py-2 rounded-xl bg-indigo-50 border border-indigo-100">
                <span class="text-sm font-black text-indigo-700">
                    {{ $subscriptions->total() }}
                    {{ Str::plural('Active License', $subscriptions->total()) }}
                </span>
            </div>
        </div>
    </x-slot>

    {{-- ================= CONTENT ================= --}}
    <div class="py-14 bg-gradient-to-br from-slate-50 to-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

            @forelse($subscriptions as $subscription)
                <div
                    class="group bg-white/80 backdrop-blur-xl border border-slate-200 rounded-[2rem]
                           shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden">

                    <div class="p-8 lg:p-10">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                            {{-- ===== LEFT ===== --}}
                            <div class="flex items-center gap-6 flex-1">
                                <div class="relative">
                                    <div
                                        class="w-20 h-20 rounded-3xl bg-gradient-to-br from-indigo-50 to-blue-50
                                               border border-indigo-100 flex items-center justify-center
                                               group-hover:scale-110 transition">
                                        @if($subscription->package->tool->logo)
                                            <img src="{{ Storage::url($subscription->package->tool->logo) }}"
                                                 class="w-12 h-12 object-contain"
                                                 alt="{{ $subscription->package->tool->name }}">
                                        @else
                                            <i class="fas fa-cube text-indigo-600 text-3xl"></i>
                                        @endif
                                    </div>

                                    <span
                                        class="absolute -bottom-1 -right-1 w-6 h-6 rounded-lg bg-white
                                               border border-indigo-100 flex items-center justify-center shadow">
                                        <i class="fas fa-certificate text-indigo-600 text-[10px]"></i>
                                    </span>
                                </div>

                                <div>
                                    <h3 class="text-2xl font-black text-gray-900 group-hover:text-indigo-600 transition">
                                        {{ $subscription->package->tool->name }}
                                    </h3>

                                    <div class="flex flex-wrap items-center gap-4 mt-2">
                                        <span
                                            class="px-3 py-1 text-[10px] font-black uppercase tracking-widest
                                                   rounded-md bg-slate-100 text-slate-500">
                                            {{ $subscription->package->name }}
                                        </span>

                                        <span class="text-xs font-semibold text-slate-400">
                                            Started {{ $subscription->created_at->format('M d, Y') }}
                                        </span>
                                    </div>

                                    @if($subscription->subdomain)
                                        <a href="https://{{ $subscription->subdomain }}.{{ $subscription->package->tool->domain }}"
                                           target="_blank"
                                           class="inline-flex items-center mt-3 text-sm font-bold text-indigo-600 hover:underline">
                                            <i class="fas fa-external-link-alt mr-2 text-xs"></i>
                                            {{ $subscription->subdomain }}.{{ $subscription->package->tool->domain }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            {{-- ===== RIGHT ===== --}}
                            <div class="flex flex-col items-start lg:items-end gap-4">

                                @php
                                    $statusMap = [
                                        'active' => 'bg-green-100 text-green-700',
                                        'expired' => 'bg-red-100 text-red-700',
                                        'cancelled' => 'bg-gray-100 text-gray-600',
                                        'pending' => 'bg-orange-100 text-orange-700',
                                        'upgraded' => 'bg-indigo-100 text-indigo-700',
                                    ];
                                @endphp

                                <span
                                    class="px-5 py-2 rounded-2xl text-xs font-black uppercase tracking-widest
                                           {{ $statusMap[$subscription->status] ?? 'bg-gray-100 text-gray-600' }}">
                                    {{ $subscription->status }}
                                </span>

                                @if($subscription->status === 'active' && $subscription->expires_at)
                                    <p class="text-xs font-semibold text-slate-400">
                                        Expires {{ $subscription->expires_at->diffForHumans() }}
                                    </p>
                                @endif

                                <div class="flex flex-wrap gap-3 mt-2">
                                    @if($subscription->status === 'active')
                                        <a href="{{ route('user.subscriptions.upgrade', $subscription) }}"
                                           class="px-6 py-3 rounded-xl bg-indigo-600 text-white
                                                  text-xs font-black hover:bg-indigo-700 transition shadow">
                                            <i class="fas fa-arrow-up mr-2"></i> Upgrade
                                        </a>

                                        <a href="#"
                                           class="px-6 py-3 rounded-xl bg-slate-900 text-white
                                                  text-xs font-black hover:bg-indigo-600 transition shadow">
                                            Manage
                                        </a>
                                    @else
                                        <a href="{{ route('tools.show', $subscription->package->tool) }}"
                                           class="px-6 py-3 rounded-xl bg-gradient-to-r from-indigo-600 to-blue-600
                                                  text-white text-xs font-black shadow hover:shadow-xl transition">
                                            Renew License
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                {{-- EMPTY STATE --}}
                <div class="text-center py-24">
                    <div class="max-w-xl mx-auto bg-white/80 backdrop-blur-xl rounded-[3rem]
                                border-2 border-dashed border-indigo-200 p-16 shadow-xl">
                        <div
                            class="w-24 h-24 mx-auto rounded-full bg-indigo-50 flex items-center justify-center mb-8">
                            <i class="fas fa-box-open text-indigo-400 text-4xl"></i>
                        </div>

                        <h3 class="text-3xl font-black text-gray-900 mb-4">
                            No Active Licenses
                        </h3>

                        <p class="text-lg text-slate-500 mb-10">
                            Start by activating powerful tools designed to scale your workflow.
                        </p>

                        <a href="{{ route('tools.index') }}"
                           class="inline-flex items-center px-10 py-4 rounded-2xl
                                  bg-gradient-to-r from-indigo-600 to-blue-600
                                  text-white font-black shadow-xl hover:shadow-2xl transition">
                            <i class="fas fa-rocket mr-3"></i> Browse Tools
                        </a>
                    </div>
                </div>
            @endforelse

            {{-- PAGINATION --}}
            @if($subscriptions->hasPages())
                <div class="flex justify-center pt-10">
                    <div class="bg-white rounded-2xl shadow-lg p-4 border">
                        {{ $subscriptions->links() }}
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
