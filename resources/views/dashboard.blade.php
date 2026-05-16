<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Trackr - Career Manager Dashboard</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "secondary": "#565e74",
                      "tertiary-fixed-dim": "#ffb690",
                      "tertiary": "#994100",
                      "on-secondary": "#ffffff",
                      "surface": "#f8f9ff",
                      "surface-variant": "#d3e4fe",
                      "on-secondary-fixed-variant": "#3f465c",
                      "tertiary-container": "#c05400",
                      "tertiary-fixed": "#ffdbca",
                      "on-error-container": "#93000a",
                      "primary-fixed-dim": "#ffb599",
                      "background": "#f8f9ff",
                      "on-tertiary-fixed": "#341100",
                      "surface-bright": "#f8f9ff",
                      "on-error": "#ffffff",
                      "error-container": "#ffdad6",
                      "on-primary-fixed-variant": "#7f2b00",
                      "outline-variant": "#e2bfb2",
                      "surface-container-low": "#eff4ff",
                      "inverse-primary": "#ffb599",
                      "on-tertiary-container": "#fffbff",
                      "primary-container": "#cc4900",
                      "on-primary": "#ffffff",
                      "error": "#ba1a1a",
                      "surface-container-lowest": "#ffffff",
                      "surface-dim": "#cbdbf5",
                      "on-tertiary-fixed-variant": "#783200",
                      "secondary-container": "#dae2fd",
                      "surface-container-highest": "#d3e4fe",
                      "primary": "#a33900",
                      "surface-container": "#e5eeff",
                      "on-surface-variant": "#5a4138",
                      "outline": "#8e7166",
                      "on-surface": "#0b1c30",
                      "secondary-fixed": "#dae2fd",
                      "secondary-fixed-dim": "#bec6e0",
                      "inverse-on-surface": "#eaf1ff",
                      "on-background": "#0b1c30",
                      "on-primary-fixed": "#370e00",
                      "on-secondary-container": "#5c647a",
                      "inverse-surface": "#213145",
                      "on-primary-container": "#fffbff",
                      "surface-container-high": "#dce9ff",
                      "on-secondary-fixed": "#131b2e",
                      "on-tertiary": "#ffffff",
                      "surface-tint": "#a73a00"
              },
              "borderRadius": {
                      "DEFAULT": "0.125rem",
                      "lg": "0.25rem",
                      "xl": "0.5rem",
                      "full": "0.75rem"
              },
              "spacing": {
                      "base": "8px",
                      "xs": "4px",
                      "xl": "32px",
                      "margin-mobile": "16px",
                      "sm": "8px",
                      "lg": "24px",
                      "md": "16px",
                      "gutter": "24px",
                      "margin-desktop": "40px"
              },
              "fontFamily": {
                      "body-md": ["Hanken Grotesk"],
                      "label-md": ["Hanken Grotesk"],
                      "body-lg": ["Hanken Grotesk"],
                      "label-sm": ["Hanken Grotesk"],
                      "headline-sm": ["Hanken Grotesk"],
                      "body-sm": ["Hanken Grotesk"],
                      "headline-lg": ["Hanken Grotesk"],
                      "headline-lg-mobile": ["Hanken Grotesk"],
                      "headline-md": ["Hanken Grotesk"]
              }
            }
          }
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .donut-segment {
            transition: stroke-dashoffset 0.35s;
        }
        .bento-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 24px;
        }
    </style>
</head>
<body class="bg-background font-body-md text-on-background antialiased min-h-screen">

<!-- SideNavBar Shell -->
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
<a class="flex items-center gap-3 px-4 py-3 text-primary border-l-4 border-primary bg-primary-container/10 transition-all duration-200 ease-in-out font-label-md text-label-md" href="{{ route('dashboard') }}">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">dashboard</span>
    Dashboard
</a>
<a class="flex items-center gap-3 px-4 py-3 text-secondary hover:bg-surface-container transition-colors font-label-md text-label-md" href="{{ route('applications.index') }}">
<span class="material-symbols-outlined">work</span>
    Applications
</a>
<a class="flex items-center gap-3 px-4 py-3 text-secondary hover:bg-surface-container transition-colors font-label-md text-label-md" href="{{ route('documents.index') }}">
<span class="material-symbols-outlined">description</span>
    Documents
</a>
<a class="flex items-center gap-3 px-4 py-3 text-secondary hover:bg-surface-container transition-colors font-label-md text-label-md" href="{{ route('profile.edit') }}">
<span class="material-symbols-outlined">settings</span>
    Settings
</a>
</nav>
<div class="px-md mt-auto pt-lg border-t border-outline-variant">
<div class="flex items-center gap-3 p-2 rounded-xl hover:bg-surface-container transition-colors cursor-pointer">
<div class="w-8 h-8 rounded-full bg-primary/20 border border-outline-variant flex items-center justify-center text-primary font-bold text-sm flex-shrink-0">
    {{ auth()->user()->initials() }}
</div>
<div class="overflow-hidden">
<p class="font-label-md text-label-md text-on-surface truncate">{{ auth()->user()->name }}</p>
<form method="POST" action="{{ route('logout') }}" class="inline">
    @csrf
    <button type="submit" class="font-label-sm text-label-sm text-secondary hover:text-primary transition-colors truncate">
        Log out
    </button>
</form>
</div>
</div>
</div>
</div>
</aside>

<!-- TopAppBar Shell -->
<header class="sticky top-0 w-full z-40 h-16 bg-surface border-b border-outline-variant shadow-sm flex justify-between items-center px-lg ml-[240px] w-[calc(100%-240px)]">
<div class="flex items-center gap-lg flex-1">
<div class="relative w-full max-w-md focus-within:ring-2 focus-within:ring-primary rounded-full transition-all">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-secondary">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-surface-container-low border-none rounded-full text-body-sm focus:ring-0" placeholder="Search applications..." type="text"/>
</div>
</div>
<div class="flex items-center gap-md">
<button class="hover:bg-surface-container-high rounded-full p-2 text-on-surface-variant transition-all">
<span class="material-symbols-outlined">notifications</span>
</button>
<button class="hover:bg-surface-container-high rounded-full p-2 text-on-surface-variant transition-all">
<span class="material-symbols-outlined">help_outline</span>
</button>
<div class="h-8 w-px bg-outline-variant mx-2"></div>
<div class="flex gap-sm">
<a href="{{ route('documents.index') }}" class="border border-primary text-primary px-4 py-2 rounded-full font-label-md text-label-md hover:bg-primary/5 transition-all flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">add_circle</span>
    New Document
</a>
<a href="{{ route('applications.create') }}" class="bg-primary text-on-primary px-4 py-2 rounded-full font-label-md text-label-md hover:opacity-90 transition-all flex items-center gap-2 shadow-sm">
<span class="material-symbols-outlined text-[18px]">add</span>
    New Application
</a>
</div>
</div>
</header>

<!-- Main Content Area -->
<main class="ml-[240px] p-margin-desktop min-h-[calc(100vh-64px)]">

<!-- Header Section -->
<div class="mb-xl flex justify-between items-end">
<div>
<h2 class="font-headline-lg text-headline-lg text-on-surface">Welcome back, {{ explode(' ', auth()->user()->name)[0] }}</h2>
<p class="font-body-md text-body-md text-secondary">You have {{ $open }} open application{{ $open !== 1 ? 's' : '' }} in progress.</p>
</div>
<div class="flex gap-sm">
<a href="{{ route('applications.create') }}" class="px-4 py-2 rounded-lg bg-primary text-on-primary font-label-md text-label-md hover:opacity-95 transition-all shadow-sm">Quick Add</a>
</div>
</div>

<!-- Stats Cards Bento Layout -->
<div class="bento-grid mb-xl">

<!-- Total Applications -->
<div class="col-span-3 bg-surface-container-lowest border border-outline-variant p-lg rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex justify-between items-start">
<div class="bg-primary/10 p-2 rounded-lg">
<span class="material-symbols-outlined text-primary">assignment</span>
</div>
</div>
<div class="mt-4">
<p class="font-label-sm text-label-sm text-secondary uppercase tracking-wider">Total Applications</p>
<h3 class="font-headline-lg text-headline-lg text-on-surface">{{ $stats->sum() }}</h3>
</div>
</div>

<!-- Applied -->
<div class="col-span-3 bg-surface-container-lowest border border-outline-variant p-lg rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex justify-between items-start">
<div class="bg-tertiary-container/10 p-2 rounded-lg">
<span class="material-symbols-outlined text-tertiary">send</span>
</div>
</div>
<div class="mt-4">
<p class="font-label-sm text-label-sm text-secondary uppercase tracking-wider">Applied</p>
<h3 class="font-headline-lg text-headline-lg text-on-surface">{{ $stats->get('applied', 0) }}</h3>
</div>
</div>

<!-- Waiting Response -->
<div class="col-span-3 bg-surface-container-lowest border border-outline-variant p-lg rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex justify-between items-start">
<div class="bg-secondary-container/30 p-2 rounded-lg">
<span class="material-symbols-outlined text-secondary">hourglass_empty</span>
</div>
</div>
<div class="mt-4">
<p class="font-label-sm text-label-sm text-secondary uppercase tracking-wider">Waiting Response</p>
<h3 class="font-headline-lg text-headline-lg text-on-surface">{{ $stats->get('in_review', 0) }}</h3>
</div>
</div>

<!-- Interviews -->
<div class="col-span-3 bg-surface-container-lowest border border-outline-variant p-lg rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex justify-between items-start">
<div class="bg-primary/10 p-2 rounded-lg">
<span class="material-symbols-outlined text-primary">groups</span>
</div>
<div class="flex items-center gap-1 text-primary font-label-sm">
<span class="material-symbols-outlined text-[14px]">trending_up</span>
<span>High Priority</span>
</div>
</div>
<div class="mt-4">
<p class="font-label-sm text-label-sm text-secondary uppercase tracking-wider">Interviews</p>
<h3 class="font-headline-lg text-headline-lg text-on-surface">{{ $stats->get('interview', 0) }}</h3>
</div>
</div>

</div>

<!-- Secondary Content Area -->
<div class="bento-grid mb-xl">

<!-- Recent Applications List -->
<div class="col-span-8 bg-surface-container-lowest border border-outline-variant rounded-xl shadow-sm overflow-hidden flex flex-col">
<div class="p-lg border-b border-outline-variant flex justify-between items-center">
<h4 class="font-headline-sm text-headline-sm text-on-surface">Recent Applications</h4>
<a href="{{ route('applications.index') }}" class="text-primary font-label-md text-label-md hover:underline">View All</a>
</div>
<div class="flex flex-col">
<div class="flex items-center justify-between p-lg hover:bg-surface-container transition-colors border-b border-outline-variant last:border-0">
<div class="flex items-center gap-lg">
<div class="w-12 h-12 rounded-lg bg-surface flex items-center justify-center border border-outline-variant overflow-hidden">
<img alt="Google Logo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3Zy50N_DMGazMKGyXDu8voFVs-fmgYd_fm2Qqh-0OedAv7IkfsxJMhcSz6Q2r1gc4kIRYcuMpapQ_rEtkzrwPVP7VS72VhqKFsLRo4t19T6GlGyz5GYDpWBEpHC_TNDTbDJA8J7LmmUTHyUJo1B0XfHVvkV_v3AywmvAXqTUxwd-1rgP4Um2QLWLAQWq3rTMJskMFAVH9tZqyOqz0NhiVKCszyBmIbuTknp4PNvqExpYG_H8riVGVk-RSfQMy2cSI9oKKYeS2XrZY"/>
</div>
<div>
<p class="font-label-md text-label-md text-on-surface">Product Designer</p>
<p class="font-body-sm text-body-sm text-secondary">Google • Applied 2 days ago</p>
</div>
</div>
<div class="flex items-center gap-xl">
<span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-label-sm font-label-sm">Interview</span>
<span class="material-symbols-outlined text-secondary cursor-pointer hover:text-on-surface">more_vert</span>
</div>
</div>
<div class="flex items-center justify-between p-lg hover:bg-surface-container transition-colors border-b border-outline-variant last:border-0">
<div class="flex items-center gap-lg">
<div class="w-12 h-12 rounded-lg bg-surface flex items-center justify-center border border-outline-variant overflow-hidden">
<img alt="Stripe Logo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBZpsoxn79nVhr3hKH14hvasm8puf0Ee37hOme-wRGBva7hqIN3GEsOHKNN0btxIBwclVHKxBCSn5eM05YAiF9PWQmcTllOH80_GrA23nuJgcJwmok0hQEoQ0ydFYhANbJ2D2kaXo3Gfic2u0kJbuxqX-PuTzWf01ceeJCwWNhwnHFmXf51c_ESPCCxnWArlAqfFccuCNMPLdJ6_SbGoXrXUTJhkGgGfAYRaEad_uQ-uxBJBozy1IHfvwNLUDJvttAnVXkIZPqLvMGZ"/>
</div>
<div>
<p class="font-label-md text-label-md text-on-surface">Senior Frontend Engineer</p>
<p class="font-body-sm text-body-sm text-secondary">Stripe • Applied 4 days ago</p>
</div>
</div>
<div class="flex items-center gap-xl">
<span class="px-3 py-1 bg-surface-container-highest text-secondary rounded-full text-label-sm font-label-sm">Pending</span>
<span class="material-symbols-outlined text-secondary cursor-pointer hover:text-on-surface">more_vert</span>
</div>
</div>
<div class="flex items-center justify-between p-lg hover:bg-surface-container transition-colors border-b border-outline-variant last:border-0">
<div class="flex items-center gap-lg">
<div class="w-12 h-12 rounded-lg bg-surface flex items-center justify-center border border-outline-variant overflow-hidden">
<img alt="Airbnb Logo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCBzE3OnocIN82PErGhS2DwPN9SG3F3XRvmqCW0eUv9moyOsDSXUPojC2zGDDmorE48AfVC2VnsRoJmdJR8nu75i_v8wV34qBdUQvIVKzazMgjV3tluC8Yxgb_NBPg8ZCKlbHEhfdrTXwiMNMnAxtd8rq_fpMJEEYgxXkrDlQyQwF4cencCKSZ71RrxDzIFJTldYqpwwMFmpNKahAF13t0MoU0EhRhmUznP8es8j-8GehV5O-tKdgr6EajVctBEvd6araEdJRkvEFkG"/>
</div>
<div>
<p class="font-label-md text-label-md text-on-surface">UX Researcher</p>
<p class="font-body-sm text-body-sm text-secondary">Airbnb • Applied 1 week ago</p>
</div>
</div>
<div class="flex items-center gap-xl">
<span class="px-3 py-1 bg-surface-container-highest text-secondary rounded-full text-label-sm font-label-sm">Pending</span>
<span class="material-symbols-outlined text-secondary cursor-pointer hover:text-on-surface">more_vert</span>
</div>
</div>
<div class="flex items-center justify-between p-lg hover:bg-surface-container transition-colors border-b border-outline-variant last:border-0">
<div class="flex items-center gap-lg">
<div class="w-12 h-12 rounded-lg bg-surface flex items-center justify-center border border-outline-variant overflow-hidden">
<img alt="Microsoft Logo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB4Kkvij3FyFRUp_kJWFhLQiqeU5JjU63yRm41tfTNjcEtsQ45T9KtJWMArOjtdX6CaStiiiWw-xPhATa8kXRALp89yM157i4fC1jENr9GIqvuFC9rAI2M7ADEwva6ZjysJfLwBHbonyLNk_Cx2YwDP9wmaMYRs0adjWru6vrA_BDVAlY8Puk1ddDmcQtGOjk77IF5qqHQ80i17qv88xjYm5v7OOuGdeI1ckkyFlneKiYEott4n7NHhR4g02nMqDOdAuiDaJgvF6mjy"/>
</div>
<div>
<p class="font-label-md text-label-md text-on-surface">Creative Director</p>
<p class="font-body-sm text-body-sm text-secondary">Microsoft • Applied 2 weeks ago</p>
</div>
</div>
<div class="flex items-center gap-xl">
<span class="px-3 py-1 bg-tertiary-fixed text-tertiary rounded-full text-label-sm font-label-sm">Rejected</span>
<span class="material-symbols-outlined text-secondary cursor-pointer hover:text-on-surface">more_vert</span>
</div>
</div>
</div>
</div>

<!-- Status Distribution & Tasks Column -->
<div class="col-span-4 flex flex-col gap-gutter">
<div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl shadow-sm">
<div class="flex justify-between items-center mb-lg">
<h4 class="font-headline-sm text-headline-sm text-on-surface">Recent Documents</h4>
<a href="{{ route('documents.index') }}" class="text-primary font-label-md text-label-md hover:underline">View All</a>
</div>
<div class="space-y-md">
<div class="flex items-center gap-md p-2 rounded-lg hover:bg-surface-container transition-colors">
<div class="w-10 h-10 rounded bg-error-container/30 flex items-center justify-center text-error">
<span class="material-symbols-outlined">description</span>
</div>
<div class="flex-grow">
<p class="font-label-md text-label-md text-on-surface">Resume_2024.pdf</p>
<p class="font-label-sm text-label-sm text-secondary">PDF • Updated 2 days ago</p>
</div>
</div>
<div class="flex items-center gap-md p-2 rounded-lg hover:bg-surface-container transition-colors">
<div class="w-10 h-10 rounded bg-primary-container/30 flex items-center justify-center text-primary">
<span class="material-symbols-outlined">article</span>
</div>
<div class="flex-grow">
<p class="font-label-md text-label-md text-on-surface">Cover_Letter_Google.docx</p>
<p class="font-label-sm text-label-sm text-secondary">DOCX • Updated yesterday</p>
</div>
</div>
</div>
</div>

<!-- Upcoming Tasks Card -->
<div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl shadow-sm flex-grow">
<h4 class="font-headline-sm text-headline-sm text-on-surface mb-lg">Status Breakdown</h4>
<div class="space-y-md">
@foreach(['applied' => ['label' => 'Applied', 'icon' => 'send', 'color' => 'text-tertiary'], 'in_review' => ['label' => 'In Review', 'icon' => 'hourglass_empty', 'color' => 'text-secondary'], 'interview' => ['label' => 'Interview', 'icon' => 'groups', 'color' => 'text-primary'], 'offer' => ['label' => 'Offer', 'icon' => 'star', 'color' => 'text-primary'], 'rejected' => ['label' => 'Rejected', 'icon' => 'cancel', 'color' => 'text-error'], 'ghosted' => ['label' => 'Ghosted', 'icon' => 'visibility_off', 'color' => 'text-secondary']] as $status => $meta)
@if($stats->get($status, 0) > 0)
<div class="flex items-center gap-md">
<div class="mt-1 flex-shrink-0">
<span class="material-symbols-outlined {{ $meta['color'] }}">{{ $meta['icon'] }}</span>
</div>
<div class="flex-grow">
<p class="font-label-md text-label-md text-on-surface">{{ $meta['label'] }}</p>
</div>
<span class="font-label-md text-label-md text-on-surface">{{ $stats->get($status, 0) }}</span>
</div>
@endif
@endforeach
@if($stats->isEmpty())
<p class="font-body-sm text-body-sm text-secondary text-center py-4">No applications yet.</p>
@endif
</div>
</div>

</div>
</div>

</main>
</body>
</html>
