<x-guest-layout title="Konto erstellen" metaDescription="Erstellen Sie ein kostenloses Konto bei Digitalpackt und nutzen Sie unsere praktischen Entwickler-Tools.">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden bg-[#f8fafc]">
        
        <div class="absolute top-0 -left-4 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>

        <div class="max-w-md w-full relative z-10">
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-white border border-slate-200 rounded-2xl flex items-center justify-center shadow-sm transform hover:-rotate-3 transition duration-300">
                        <span class="text-2xl font-black text-slate-900 tracking-tighter">
                            D<span class="text-blue-600">p</span>
                        </span>
                    </div>
                </div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    Neues Konto erstellen
                </h1>
                <p class="mt-2 text-slate-500 font-medium">
                    Werden Sie Teil von <span class="text-slate-900 font-bold">Digitalpackt</span>.
                </p>
            </div>

            <div class="bg-white/70 backdrop-blur-2xl rounded-[2.5rem] shadow-[0_20px_50px_rgba(8,_112,_184,_0.07)] p-8 sm:p-10 space-y-6 border border-white/60">
                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <div class="space-y-1.5">
                        <label for="name" class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Vollständiger Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                                placeholder="Max Mustermann"
                                class="block w-full pl-11 pr-4 py-3 bg-slate-50/50 border border-slate-200 rounded-2xl text-slate-900 placeholder-slate-400 focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition duration-200 outline-none font-medium text-sm">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label for="email" class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">E-Mail Adresse</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                placeholder="name@firma.de"
                                class="block w-full pl-11 pr-4 py-3 bg-slate-50/50 border border-slate-200 rounded-2xl text-slate-900 placeholder-slate-400 focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition duration-200 outline-none font-medium text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label for="password" class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Passwort</label>
                            <input id="password" type="password" name="password" required
                                placeholder="••••••••"
                                class="block w-full px-4 py-3 bg-slate-50/50 border border-slate-200 rounded-2xl text-slate-900 placeholder-slate-400 focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition duration-200 outline-none font-medium text-sm">
                        </div>
                        <div class="space-y-1.5">
                            <label for="password_confirmation" class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Bestätigen</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                placeholder="••••••••"
                                class="block w-full px-4 py-3 bg-slate-50/50 border border-slate-200 rounded-2xl text-slate-900 placeholder-slate-400 focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition duration-200 outline-none font-medium text-sm">
                        </div>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="p-4 bg-slate-50/80 rounded-2xl border border-slate-100">
                            <label class="flex items-start cursor-pointer group">
                                <input type="checkbox" name="terms" id="terms" required
                                    class="mt-1 w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500/20 transition-colors">
                                <span class="ml-3 text-xs leading-relaxed text-slate-500 font-medium group-hover:text-slate-700">
                                    Ich akzeptiere die <a target="_blank" href="{{ route('terms.show') }}" class="text-blue-600 font-bold hover:underline">Nutzungsbedingungen</a> & <a target="_blank" href="{{ route('policy.show') }}" class="text-blue-600 font-bold hover:underline">Datenschutzrichtlinien</a>.
                                </span>
                            </label>
                        </div>
                    @endif

                    <button type="submit" class="w-full py-4 px-6 text-white font-bold text-base rounded-2xl bg-slate-900 hover:bg-blue-600 hover:shadow-lg hover:shadow-blue-500/20 transition duration-300 flex items-center justify-center group">
                        <span>Konto erstellen</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>

                    <div class="relative py-2">
                        <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-100"></div></div>
                        <div class="relative flex justify-center text-[10px] uppercase font-bold tracking-widest text-slate-400">
                            <span class="px-3 bg-white/0">Bereits Mitglied?</span>
                        </div>
                    </div>

                    <a href="{{ route('login') }}" class="w-full py-3 px-6 border border-slate-200 text-slate-900 font-bold text-sm rounded-2xl bg-white hover:bg-slate-50 hover:border-slate-300 transition duration-300 flex items-center justify-center">
                        Jetzt einloggen
                    </a>
                </form>
            </div>

            <div class="mt-8 flex flex-col items-center space-y-4">
                <div class="flex items-center space-x-2 text-[10px] font-bold text-slate-400 bg-white/50 px-4 py-2 rounded-full border border-slate-200/50 uppercase tracking-tighter">
                    <svg class="w-3 h-3 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 4.908-3.367 9.036-8 10.254-4.633-1.218-8-5.346-8-10.254 0-.681.057-1.35.166-2.001zm8 2.5a1 1 0 00-1 1v3a1 1 0 102 0v-3a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <span>DSGVO-konforme Datenspeicherung</span>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
    </style>
</x-guest-layout>