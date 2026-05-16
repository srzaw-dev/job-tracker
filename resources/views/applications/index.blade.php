<!DOCTYPE html>
<html class="light" lang="en">
<head>
@include('partials.trackr-head', ['title' => 'Applications'])
</head>
<body class="bg-surface text-on-surface">
@include('partials.nav-sidebar', ['active' => 'applications'])

<header class="sticky top-0 w-full z-40 h-16 bg-surface border-b border-outline-variant shadow-sm">
    <div class="flex justify-between items-center px-lg h-full ml-[240px] w-[calc(100%-240px)]">
        <div class="flex items-center bg-surface-container rounded-full px-4 py-1.5 w-96 max-w-full">
            <span class="material-symbols-outlined text-secondary mr-2">search</span>
            <input class="bg-transparent border-none focus:ring-0 text-body-sm font-body-sm w-full" placeholder="Search applications..." type="text" />
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('applications.create') }}" class="flex items-center gap-2 font-label-md text-label-md text-primary">
                <span class="material-symbols-outlined">add_circle</span>
                New Application
            </a>
        </div>
    </div>
</header>

<main class="ml-[240px] p-lg max-w-[1400px]">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-lg gap-md">
        <div>
            <h2 class="font-headline-lg text-headline-lg text-on-surface">Applications</h2>
            <p class="font-body-md text-body-md text-secondary">Manage and track your job application pipeline</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('applications.create') }}" class="bg-primary text-on-primary px-5 py-2 rounded-lg flex items-center gap-2 font-label-md text-label-md shadow-sm hover:opacity-90 transition-all">
                <span class="material-symbols-outlined text-[18px]">add</span>
                Add Application
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter mb-xl">
        <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl shadow-sm hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start mb-2">
                <span class="material-symbols-outlined text-secondary bg-surface-container p-2 rounded-lg">send</span>
            </div>
            <p class="text-secondary font-label-md mb-1 uppercase tracking-wider">Applied</p>
            <h3 class="text-[32px] font-bold text-on-surface">{{ $applications->where('status', 'applied')->count() }}</h3>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl shadow-sm border-l-4 border-primary">
            <div class="flex justify-between items-start mb-2">
                <span class="material-symbols-outlined text-primary bg-primary-container/10 p-2 rounded-lg">forum</span>
                <span class="text-primary font-label-sm">Live</span>
            </div>
            <p class="text-secondary font-label-md mb-1 uppercase tracking-wider">Interviews</p>
            <h3 class="text-[32px] font-bold text-on-surface">{{ $applications->where('status', 'interview')->count() }}</h3>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl shadow-sm">
            <div class="flex justify-between items-start mb-2">
                <span class="material-symbols-outlined text-green-600 bg-green-50 p-2 rounded-lg">verified</span>
            </div>
            <p class="text-secondary font-label-md mb-1 uppercase tracking-wider">Offered</p>
            <h3 class="text-[32px] font-bold text-on-surface">{{ $applications->where('status', 'offer')->count() }}</h3>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl shadow-sm">
            <div class="flex justify-between items-start mb-2">
                <span class="material-symbols-outlined text-error bg-error-container/20 p-2 rounded-lg">cancel</span>
            </div>
            <p class="text-secondary font-label-md mb-1 uppercase tracking-wider">Rejected</p>
            <h3 class="text-[32px] font-bold text-on-surface">{{ $applications->where('status', 'rejected')->count() }}</h3>
        </div>
    </div>

    <form method="GET" action="{{ route('applications.index') }}" class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md mb-md flex flex-wrap items-center gap-md">
        <div class="flex items-center gap-2 flex-1 min-w-[200px]">
            <span class="material-symbols-outlined text-secondary text-[20px]">filter_list</span>
            <span class="font-label-md text-label-md text-on-surface">Filters:</span>
            <div class="flex gap-2">
                <select name="status" class="border border-outline-variant rounded-lg px-3 py-1.5 text-body-sm font-body-sm bg-surface-container-low focus:ring-primary focus:border-primary">
                    <option value="">All Statuses</option>
                    <option value="applied" {{ request('status') === 'applied' ? 'selected' : '' }}>Applied</option>
                    <option value="in_review" {{ request('status') === 'in_review' ? 'selected' : '' }}>In Review</option>
                    <option value="interview" {{ request('status') === 'interview' ? 'selected' : '' }}>Interview</option>
                    <option value="offer" {{ request('status') === 'offer' ? 'selected' : '' }}>Offer</option>
                    <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="ghosted" {{ request('status') === 'ghosted' ? 'selected' : '' }}>Ghosted</option>
                </select>
            </div>
        </div>
        <button type="submit" class="text-primary font-label-md hover:underline">Apply</button>
        @if(request('status'))
            <a href="{{ route('applications.index') }}" class="text-secondary font-label-md hover:underline">Clear filters</a>
        @endif
    </form>

    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low border-b border-outline-variant">
                        <th class="px-lg py-4 font-label-md text-label-md text-secondary">Company</th>
                        <th class="px-lg py-4 font-label-md text-label-md text-secondary">Job Title</th>
                        <th class="px-lg py-4 font-label-md text-label-md text-secondary">Status</th>
                        <th class="px-lg py-4 font-label-md text-label-md text-secondary">App. Date</th>
                        <th class="px-lg py-4 font-label-md text-label-md text-secondary text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant">
                @forelse($applications as $app)
                    @php
                        $badgeClass = match($app->status) {
                            'applied'   => 'bg-secondary-container text-on-secondary-container',
                            'in_review' => 'bg-surface-container-highest text-secondary',
                            'interview' => 'bg-primary/10 text-primary',
                            'offer'     => 'bg-green-100 text-green-800',
                            'rejected'  => 'bg-error-container text-on-error-container',
                            default     => 'bg-surface-container text-secondary',
                        };
                        $statusLabel = match($app->status) {
                            'applied'   => 'Applied',
                            'in_review' => 'In Review',
                            'interview' => 'Interview',
                            'offer'     => 'Offer',
                            'rejected'  => 'Rejected',
                            'ghosted'   => 'Ghosted',
                            default     => ucfirst($app->status),
                        };
                    @endphp
                    <tr class="hover:bg-surface-container-lowest/50 transition-colors">
                        <td class="px-lg py-4">
                            <span class="font-label-md text-label-md">{{ $app->company_name }}</span>
                        </td>
                        <td class="px-lg py-4 font-body-md text-body-md text-on-surface">{{ $app->role }}</td>
                        <td class="px-lg py-4">
                            <span class="{{ $badgeClass }} px-3 py-1 rounded-full text-[12px] font-bold inline-flex items-center gap-1">
                                {{ $statusLabel }}
                            </span>
                        </td>
                        <td class="px-lg py-4 font-body-sm text-body-sm text-secondary">
                            {{ $app->date_applied ? $app->date_applied->format('M d, Y') : '—' }}
                        </td>
                        <td class="px-lg py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('applications.show', $app) }}" class="p-2 hover:bg-surface-container rounded-lg transition-all" title="View">
                                    <span class="material-symbols-outlined text-secondary">visibility</span>
                                </a>
                                <a href="{{ route('applications.edit', $app) }}" class="p-2 hover:bg-surface-container rounded-lg transition-all" title="Edit">
                                    <span class="material-symbols-outlined text-secondary">edit</span>
                                </a>
                                <form method="POST" action="{{ route('applications.destroy', $app) }}" onsubmit="return confirm('Delete this application?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 hover:bg-error-container/20 rounded-lg transition-all" title="Delete">
                                        <span class="material-symbols-outlined text-error">delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-lg py-xl text-center font-body-md text-body-md text-secondary">
                            No applications yet.
                            <a href="{{ route('applications.create') }}" class="text-primary hover:underline ml-1">Add your first one.</a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-lg py-4 bg-surface-container-low border-t border-outline-variant flex items-center justify-between">
            <span class="font-body-sm text-body-sm text-secondary">
                Showing {{ $applications->firstItem() ?? 0 }} to {{ $applications->lastItem() ?? 0 }} of {{ $applications->total() }} entries
            </span>
            <div>{{ $applications->links() }}</div>
        </div>
    </div>
</main>

<a href="{{ route('applications.create') }}" class="fixed bottom-lg right-lg w-14 h-14 bg-primary text-on-primary rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-50">
    <span class="material-symbols-outlined text-[28px]" style="font-variation-settings: 'FILL' 1;">add</span>
</a>
</body>
</html>
