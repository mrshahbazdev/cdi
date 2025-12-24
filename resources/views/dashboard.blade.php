<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-5">
                <div class="w-14 h-14 bg-white border border-slate-200 rounded-2xl flex items-center justify-center shadow-sm">
                    <span class="text-2xl font-black text-slate-900 tracking-tighter">
                        D<span class="text-blue-600">p</span>
                    </span>
                </div>
                <div>
                    <h2 class="font-black text-2xl text-slate-900 tracking-tight leading-none">
                        {{ __('Mein Workspace') }}
                    </h2>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mt-2 flex items-center">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2 animate-pulse"></span>
                        Digitalpackt Command Center
                    </p>
                </div>
            </div>
            
            <div class="hidden sm:flex items-center px-4 py-2 bg-slate-100 border border-slate-200 rounded-xl">
                <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Infrastruktur: OK</span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] min-h-screen relative overflow-hidden">
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-blue-100/50 rounded-full filter blur-3xl opacity-50 pointer-events-none animate-pulse"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-96 h-96 bg-indigo-100/50 rounded-full filter blur-3xl opacity-50 pointer-events-none animate-pulse"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="bg-slate-900 rounded-[2.5rem] p-10 md:p-14 mb-12 relative overflow-hidden shadow-2xl shadow-slate-900/20">
                <div class="absolute top-0 right-0 w-80 h-80 bg-blue-500/10 rounded-full -mr-32 -mt-32 blur-3xl"></div>
                
                <div class="flex flex-col lg:flex-row gap-10 items-center relative z-10">
                    <div class="shrink-0">
                        <div class="w-24 h-24 bg-gradient-to-tr from-blue-600 to-indigo-500 rounded-3xl flex items-center justify-center text-white shadow-lg">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 text-center lg:text-left">
                        <h1 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight mb-3">
                            Willkommen zurück, <span class="text-blue-400">{{ Auth::user()->name }}</span>!
                        </h1>
                        <p class="text-slate-400 font-medium text-lg max-w-2xl mb-8">
                            Verwalten Sie Ihre aktiven Tools, skalieren Sie Ihre Ressourcen oder starten Sie heute ein neues Projekt.
                        </p>
                        <div class="flex flex-wrap justify-center lg:justify-start gap-4">
                            <a href="{{ route('tools.index') }}" class="px-8 py-3.5 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 transition-all shadow-lg shadow-blue-600/20 active:scale-95">
                                + Neues Tool starten
                            </a>
                            <a href="{{ route('user.subscriptions.index') }}" class="px-8 py-3.5 bg-white/10 text-white rounded-xl font-bold hover:bg-white/20 transition-all border border-white/10 backdrop-blur-sm">
                                Abonnements verwalten
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                @php
                    $activeCount = Auth::user()->subscriptions()->where('status', 'active')->count();
                    $totalCount = Auth::user()->subscriptions()->count();
                @endphp
                
                <div class="bg-white border border-slate-200 p-8 rounded-[2rem] hover:border-blue-300 transition-all group">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Aktive Lizenzen</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-4xl font-black text-slate-900">{{ $activeCount }}</h3>
                        <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4" /></svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 p-8 rounded-[2rem] hover:border-blue-300 transition-all group">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Gesamt-Deployments</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-4xl font-black text-slate-900">{{ $totalCount }}</h3>
                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 p-8 rounded-[2rem] hover:border-blue-300 transition-all group">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">System-Uptime</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-4xl font-black text-slate-900">99.9%</h3>
                        <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 p-8 rounded-[2rem] hover:border-blue-300 transition-all group">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Account Status</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-black text-slate-900">Pro</h3>
                        <div class="w-10 h-10 bg-slate-900 text-white rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between mb-8">
                <h3 class="text-xl font-bold text-slate-900">Ihre Tools</h3>
                <a href="{{ route('user.subscriptions.index') }}" class="text-xs font-bold text-blue-600 hover:text-slate-900 transition-colors uppercase tracking-widest">
                    Alle anzeigen →
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $latestSubs = Auth::user()->subscriptions()->with('package.tool')->where('status', 'active')->latest()->take(3)->get();
                @endphp

                @forelse($latestSubs as $sub)
                    <div class="bg-white border border-slate-200 rounded-[2rem] p-7 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-slate-50 border border-slate-100 rounded-xl flex items-center justify-center overflow-hidden">
                                @if($sub->package->tool->logo)
                                    <img src="{{ Storage::url($sub->package->tool->logo) }}" class="h-6 w-6 object-contain" alt="">
                                @else
                                    <span class="text-lg font-bold text-slate-400">{{ strtoupper(substr($sub->package->tool->name, 0, 1)) }}</span>
                                @endif
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 leading-tight">{{ $sub->package->tool->name }}</h4>
                                <span class="text-[10px] font-bold text-blue-600 uppercase tracking-tighter">{{ $sub->package->name }}</span>
                            </div>
                        </div>

                        <div class="bg-slate-50 rounded-xl p-3 mb-6 border border-slate-100">
                            <p class="text-[10px] font-bold text-slate-400 uppercase mb-1">Domain</p>
                            <p class="text-xs font-mono text-slate-600 truncate">{{ $sub->subdomain }}.{{ $sub->package->tool->domain }}</p>
                        </div>

                        <a href="https://{{ $sub->subdomain }}.{{ $sub->package->tool->domain }}" target="_blank" 
                           class="flex items-center justify-center w-full py-3 bg-slate-100 text-slate-900 rounded-xl font-bold text-sm hover:bg-slate-900 hover:text-white transition-all">
                            Instanz öffnen
                        </a>
                    </div>
                @empty
                    <div class="col-span-full bg-white border-2 border-dashed border-slate-200 rounded-[2.5rem] p-16 text-center">
                        <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900 mb-2">Noch keine Tools aktiv</h4>
                        <p class="text-slate-500 mb-8 max-w-sm mx-auto">Starten Sie Ihr erstes Digitalpackt-Tool, um Ihren Workspace zu füllen.</p>
                        <a href="{{ route('tools.index') }}" class="inline-flex px-8 py-3 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition-all shadow-lg shadow-blue-600/20">
                            Tool-Katalog durchsuchen
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>