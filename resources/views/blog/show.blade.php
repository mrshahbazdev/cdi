@section('title', $post->title . ' – ' . $post->category->name . ' | Digital Packt')
@section('meta_description', $post->excerpt ?? Str::limit(strip_tags($post->content), 155))

<x-app-layout
    title="{{ $post->title }} – {{ $post->category->name }} | Digital Packt"
    metaDescription="{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 155) }}"
>
    {{-- ================= HEADER ================= --}}
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('blog.index') }}"
               class="w-10 h-10 bg-white border border-blue-200 rounded-xl flex items-center justify-center
                      text-gray-500 hover:text-blue-600 hover:border-blue-400 transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>

            <div>
                <h2 class="font-bold text-xl text-gray-900 leading-none">
                    {{ $post->category->name }}
                </h2>
                <nav class="flex text-[10px] font-bold text-blue-700 uppercase tracking-widest mt-1">
                    <a href="{{ route('blog.index') }}" class="hover:text-indigo-800">Blog</a>
                    <span class="mx-2 text-gray-400">/</span>
                    <span class="text-indigo-600">{{ $post->category->name }}</span>
                </nav>
            </div>
        </div>
    </x-slot>

    {{-- ================= MAIN ================= --}}
    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ================= ARTICLE HERO ================= --}}
            <header class="text-center mb-14">
                <div class="flex items-center justify-center text-[11px] font-black text-blue-700 uppercase tracking-widest mb-5">
                    <span class="px-4 py-1.5 bg-blue-100 border border-blue-200 rounded-lg">
                        {{ $post->category->name }}
                    </span>
                    <span class="mx-3 text-blue-300">•</span>
                    <time datetime="{{ $post->published_at->toIso8601String() }}">
                        {{ $post->published_at->format('d M Y') }}
                    </time>
                </div>

                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight mb-6">
                    {{ $post->title }}
                </h1>

                {{-- Author --}}
                <div class="flex items-center justify-center gap-4">
                    <img
                        src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&color=FFFFFF&background=2563eb"
                        class="w-12 h-12 rounded-xl border border-white shadow"
                        alt="{{ $post->user->name }}"
                    >
                    <div class="text-left">
                        <p class="text-sm font-bold text-gray-900">{{ $post->user->name }}</p>
                        <p class="text-[11px] font-semibold text-gray-500 uppercase tracking-wide">
                            Lead Architect
                        </p>
                    </div>
                </div>
            </header>

            {{-- ================= FEATURE IMAGE ================= --}}
            @if($post->cover_image)
                <div class="mb-14 rounded-3xl overflow-hidden shadow-lg border border-gray-100">
                    <img
                        src="{{ Storage::url($post->cover_image) }}"
                        alt="{{ $post->title }}"
                        class="w-full h-auto"
                    >
                </div>
            @endif

            {{-- ================= CONTENT ================= --}}
            <article class="bg-white rounded-3xl border border-gray-100 p-8 md:p-12 shadow-sm">

                {{-- Excerpt --}}
                @if($post->excerpt)
                    <p class="text-lg text-gray-700 font-medium leading-relaxed mb-10 border-l-4 border-blue-600 pl-6">
                        {{ $post->excerpt }}
                    </p>
                @endif

                {{-- Main Content --}}
                <div class="prose prose-lg max-w-none
                            prose-headings:font-bold
                            prose-headings:text-gray-900
                            prose-p:text-gray-700
                            prose-a:text-blue-600
                            prose-strong:font-semibold">
                    {!! $post->content !!}
                </div>

                {{-- Actions --}}
                <footer class="mt-14 pt-8 border-t border-gray-100 flex flex-wrap items-center justify-between gap-6">
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-widest">
                            Share:
                        </span>
                        <button class="w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition">
                            <i class="fab fa-linkedin-in"></i>
                        </button>
                    </div>

                    <button onclick="window.print()"
                            class="px-6 py-3 bg-gray-900 text-white text-xs font-bold rounded-xl uppercase tracking-widest hover:bg-blue-600 transition">
                        Print Article
                    </button>
                </footer>
            </article>

            {{-- ================= RELATED POSTS ================= --}}
            @if($relatedPosts->count())
                <section class="mt-20">
                    <h3 class="text-xl font-bold text-gray-900 mb-8">
                        Continue Reading
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedPosts as $rp)
                            <a href="{{ route('blog.show', $rp) }}"
                               class="block bg-white rounded-2xl p-6 border border-gray-100
                                      hover:border-blue-200 hover:shadow-md transition">
                                <span class="text-[10px] font-bold text-blue-600 uppercase tracking-widest">
                                    {{ $rp->category->name }}
                                </span>
                                <h4 class="mt-3 text-base font-bold text-gray-900 leading-snug line-clamp-2">
                                    {{ $rp->title }}
                                </h4>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif

        </div>
    </div>
</x-app-layout>
