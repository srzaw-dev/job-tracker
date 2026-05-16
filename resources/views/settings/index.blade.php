<!DOCTYPE html>
<html class="light" lang="en">
<head>
@include('partials.trackr-head', ['title' => 'Settings'])
<style>
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; display: inline-block; line-height: 1; text-transform: none; letter-spacing: normal; word-wrap: normal; white-space: nowrap; direction: ltr; }
</style>
</head>
<body class="bg-surface text-on-surface">
@include('partials.nav-sidebar', ['active' => 'settings'])

<main class="ml-[240px] min-h-screen">
    <header class="sticky top-0 z-40 w-full flex items-center justify-between px-margin-desktop py-sm bg-surface/80 backdrop-blur-md border-b border-outline-variant shadow-sm">
        <div class="flex items-center gap-xl flex-grow">
            <div class="relative w-full max-w-md focus-within:ring-2 focus-within:ring-primary rounded-lg">
                <span class="absolute left-md top-1/2 -translate-y-1/2 text-secondary material-symbols-outlined">search</span>
                <input class="w-full pl-xl pr-md py-xs bg-surface-container-low border-none rounded-lg font-body-sm focus:ring-0" placeholder="Search settings..." type="text" />
            </div>
        </div>
        <div class="flex items-center gap-lg">
            <button class="text-secondary hover:text-primary transition-all p-xs flex items-center">
                <span class="material-symbols-outlined">notifications</span>
            </button>
            <div class="w-8 h-8 rounded-full bg-primary/20 border border-outline-variant flex items-center justify-center text-primary font-bold text-sm">
                {{ auth()->user()->initials() }}
            </div>
        </div>
    </header>

    <div class="p-margin-desktop max-w-4xl">
        <header class="mb-xl">
            <h2 class="font-headline-lg text-headline-lg text-on-surface">Account Management</h2>
            <p class="font-body-md text-body-md text-secondary">Control your personal information and security preferences.</p>
        </header>

        @if(session('status'))
            <div class="mb-lg p-md bg-green-50 border border-green-200 rounded-xl text-green-800 font-body-sm">
                {{ session('status') === 'profile-information-updated' ? 'Profile updated successfully.' : session('status') }}
            </div>
        @endif

        <div class="space-y-gutter">
            {{-- Profile Section --}}
            <section class="bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-sm">
                <div class="flex items-start gap-lg mb-lg">
                    <div class="p-sm bg-primary/10 rounded-lg text-primary">
                        <span class="material-symbols-outlined">person</span>
                    </div>
                    <div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface">Profile Details</h3>
                        <p class="font-body-sm text-body-sm text-secondary">Update your name and primary contact email.</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('user-profile-information.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
                        <div class="space-y-xs">
                            <label class="font-label-sm text-label-sm text-on-surface-variant" for="name">Full Name</label>
                            <input class="w-full px-md py-sm bg-surface border border-outline-variant rounded-lg font-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all @error('name') border-error @enderror"
                                id="name" name="name" type="text" value="{{ old('name', auth()->user()->name) }}" />
                            @error('name')
                                <p class="font-label-sm text-label-sm text-error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="space-y-xs">
                            <label class="font-label-sm text-label-sm text-on-surface-variant" for="email">Email Address</label>
                            <input class="w-full px-md py-sm bg-surface border border-outline-variant rounded-lg font-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all @error('email') border-error @enderror"
                                id="email" name="email" type="email" value="{{ old('email', auth()->user()->email) }}" />
                            @error('email')
                                <p class="font-label-sm text-label-sm text-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-lg pt-lg border-t border-outline-variant flex justify-end">
                        <button type="submit" class="bg-primary text-on-primary px-xl py-md rounded-lg font-label-md hover:opacity-90 transition-colors active:scale-95 duration-100">
                            Update Profile
                        </button>
                    </div>
                </form>
            </section>

            {{-- Password Section --}}
            <section class="bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-sm">
                <div class="flex items-start gap-lg mb-lg">
                    <div class="p-sm bg-primary/10 rounded-lg text-primary">
                        <span class="material-symbols-outlined">lock</span>
                    </div>
                    <div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface">Security</h3>
                        <p class="font-body-sm text-body-sm text-secondary">Change your password to keep your account secure.</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('user-password.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="space-y-lg">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
                            <div class="space-y-xs">
                                <label class="font-label-sm text-label-sm text-on-surface-variant" for="current_password">Current Password</label>
                                <input class="w-full px-md py-sm bg-surface border border-outline-variant rounded-lg font-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all @error('current_password') border-error @enderror"
                                    id="current_password" name="current_password" type="password" placeholder="••••••••" />
                                @error('current_password')
                                    <p class="font-label-sm text-label-sm text-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="space-y-xs">
                                <label class="font-label-sm text-label-sm text-on-surface-variant" for="password">New Password</label>
                                <input class="w-full px-md py-sm bg-surface border border-outline-variant rounded-lg font-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all @error('password') border-error @enderror"
                                    id="password" name="password" type="password" placeholder="••••••••" />
                                @error('password')
                                    <p class="font-label-sm text-label-sm text-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="space-y-xs">
                                <label class="font-label-sm text-label-sm text-on-surface-variant" for="password_confirmation">Confirm Password</label>
                                <input class="w-full px-md py-sm bg-surface border border-outline-variant rounded-lg font-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all"
                                    id="password_confirmation" name="password_confirmation" type="password" placeholder="••••••••" />
                            </div>
                        </div>
                        <div class="flex items-center gap-sm text-secondary">
                            <span class="material-symbols-outlined text-[18px]">info</span>
                            <p class="font-body-sm text-body-sm italic">Password must be at least 8 characters long.</p>
                        </div>
                    </div>
                    <div class="mt-lg pt-lg border-t border-outline-variant flex justify-end">
                        <button type="submit" class="border border-outline-variant text-on-surface px-xl py-md rounded-lg font-label-md hover:bg-surface-container-high transition-colors active:scale-95 duration-100">
                            Change Password
                        </button>
                    </div>
                </form>
            </section>

            {{-- Account Session --}}
            <section class="bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-sm">
                <div class="flex items-center justify-between flex-wrap gap-lg">
                    <div class="flex items-start gap-lg">
                        <div class="p-sm bg-error/10 rounded-lg text-error">
                            <span class="material-symbols-outlined">logout</span>
                        </div>
                        <div>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface">Account Session</h3>
                            <p class="font-body-sm text-body-sm text-secondary">Logout from your active session.</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-error text-on-error px-xl py-md rounded-lg font-label-md hover:opacity-90 transition-opacity active:scale-95 duration-100 flex items-center gap-sm">
                            <span class="material-symbols-outlined">power_settings_new</span>
                            Logout Session
                        </button>
                    </form>
                </div>
            </section>

            {{-- Danger Zone --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                <div class="md:col-span-2 bg-gradient-to-br from-error-container/20 to-error-container/40 border border-error/20 rounded-xl p-lg">
                    <h4 class="font-headline-sm text-headline-sm text-error mb-xs">Danger Zone</h4>
                    <p class="font-body-sm text-body-sm text-on-error-container mb-lg">Permanently delete your account and all associated job applications, documents, and tracking data. This action is irreversible.</p>
                    <button type="button" class="text-error font-label-md hover:underline decoration-2 underline-offset-4">Delete Account Forever</button>
                </div>
                <div class="bg-primary/5 border border-primary/10 rounded-xl p-lg flex flex-col items-center justify-center text-center">
                    <span class="material-symbols-outlined text-[48px] text-primary mb-md">rocket_launch</span>
                    <h4 class="font-label-md text-label-md text-on-surface mb-xs">Help the project grow</h4>
                    <p class="font-body-sm text-body-sm text-secondary mb-md">Share Trackr with a colleague</p>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
