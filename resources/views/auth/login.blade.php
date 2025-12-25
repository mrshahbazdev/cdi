<x-guest-layout title="Anmelden" metaDescription="Loggen Sie sich bei Digitalpackt ein.">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden bg-[#f8fafc]">
        <div class="absolute top-0 -left-4 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>

        <div class="max-w-md w-full relative z-10">
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-white border border-slate-200 rounded-2xl flex items-center justify-center shadow-sm transform hover:rotate-3 transition duration-300">
                        <span class="text-2xl font-black text-slate-900 tracking-tighter">
                            D<span class="text-blue-600">p</span>
                        </span>
                    </div>
                </div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    Willkommen zurück
                </h1>
                <p class="mt-2 text-slate-500 font-medium">
                    Melden Sie sich bei <span class="text-slate-900 font-bold">Digitalpackt</span> an.
                </p>
            </div>

            <div class="bg-white/70 backdrop-blur-2xl rounded-[2.5rem] shadow-[0_20px_50px_rgba(8,_112,_184,_0.07)] p-8 sm:p-10 space-y-6 border border-white/60">
                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="p-4 bg-emerald-50 border border-emerald-100 rounded-2xl">
                        <p class="text-sm font-semibold text-emerald-700 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            {{ session('status') }}
                        </p>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div class="space-y-1.5">
                        <label for="email" class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">E-Mail Adresse</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                placeholder="ihre.mail@beispiel.de"
                                class="block w-full pl-11 pr-4 py-3.5 bg-slate-50/50 border border-slate-200 rounded-2xl text-slate-900 placeholder-slate-400 focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition duration-200 outline-none font-medium">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <div class="flex justify-between items-center ml-1">
                            <label for="password" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Passwort</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700 transition-colors">
                                    Vergessen?
                                </a>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required
                                placeholder="••••••••"
                                class="block w-full pl-11 pr-4 py-3.5 bg-slate-50/50 border border-slate-200 rounded-2xl text-slate-900 placeholder-slate-400 focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition duration-200 outline-none font-medium">
                        </div>
                    </div>

                    <div class="flex items-center">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                            <input id="remember_me" name="remember" type="checkbox"
                                class="w-5 h-5 text-blue-600 border-slate-200 rounded-lg focus:ring-blue-500/20 cursor-pointer transition-colors">
                            <span class="ml-2.5 text-sm font-semibold text-slate-600 group-hover:text-slate-900 transition-colors">
                                Angemeldet bleiben
                            </span>
                        </label>
                    </div>

                    <button type="submit" class="w-full py-4 px-6 text-white font-bold text-base rounded-2xl bg-slate-900 hover:bg-blue-600 hover:shadow-lg hover:shadow-blue-500/20 transition duration-300 flex items-center justify-center group">
                        <span>Anmelden</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </button>

                    <div class="relative py-4">
                        <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-100"></div></div>
                        <div class="relative flex justify-center text-xs uppercase tracking-tighter">
                            <span class="px-3 bg-white/0 text-slate-400 font-bold">Neu bei uns?</span>
                        </div>
                    </div>

                    <a href="{{ route('register') }}" class="w-full py-3.5 px-6 border border-slate-200 text-slate-900 font-bold text-sm rounded-2xl bg-white hover:bg-slate-50 hover:border-slate-300 transition duration-300 flex items-center justify-center">
                        Kostenloses Konto erstellen
                    </a>
                </form>
            </div>

            <div class="mt-8 flex flex-col items-center space-y-4">
                <div class="flex items-center space-x-2 text-xs font-semibold text-slate-400 bg-slate-100/50 px-4 py-2 rounded-full border border-slate-200/50">
                    <svg class="w-3.5 h-3.5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                    <span>Sichere Enterprise-Verschlüsselung</span>
                </div>
                
                <div class="flex space-x-4 text-xs font-bold text-slate-400">
                    <a href="#" class="hover:text-slate-600 transition-colors">Impressum</a>
                    <span>•</span>
                    <a href="#" class="hover:text-slate-600 transition-colors">Datenschutz</a>
                    <span>•</span>
                    <a href="#" class="hover:text-slate-600 transition-colors">Hilfe</a>
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
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</x-guest-layout>