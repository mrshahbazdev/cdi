<footer role="contentinfo" class="bg-slate-900 text-slate-400 pt-20 pb-10">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-12">

        @foreach($sections as $section)

            {{-- BRAND BLOCK --}}
            @if($section->type === 'brand')
                <div class="md:col-span-2">
                    <div class="text-white text-2xl font-extrabold mb-4">
                        {{ config('app.name') }}
                    </div>

                    @foreach($section->items as $item)
                        <p class="mb-4 text-sm max-w-md">
                            {!! nl2br(e($item->label)) !!}
                        </p>
                    @endforeach
                </div>
            @endif

            {{-- LINK SECTIONS --}}
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

            {{-- SOCIAL ICONS --}}
            @if($section->type === 'socials')
                <div>
                    <div class="text-white font-bold mb-4">
                        {{ $section->title }}
                    </div>

                    <div class="flex gap-6">
                        @foreach($section->items as $item)
                            <a href="{{ $item->url }}"
                               target="_blank"
                               rel="noopener"
                               aria-label="{{ $item->label }}"
                               class="hover:text-blue-400 transition-colors">
                                {!! $item->icon !!}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        @endforeach
    </div>

    {{-- BOTTOM BAR --}}
    <div class="max-w-7xl mx-auto px-6 mt-12 pt-8 border-t border-slate-800">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-sm">
            <p>
                © {{ date('Y') }} {{ config('app.name') }}. Alle Rechte vorbehalten.
            </p>

            <div class="flex gap-6">
                @foreach($bottomLinks ?? [] as $link)
                    <a href="{{ $link['url'] }}" class="hover:text-blue-400 transition">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</footer>
