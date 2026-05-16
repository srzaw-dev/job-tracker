<!DOCTYPE html>
<html lang="en">
<head>
@include('partials.trackr-head', ['title' => 'Documents'])
</head>
<body class="bg-surface text-on-surface">
@include('partials.nav-sidebar', ['active' => 'documents'])

<header class="sticky top-0 z-40 w-full bg-surface/80 backdrop-blur-md border-b border-outline-variant ml-[240px] flex items-center justify-between px-margin-desktop py-sm shadow-sm">
    <div class="flex items-center gap-lg flex-1">
        <div class="relative w-full max-w-md">
            <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-secondary">search</span>
            <input class="w-full pl-xl pr-md py-xs bg-surface-container-low border border-outline-variant rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all" placeholder="Search documents..." type="text" />
        </div>
    </div>
    <div class="flex items-center gap-lg">
        <button onclick="document.getElementById('upload-modal').classList.remove('hidden')"
            class="flex items-center gap-xs px-lg py-sm bg-primary text-on-primary font-label-md text-label-md rounded-xl hover:opacity-90 active:scale-95 transition-all">
            <span class="material-symbols-outlined text-body-md">add</span>
            Upload Document
        </button>
    </div>
</header>

<main class="ml-[240px] p-margin-desktop">
    <div class="max-w-7xl mx-auto">
        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-xl">
            <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl shadow-sm">
                <div class="flex justify-between items-start mb-sm">
                    <span class="material-symbols-outlined text-primary p-xs bg-primary-fixed rounded-lg">description</span>
                    <span class="text-label-sm font-label-sm text-secondary">Total</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">{{ $documents->total() }}</h3>
                <p class="font-body-sm text-body-sm text-secondary">Total Documents</p>
            </div>
            <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl shadow-sm">
                <div class="flex justify-between items-start mb-sm">
                    <span class="material-symbols-outlined text-secondary p-xs bg-secondary-container rounded-lg">task_alt</span>
                    <span class="text-label-sm font-label-sm text-primary">Active</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">{{ $documents->where('application_id', '!=', null)->count() }}</h3>
                <p class="font-body-sm text-body-sm text-secondary">Used in Applications</p>
            </div>
            <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl shadow-sm">
                <div class="flex justify-between items-start mb-sm">
                    <span class="material-symbols-outlined text-tertiary p-xs bg-tertiary-fixed rounded-lg">history</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">{{ $documents->groupBy('type')->count() }}</h3>
                <p class="font-body-sm text-body-sm text-secondary">Document Types</p>
            </div>
            <div class="bg-primary text-on-primary p-lg rounded-xl shadow-md relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="font-headline-sm text-headline-sm mb-xs">Storage</h3>
                    <p class="font-body-sm text-body-sm text-on-primary/80">{{ $documents->total() }} file(s) stored</p>
                </div>
                <div class="absolute -right-4 -bottom-4 opacity-10">
                    <span class="material-symbols-outlined text-[80px]">cloud</span>
                </div>
            </div>
        </div>

        {{-- Document Table --}}
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-sm overflow-hidden">
            <div class="px-lg py-md border-b border-outline-variant flex items-center justify-between">
                <h2 class="font-headline-sm text-headline-sm text-on-surface">Managed Documents</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low">
                            <th class="px-lg py-md font-label-md text-label-md text-secondary border-b border-outline-variant">Document Name</th>
                            <th class="px-lg py-md font-label-md text-label-md text-secondary border-b border-outline-variant">Type</th>
                            <th class="px-lg py-md font-label-md text-label-md text-secondary border-b border-outline-variant">Used In</th>
                            <th class="px-lg py-md font-label-md text-label-md text-secondary border-b border-outline-variant">Date Added</th>
                            <th class="px-lg py-md font-label-md text-label-md text-secondary border-b border-outline-variant text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                    @forelse($documents as $doc)
                        <tr class="hover:bg-surface-container-low transition-colors group">
                            <td class="px-lg py-md">
                                <div class="flex items-center gap-md">
                                    <span class="material-symbols-outlined text-primary">description</span>
                                    <div>
                                        <p class="font-body-md text-body-md font-semibold text-on-surface">{{ $doc->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-lg py-md">
                                @if($doc->type)
                                    <span class="px-sm py-xs bg-secondary-container text-on-secondary-container text-label-sm font-label-sm rounded-full">{{ $doc->type }}</span>
                                @else
                                    <span class="text-secondary font-body-sm">—</span>
                                @endif
                            </td>
                            <td class="px-lg py-md font-body-md text-body-md text-on-surface">
                                @if($doc->application)
                                    <a href="{{ route('applications.show', $doc->application) }}" class="text-primary hover:underline">
                                        {{ $doc->application->company_name }}
                                    </a>
                                @else
                                    <span class="text-secondary">—</span>
                                @endif
                            </td>
                            <td class="px-lg py-md font-body-md text-body-md text-secondary">
                                {{ $doc->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-lg py-md text-right">
                                <div class="flex justify-end gap-sm">
                                    <form method="POST" action="{{ route('documents.destroy', $doc) }}" onsubmit="return confirm('Delete this document?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-xs text-secondary hover:text-error transition-all" title="Delete">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-lg py-xl text-center font-body-md text-body-md text-secondary">
                                No documents yet. Upload your first document.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-lg py-md bg-surface-container-low border-t border-outline-variant flex items-center justify-between">
                <p class="font-body-sm text-body-sm text-secondary">Showing {{ $documents->firstItem() ?? 0 }} of {{ $documents->total() }} documents</p>
                <div>{{ $documents->links() }}</div>
            </div>
        </div>

        {{-- Quick Action Cards --}}
        <div class="mt-xl grid grid-cols-1 md:grid-cols-2 gap-gutter">
            <div class="flex items-center gap-lg bg-surface-container p-lg rounded-xl border border-outline-variant">
                <div class="bg-primary-fixed p-md rounded-full">
                    <span class="material-symbols-outlined text-primary text-headline-md">auto_awesome</span>
                </div>
                <div>
                    <h4 class="font-headline-sm text-headline-sm text-on-surface">AI Resume Optimizer</h4>
                    <p class="font-body-md text-body-md text-secondary">Scan your document against job descriptions to increase your match score.</p>
                </div>
            </div>
            <div class="flex items-center gap-lg bg-surface-container p-lg rounded-xl border border-outline-variant">
                <div class="bg-tertiary-fixed p-md rounded-full">
                    <span class="material-symbols-outlined text-tertiary text-headline-md">history_edu</span>
                </div>
                <div>
                    <h4 class="font-headline-sm text-headline-sm text-on-surface">Cover Letter Builder</h4>
                    <p class="font-body-md text-body-md text-secondary">Generate tailored cover letters in seconds based on your existing documents.</p>
                </div>
            </div>
        </div>
    </div>
</main>

{{-- Upload Modal --}}
<div id="upload-modal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-md">
    <div class="bg-surface-container-lowest rounded-xl p-lg w-full max-w-md shadow-2xl border border-outline-variant">
        <div class="flex items-center justify-between mb-lg">
            <h3 class="font-headline-sm text-headline-sm text-on-surface">Upload Document</h3>
            <button onclick="document.getElementById('upload-modal').classList.add('hidden')" class="text-secondary hover:text-on-surface transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data" class="space-y-md">
            @csrf
            <div>
                <label class="block font-label-sm text-label-sm text-secondary mb-xs" for="name">Document Name</label>
                <input class="w-full bg-surface border border-outline-variant rounded-lg px-md py-sm font-body-md text-body-md focus:ring-2 focus:ring-primary focus:border-primary outline-none"
                    id="name" name="name" type="text" placeholder="e.g. Resume_2024" required />
            </div>
            <div>
                <label class="block font-label-sm text-label-sm text-secondary mb-xs" for="type">Type</label>
                <select class="w-full bg-surface border border-outline-variant rounded-lg px-md py-sm font-body-md text-body-md focus:ring-2 focus:ring-primary focus:border-primary outline-none"
                    id="type" name="type">
                    <option value="">Select type...</option>
                    <option value="CV">CV / Resume</option>
                    <option value="Cover Letter">Cover Letter</option>
                    <option value="Portfolio">Portfolio</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div>
                <label class="block font-label-sm text-label-sm text-secondary mb-xs" for="file">File</label>
                <input class="w-full bg-surface border border-outline-variant rounded-lg px-md py-sm font-body-md text-body-md"
                    id="file" name="file" type="file" required />
            </div>
            <div class="flex justify-end gap-md pt-sm">
                <button type="button" onclick="document.getElementById('upload-modal').classList.add('hidden')"
                    class="px-lg py-sm font-label-md text-label-md text-secondary hover:bg-surface-container rounded-lg transition-colors">
                    Cancel
                </button>
                <button type="submit" class="px-lg py-sm font-label-md text-label-md bg-primary text-on-primary rounded-lg hover:opacity-90 transition-all shadow-sm">
                    Upload
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
