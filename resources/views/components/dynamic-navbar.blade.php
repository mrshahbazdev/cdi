@php
    $settings = \App\Models\Setting::first();
@endphp

<nav x-data="{ open: false }"
     class="bg-white/80 backdrop-blur-lg border-b shadow-sm sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between h-20 items-center">

            {{-- ================= LEFT: LOGO / SITE NAME ================= --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                @if($settings?->site_logo)
                    <img src="{{ Storage::url($settings->site_logo) }}"
                         alt="{{ $settings->site_name ?? config('app.name') }}"
                         class="h-10 w-auto object-contain transition-transform group-hover:scale-105">
                @else
                    <span class="text-xl font-black tracking-tight text-gray-900 group-hover:text-blue-600 transition">
                        {{ $settings->site_name ?? config('app.name') }}
                    </span>
                @endif
            </a>

            {{-- ================= CENTER: DESKTOP MENU ================= --}}
            <div class="hidden md:flex items-center gap-12">

                @foreach($items as $item)
                    <div class="relative group">

                        {{-- Parent Link --}}
                        <a href="{{ $item->url ?: '#' }}"
                           class="uppercase tracking-widest font-black text-sm
                                  text-gray-700 hover:text-blue-600
                                  inline-flex items-center gap-2 transition">

                            {{ $item->title }}

                            @if($item->children->count())
                                <svg class="w-3 h-3 opacity-60 transition-transform
                                            group-hover:rotate-180"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M19 9l-7 7-7-7"/>
                                </svg>
                            @endif
                        </a>

                        {{-- Dropdown --}}
                        @if($item->children->count())
                            <div
                                class="absolute left-1/2 -translate-x-1/2 top-full pt-4
                                       opacity-0 invisible group-hover:opacity-100
                                       group-hover:visible transition-all duration-200 z-50">

                                {{-- Hover bridge --}}
                                <div class="absolute -top-4 left-0 right-0 h-4"></div>

                                <div
                                    class="min-w-[260px] max-w-[420px]
                                           bg-white rounded-2xl shadow-2xl
                                           ring-1 ring-black/5 overflow-hidden">

                                    @foreach($item->children as $child)
                                        <a href="{{ $child->url }}"
                                           class="block px-6 py-4 text-sm font-semibold
                                                  text-gray-700 hover:bg-blue-50
                                                  hover:text-blue-600 transition
                                                  whitespace-normal leading-relaxed">
                                            {{ $child->title }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>
                @endforeach

            </div>

            {{-- ================= RIGHT: USER / AUTH ================= --}}
            <div class="hidden md:flex items-center gap-4">

                @auth
                    {{-- User profile --}}
                    <div class="relative group">
                        <button class="flex items-center gap-2 focus:outline-none">
                            <img src="{{ Auth::user()->profile_photo_url }}"
                                 alt="{{ Auth::user()->name }}"
                                 class="h-10 w-10 rounded-xl object-cover border border-gray-200">
                        </button>

                        {{-- User dropdown --}}
                        <div
                            class="absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-xl
                                   opacity-0 invisible group-hover:opacity-100 group-hover:visible
                                   transition-all duration-200 z-50 overflow-hidden">

                            <div class="px-4 py-3 border-b">
                                <div class="font-bold text-sm text-gray-900">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="text-xs text-gray-500">
                                    {{ Auth::user()->email }}
                                </div>
                            </div>

                            <a href="{{ route('profile.show') }}"
                               class="block px-4 py-3 text-sm hover:bg-blue-50 transition">
                                Profile
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    {{-- Guest --}}
                    <a href="{{ route('login') }}"
                       class="text-sm font-black uppercase tracking-widest text-gray-600 hover:text-blue-600 transition">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="inline-flex items-center px-6 py-3 text-sm font-black
                              bg-gradient-to-r from-blue-600 to-indigo-600
                              text-white rounded-xl hover:shadow-lg transition">
                        Join Free
                    </a>
                @endauth

            </div>

            {{-- ================= MOBILE TOGGLE ================= --}}
            <button @click="open = !open"
                    class="md:hidden inline-flex items-center justify-center
                           p-3 rounded-xl text-gray-500 hover:text-blue-600
                           hover:bg-blue-50 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }"
                          class="inline-flex"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                    <path :class="{ 'hidden': !open, 'inline-flex': open }"
                          class="hidden"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

        </div>
    </div>

    {{-- ================= MOBILE MENU ================= --}}
    <div x-show="open"
         x-transition
         @click.outside="open = false"
         class="md:hidden bg-white border-t shadow-inner">

        @foreach($items as $item)
            <div class="border-b">
                <a href="{{ $item->url ?: '#' }}"
                   class="block px-6 py-4 font-black uppercase tracking-widest text-xs
                          text-gray-700 hover:bg-blue-50 transition">
                    {{ $item->title }}
                </a>

                @if($item->children->count())
                    <div class="pl-6 pb-3 space-y-2">
                        @foreach($item->children as $child)
                            <a href="{{ $child->url }}"
                               class="block px-4 py-3 text-sm
                                      text-gray-600 hover:text-blue-600 transition leading-relaxed">
                                {{ $child->title }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach

        @guest
            <div class="px-6 py-4 flex gap-4">
                <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600">Login</a>
                <a href="{{ route('register') }}" class="text-sm font-bold text-blue-600">Register</a>
            </div>
        @endguest
    </div>
</nav>
