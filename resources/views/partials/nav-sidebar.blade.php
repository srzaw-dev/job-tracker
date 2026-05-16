{{-- Shared sidebar navigation --}}
{{-- Usage: @include('partials.nav-sidebar', ['active' => 'dashboard']) --}}
{{-- active: 'dashboard' | 'applications' | 'documents' | 'settings' --}}
<aside class="fixed left-0 top-0 h-full w-[240px] flex flex-col bg-surface-container-lowest border-r border-outline-variant shadow-sm z-50">
<div class="flex flex-col h-full py-lg">
<div class="px-lg mb-xl">
<div class="flex items-center gap-2 mb-1">
<span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">rocket_launch</span>
<h1 class="font-headline-md text-headline-md font-bold text-primary">Trackr</h1>
</div>
<p class="font-label-sm text-label-sm text-secondary">Career Manager</p>
</div>
<nav class="flex-grow">
@php
$navItems = [
    ['route' => 'dashboard',          'key' => 'dashboard',     'icon' => 'dashboard',   'label' => 'Dashboard'],
    ['route' => 'applications.index', 'key' => 'applications',  'icon' => 'work',        'label' => 'Applications'],
    ['route' => 'documents.index',    'key' => 'documents',     'icon' => 'description', 'label' => 'Documents'],
    ['route' => 'profile.edit',       'key' => 'settings',      'icon' => 'settings',    'label' => 'Settings'],
];
@endphp
@foreach($navItems as $item)
@if(($active ?? '') === $item['key'])
<a class="flex items-center gap-3 px-4 py-3 text-primary border-l-4 border-primary bg-primary-container/10 font-label-md text-label-md" href="{{ route($item['route']) }}">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">{{ $item['icon'] }}</span>
{{ $item['label'] }}
</a>
@else
<a class="flex items-center gap-3 px-4 py-3 text-secondary hover:bg-surface-container transition-colors font-label-md text-label-md" href="{{ route($item['route']) }}">
<span class="material-symbols-outlined">{{ $item['icon'] }}</span>
{{ $item['label'] }}
</a>
@endif
@endforeach
</nav>
<div class="px-md mt-auto pt-lg border-t border-outline-variant">
<div class="flex items-center gap-3 p-2 rounded-xl hover:bg-surface-container transition-colors">
<div class="w-8 h-8 rounded-full bg-primary/20 border border-outline-variant flex items-center justify-center text-primary font-bold text-sm flex-shrink-0">
{{ auth()->user()->initials() }}
</div>
<div class="overflow-hidden">
<p class="font-label-md text-label-md text-on-surface truncate">{{ auth()->user()->name }}</p>
<form method="POST" action="{{ route('logout') }}" class="inline">
@csrf
<button type="submit" class="font-label-sm text-label-sm text-secondary hover:text-primary transition-colors">Log out</button>
</form>
</div>
</div>
</div>
</div>
</aside>
