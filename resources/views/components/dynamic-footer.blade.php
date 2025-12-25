<footer role="contentinfo" class="bg-slate-900 text-slate-400 pt-20 pb-10">
    <div class="max-w-7xl mx-auto px-6">

        {{-- ================= TOP FOOTER GRID ================= --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-12">

            @foreach($sections->whereNotIn('type', ['bottom', 'socials']) as $section)

                {{-- BRAND --}}
                @if($section->type === 'brand')
                    <div class="md:col-span-2">
                        <div class="text-white text-2xl font-extrabold mb-4">
                            {{ config('app.name') }}
                        </div>

                        @foreach($section->items as $item)
                            <p class="mb-4 text-sm max-w-md leading-relaxed">
                                {!! nl2br(e($item->label)) !!}
                            </p>
                        @endforeach
                    </div>
                @endif

                {{-- LINKS --}}
                @if($section->type === 'links')
                    <div>
                        <div class="text-white font-bold mb-4">
                            {{ $section->title }}
                        </div>

                        <ul class="space-y-2 text-sm">
                            @foreach($section->items as $item)
                                <li>
                                    <a href="{{ $item->url }}"
                                       class="hover:text-blue-400 transition-colors">
                                        {{ $item->label }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            @endforeach
        </div>
    </div>

    {{-- ================= BOTTOM BAR ================= --}}
    @php
        $bottomSection = $sections->firstWhere('type', 'bottom');
        $socialSection = $sections->firstWhere('type', 'socials');
    @endphp

    <div class="max-w-7xl mx-auto px-6 mt-16 pt-8 border-t border-slate-800">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6 text-sm">

            {{-- LEFT --}}
            <p class="text-center md:text-left">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </p>

            {{-- CENTER (BOTTOM LINKS) --}}
            @if($bottomSection)
                <div class="flex gap-6">
                    @foreach($bottomSection->items as $item)
                        <a href="{{ $item->url }}"
                           class="hover:text-blue-400 transition">
                            {{ $item->label }}
                        </a>
                    @endforeach
                </div>
            @endif

            {{-- RIGHT (SOCIAL ICONS ONLY HERE) --}}
            @if($socialSection)
                <div class="flex gap-4">
                    @foreach($socialSection->items as $item)
                        <a href="{{ $item->url }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           aria-label="{{ $item->label }}"
                           class="text-slate-400 hover:text-blue-400 transition-colors">
                            <span class="block w-4 h-4">
                                {!! str_replace('<svg', '<svg class="w-4 h-4"', $item->icon) !!}
                            </span>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</footer>
