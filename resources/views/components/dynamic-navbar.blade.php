<nav x-data="{ open: false }"
     class="bg-white/80 backdrop-blur-lg border-b shadow-sm sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between h-20 items-center">

            {{-- ================= LOGO ================= --}}
            <a href="{{ url('/') }}" class="font-black text-xl">
                {{ config('app.name') }}
            </a>

            {{-- ================= DESKTOP MENU ================= --}}
            <div class="hidden md:flex items-center gap-12"> {{-- FIXED GAP --}}

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

                        {{-- ================= DROPDOWN ================= --}}
                        @if($item->children->count())
                            <div
                                class="absolute left-1/2 -translate-x-1/2 top-full pt-4
                                       opacity-0 invisible group-hover:opacity-100
                                       group-hover:visible transition-all duration-200 z-50">

                                {{-- Hover bridge --}}
                                <div class="absolute -top-4 left-0 right-0 h-4"></div>

                                <div
                                    class="min-w-[260px] max-w-[420px] {{-- FIXED WIDTH --}}
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
                   class="block px-6 py-4 font-black uppercase
                          tracking-widest text-xs
                          text-gray-700 hover:bg-blue-50 transition">
                    {{ $item->title }}
                </a>

                @if($item->children->count())
                    <div class="pl-6 pb-3 space-y-2">
                        @foreach($item->children as $child)
                            <a href="{{ $child->url }}"
                               class="block px-4 py-3 text-sm
                                      text-gray-600 hover:text-blue-600
                                      transition leading-relaxed">
                                {{ $child->title }}
                            </a>
                        @endforeach
                    </div>
                @endif

            </div>
        @endforeach
    </div>
</nav>
