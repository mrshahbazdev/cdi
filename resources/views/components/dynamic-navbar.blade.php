<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-lg border-b shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between h-20 items-center">

            {{-- Logo --}}
            <a href="/" class="font-black text-xl">
                {{ config('app.name') }}
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex space-x-8">
                @foreach($items as $item)
                    <div class="relative group">
                        <a href="{{ $item->url ?? '#' }}"
                           class="uppercase tracking-widest font-black text-sm hover:text-blue-600">
                            {{ $item->title }}
                        </a>

                        {{-- Dropdown --}}
                        @if($item->children->count())
                            <div class="absolute left-0 top-full mt-4 w-56 bg-white rounded-xl shadow-xl opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition">
                                @foreach($item->children as $child)
                                    <a href="{{ $child->url }}"
                                       class="block px-5 py-3 hover:bg-blue-50">
                                        {{ $child->title }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            {{-- Mobile Toggle --}}
            <button @click="open = !open" class="md:hidden">
                ☰
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" class="md:hidden bg-white border-t">
        @foreach($items as $item)
            <div class="px-6 py-3 border-b">
                <a href="{{ $item->url }}" class="font-bold">
                    {{ $item->title }}
                </a>

                @if($item->children->count())
                    <div class="pl-4 mt-2 space-y-2">
                        @foreach($item->children as $child)
                            <a href="{{ $child->url }}" class="block text-sm">
                                {{ $child->title }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</nav>
