<footer class="bg-gray-900 text-gray-400 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-4 gap-10">

        @foreach($sections as $section)
            <div>
                @if($section->title)
                    <div class="text-white font-semibold mb-4">
                        {{ $section->title }}
                    </div>
                @endif

                <ul class="space-y-2 text-sm">
                    @foreach($section->items as $item)
                        @if($item->is_visible)
                            <li>
                                <a href="{{ $item->url ?? '#' }}"
                                   class="hover:text-blue-400 transition">
                                    {{ $item->label }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endforeach

    </div>

    <div class="border-t border-gray-800 text-center text-sm py-6">
        © {{ date('Y') }} {{ config('app.name') }}
    </div>
</footer>
