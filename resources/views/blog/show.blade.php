{{-- ================= SEO META ================= --}}
@section(
    'title',
    $post->title . ''
)

@section(
    'meta_description',
    Str::limit(
        $post->excerpt
            ?? strip_tags($post->content),
        155
    )
)

<x-app-layout
    title="{{ $post->title }}"
    metaDescription="{{ Str::limit($post->excerpt ?? strip_tags($post->content), 155) }}"
>
    {{-- ================= HEADER ================= --}}
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('blog.index') }}"
               class="w-10 h-10 bg-white border border-blue-200 rounded-xl flex items-center justify-center
                      text-gray-500 hover:text-blue-600 hover:border-blue-400 transition-all duration-300 shadow-sm hover:shadow">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>

            <div>
                <h2 class="font-bold text-xl text-gray-900 leading-none">
                    {{ $post->category->name }}
                </h2>
                <nav class="flex text-[11px] font-bold text-blue-700 uppercase tracking-widest mt-1">
                    <a href="{{ route('blog.index') }}" class="hover:text-indigo-800 transition-colors">Blog</a>
                    <span class="mx-2 text-gray-400">/</span>
                    <span class="text-indigo-600">{{ $post->category->name }}</span>
                </nav>
            </div>
        </div>
    </x-slot>

    {{-- ================= MAIN ================= --}}
    <div class="py-8 md:py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ================= ARTICLE HERO ================= --}}
            <header class="text-center mb-10 md:mb-14">
                <div class="flex items-center justify-center text-xs font-bold text-blue-700 uppercase tracking-wider mb-4 md:mb-5 gap-3">
                    <span class="px-3 py-1.5 bg-blue-50 border border-blue-100 rounded-lg">
                        {{ $post->category->name }}
                    </span>
                    <span class="text-blue-300">•</span>
                    <time datetime="{{ $post->published_at->toIso8601String() }}" class="text-gray-600">
                        {{ $post->published_at->format('d M Y') }}
                    </time>
                    <span class="text-blue-300">•</span>
                    <span class="text-gray-600">
                        {{ round(str_word_count(strip_tags($post->content)) / 200) }} min read
                    </span>
                </div>

                {{-- ✅ H1 (ONLY ONE) --}}
                <h1 class="text-2xl md:text-4xl font-extrabold text-gray-900 leading-tight mb-4 md:mb-6 px-2">
                    {{ $post->title }}
                </h1>

                {{-- Author --}}
                <div class="flex items-center justify-center gap-3 md:gap-4 mt-6">
                    <img
                        src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&color=FFFFFF&background=2563eb&size=128"
                        class="w-10 h-10 md:w-12 md:h-12 rounded-xl border-2 border-white shadow"
                        alt="{{ $post->user->name }}"
                    >
                    <div class="text-left">
                        <p class="text-sm font-bold text-gray-900">{{ $post->user->name }}</p>
                        <p class="text-xs font-medium text-gray-500">
                            Published on {{ $post->published_at->format('F d, Y') }}
                        </p>
                    </div>
                </div>
            </header>

            {{-- ================= FEATURE IMAGE ================= --}}
            @if($post->cover_image)
                <div class="mb-8 md:mb-12 rounded-2xl md:rounded-3xl overflow-hidden shadow-lg border border-gray-100">
                    <img
                        src="{{ Storage::url($post->cover_image) }}"
                        alt="{{ $post->title }}"
                        class="w-full h-auto"
                        loading="lazy"
                    >
                </div>
            @endif

            {{-- ================= CONTENT ================= --}}
            <article class="bg-white rounded-2xl md:rounded-3xl border border-gray-100 p-6 md:p-10 lg:p-12 shadow-sm">

                {{-- Excerpt --}}
                @if($post->excerpt)
                    <div class="mb-8 md:mb-10 p-5 bg-blue-50 border-l-4 border-blue-600 rounded-r-lg">
                        <p class="text-lg text-gray-800 font-medium leading-relaxed">
                            {{ $post->excerpt }}
                        </p>
                    </div>
                @endif

                {{-- Main Content --}}
                <div class="prose prose-base md:prose-lg max-w-none
                            prose-headings:font-bold
                            prose-headings:text-gray-900
                            prose-p:text-gray-700
                            prose-a:text-blue-600 prose-a:font-medium prose-a:underline
                            prose-strong:font-semibold prose-strong:text-gray-900
                            prose-blockquote:border-l-4 prose-blockquote:border-blue-300
                            prose-blockquote:bg-blue-50 prose-blockquote:py-2 prose-blockquote:px-6
                            prose-ul:list-disc prose-ol:list-decimal
                            prose-img:rounded-lg prose-img:shadow-md
                            prose-hr:border-gray-200">

                    {!! $post->content !!}
                </div>

                {{-- Share & Actions --}}
                <footer class="mt-10 md:mt-14 pt-8 border-t border-gray-100">
                    {{-- Share Buttons --}}
                    <div class="mb-6">
                        <span class="text-sm font-semibold text-gray-700 mb-3 block">
                            Share this article:
                        </span>
                        <div class="flex items-center gap-3">
                            {{-- Twitter --}}
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title . ' ' . url()->current()) }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm hover:shadow-md">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                </svg>
                            </a>
                            
                            {{-- LinkedIn --}}
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title) }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm hover:shadow-md">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            
                            {{-- Facebook --}}
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm hover:shadow-md">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                                </svg>
                            </a>
                            
                            {{-- Copy Link --}}
                            <button onclick="copyToClipboard('{{ url()->current() }}')"
                                    class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 hover:text-gray-800 transition-all duration-300 shadow-sm hover:shadow-md tooltip">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                <span class="tooltip-text text-xs bg-gray-800 text-white px-2 py-1 rounded absolute -top-8 opacity-0 transition-opacity">Copy link</span>
                            </button>
                        </div>
                    </div>

                    {{-- Print Button --}}
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <a href="{{ route('blog.index') }}"
                           class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Back to all articles
                        </a>
                        
                        <button onclick="window.print()"
                                class="px-5 py-2.5 bg-gray-900 text-white text-sm font-semibold rounded-xl hover:bg-blue-600 transition-all duration-300 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                            Print Article
                        </button>
                    </div>
                </footer>
            </article>

            {{-- ================= RELATED POSTS ================= --}}
            @if($relatedPosts->count())
                <section class="mt-12 md:mt-16">
                    <div class="flex items-center justify-between mb-6 md:mb-8">
                        <h3 class="text-lg md:text-xl font-bold text-gray-900">
                            Continue Reading
                        </h3>
                        <a href="{{ route('blog.category', $post->category) }}"
                           class="text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors">
                            View all in {{ $post->category->name }}
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6">
                        @foreach($relatedPosts as $rp)
                            <a href="{{ route('blog.show', $rp) }}"
                               class="block bg-white rounded-xl md:rounded-2xl p-5 border border-gray-100
                                      hover:border-blue-200 hover:shadow-lg transition-all duration-300 group">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">
                                        {{ $rp->category->name }}
                                    </span>
                                    <span class="text-gray-300">•</span>
                                    <span class="text-xs text-gray-500">
                                        {{ $rp->published_at->format('M d') }}
                                    </span>
                                </div>
                                <h4 class="text-base font-bold text-gray-900 leading-snug line-clamp-2 group-hover:text-blue-600 transition-colors">
                                    {{ $rp->title }}
                                </h4>
                                @if($rp->excerpt)
                                    <p class="mt-2 text-sm text-gray-600 line-clamp-2">
                                        {{ Str::limit($rp->excerpt, 80) }}
                                    </p>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif

        </div>
    </div>

    {{-- JavaScript for copy link functionality --}}
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                // Show success feedback
                const button = event.currentTarget;
                const tooltip = button.querySelector('.tooltip-text');
                tooltip.textContent = 'Copied!';
                tooltip.classList.remove('opacity-0');
                
                setTimeout(() => {
                    tooltip.textContent = 'Copy link';
                    tooltip.classList.add('opacity-0');
                }, 2000);
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        }
        
        // Tooltip functionality
        document.querySelectorAll('.tooltip').forEach(button => {
            button.addEventListener('mouseenter', () => {
                const tooltip = button.querySelector('.tooltip-text');
                tooltip.classList.remove('opacity-0');
            });
            
            button.addEventListener('mouseleave', () => {
                const tooltip = button.querySelector('.tooltip-text');
                if (tooltip.textContent === 'Copy link') {
                    tooltip.classList.add('opacity-0');
                }
            });
        });
    </script>
    
    <style>
        .tooltip {
            position: relative;
        }
        
        .tooltip-text {
            pointer-events: none;
            white-space: nowrap;
            transform: translateX(-50%);
            left: 50%;
        }
        
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        @media print {
            header, footer, .prose a, button, nav {
                display: none !important;
            }
            
            .prose {
                max-width: 100% !important;
            }
            
            article {
                border: none !important;
                box-shadow: none !important;
                padding: 0 !important;
            }
        }
    </style>
</x-app-layout>