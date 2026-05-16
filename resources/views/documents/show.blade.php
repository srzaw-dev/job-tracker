<!DOCTYPE html>
<html class="light" lang="en">
<head>
@include('partials.trackr-head', ['title' => $document->name])
</head>
<body class="bg-surface text-on-surface min-h-screen">
@include('partials.nav-sidebar', ['active' => 'documents'])

<header class="fixed top-0 right-0 w-[calc(100%-240px)] h-16 bg-surface-bright border-b border-outline-variant shadow-sm flex justify-between items-center px-lg z-40">
    <div class="flex items-center w-1/3">
        <div class="relative w-full max-w-md focus-within:ring-2 focus-within:ring-primary rounded-full">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
            <input class="w-full bg-surface-container border-none rounded-full py-2 pl-10 pr-4 text-body-md font-body-md focus:ring-0" placeholder="Search documents..." type="text" />
        </div>
    </div>
    <div class="flex items-center gap-4">
        <button class="hover:bg-surface-container rounded-full p-2 text-on-surface-variant">
            <span class="material-symbols-outlined">notifications</span>
        </button>
    </div>
</header>

<main class="ml-[240px] pt-16 min-h-screen p-gutter">
    <div class="max-w-6xl mx-auto space-y-gutter">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div class="space-y-1">
                <div class="flex items-center gap-2 text-primary font-label-md text-label-md uppercase tracking-wider">
                    <span class="material-symbols-outlined text-[16px]">description</span>
                    {{ $document->type ?? 'Document' }}
                </div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface">{{ $document->name }}</h2>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('documents.index') }}" class="bg-white border border-outline text-on-surface px-6 py-2 rounded-lg font-label-md text-label-md flex items-center gap-2 hover:bg-surface-container transition-colors shadow-sm active:scale-95">
                    <span class="material-symbols-outlined">arrow_back</span>
                    Back
                </a>
                @if($document->path)
                    <a href="{{ Storage::url($document->path) }}" target="_blank"
                        class="bg-primary text-on-primary px-6 py-2 rounded-lg font-label-md text-label-md flex items-center gap-2 hover:opacity-90 transition-opacity shadow-sm active:scale-95">
                        <span class="material-symbols-outlined">download</span>
                        Download
                    </a>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
            <div class="lg:col-span-4 space-y-gutter">
                <section class="bg-white border border-outline-variant rounded-xl p-6 shadow-[0px_1px_3px_rgba(15,23,42,0.08)]">
                    <h3 class="font-headline-sm text-headline-sm mb-6 text-on-surface">File Information</h3>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="bg-surface-container-high p-3 rounded-lg text-primary">
                                <span class="material-symbols-outlined">file_present</span>
                            </div>
                            <div>
                                <p class="text-label-sm font-label-sm text-on-surface-variant uppercase">Type</p>
                                <p class="text-body-md font-body-md text-on-surface">{{ $document->type ?? '—' }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="bg-surface-container-high p-3 rounded-lg text-primary">
                                <span class="material-symbols-outlined">calendar_today</span>
                            </div>
                            <div>
                                <p class="text-label-sm font-label-sm text-on-surface-variant uppercase">Upload Date</p>
                                <p class="text-body-md font-body-md text-on-surface">{{ $document->created_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Delete section --}}
                <section class="bg-error-container/20 border border-error/20 rounded-xl p-6">
                    <h4 class="font-headline-sm text-headline-sm text-error mb-xs">Danger Zone</h4>
                    <p class="font-body-sm text-body-sm text-on-error-container mb-lg">Permanently delete this document.</p>
                    <form method="POST" action="{{ route('documents.destroy', $document) }}" onsubmit="return confirm('Permanently delete this document?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-error font-label-md hover:underline decoration-2 underline-offset-4">
                            Delete Document
                        </button>
                    </form>
                </section>
            </div>

            <div class="lg:col-span-8 space-y-gutter">
                <section class="bg-white border border-outline-variant rounded-xl overflow-hidden shadow-[0px_1px_3px_rgba(15,23,42,0.08)]">
                    <div class="p-6 border-b border-outline-variant flex justify-between items-center">
                        <h3 class="font-headline-sm text-headline-sm text-on-surface">Used in Applications</h3>
                        @if($document->application)
                            <span class="bg-surface-container-highest text-on-surface-variant px-3 py-1 rounded-full font-label-sm text-label-sm">1 Total</span>
                        @else
                            <span class="bg-surface-container-highest text-on-surface-variant px-3 py-1 rounded-full font-label-sm text-label-sm">0 Total</span>
                        @endif
                    </div>
                    <div class="divide-y divide-outline-variant">
                        @if($document->application)
                            <a href="{{ route('applications.show', $document->application) }}" class="p-6 flex items-center justify-between hover:bg-surface-bright transition-colors group block">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-lg border border-outline-variant flex items-center justify-center bg-surface-container-lowest overflow-hidden">
                                        <span class="material-symbols-outlined text-primary">business</span>
                                    </div>
                                    <div>
                                        <h4 class="font-body-md font-bold text-on-surface group-hover:text-primary transition-colors">{{ $document->application->company_name }}</h4>
                                        <p class="text-body-sm text-on-surface-variant">{{ $document->application->role }}</p>
                                    </div>
                                </div>
                                <div class="text-right flex items-center gap-8">
                                    <div class="hidden sm:block">
                                        <p class="text-label-sm font-label-sm text-on-surface-variant uppercase">Applied On</p>
                                        <p class="text-body-sm text-on-surface">
                                            {{ $document->application->date_applied ? $document->application->date_applied->format('M d, Y') : '—' }}
                                        </p>
                                    </div>
                                    <span class="material-symbols-outlined text-on-surface-variant">chevron_right</span>
                                </div>
                            </a>
                        @else
                            <div class="p-6 text-center">
                                <p class="font-body-md text-body-md text-secondary">This document hasn't been used in any applications yet.</p>
                            </div>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>
</body>
</html>
