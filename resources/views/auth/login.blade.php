<!DOCTYPE html>
<html class="light" lang="en">
<head>
@include('partials.trackr-head', ['title' => 'Login'])
<style>
    body {
        background-image:
            radial-gradient(at 0% 0%, hsla(20,100%,95%,1) 0, transparent 50%),
            radial-gradient(at 100% 100%, hsla(210,100%,98%,1) 0, transparent 50%);
    }
</style>
</head>
<body class="min-h-screen flex items-center justify-center p-margin-mobile md:p-margin-desktop font-body-md text-on-background">
<main class="w-full max-w-[440px] flex flex-col gap-lg">
    <header class="flex flex-col items-center text-center gap-sm">
        <div class="w-16 h-16 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container shadow-sm border border-outline-variant/30">
            <span class="material-symbols-outlined !text-[40px]">track_changes</span>
        </div>
        <div class="mt-xs">
            <h1 class="font-headline-lg text-headline-lg text-primary tracking-tight">Trackr</h1>
            <p class="font-label-md text-label-md text-secondary uppercase tracking-widest mt-1">Career Manager Login</p>
        </div>
    </header>

    <section class="bg-surface-container-lowest border border-outline-variant/50 rounded-xl p-lg shadow-[0px_1px_3px_rgba(15,23,42,0.08)]">
        <form class="flex flex-col gap-md" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex flex-col gap-xs">
                <label class="font-label-sm text-label-sm text-on-surface-variant" for="email">Email Address</label>
                <input class="w-full h-12 px-md font-body-md text-body-md bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none placeholder:text-on-surface-variant/40 @error('email') border-error @enderror"
                    id="email" name="email" type="email" placeholder="name@company.com"
                    value="{{ old('email') }}" autocomplete="email" autofocus />
                @error('email')
                    <p class="font-label-sm text-label-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-xs">
                <div class="flex justify-between items-center">
                    <label class="font-label-sm text-label-sm text-on-surface-variant" for="password">Password</label>
                    @if (Route::has('password.request'))
                        <a class="font-label-sm text-label-sm text-primary hover:underline transition-all" href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>
                <input class="w-full h-12 px-md font-body-md text-body-md bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none placeholder:text-on-surface-variant/40 @error('password') border-error @enderror"
                    id="password" name="password" type="password" placeholder="••••••••"
                    autocomplete="current-password" />
                @error('password')
                    <p class="font-label-sm text-label-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <button class="w-full h-12 mt-sm bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md rounded-lg flex items-center justify-center gap-sm shadow-sm transition-all active:scale-[0.98]" type="submit">
                Login
                <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
        </form>

        <div class="mt-lg pt-lg border-t border-outline-variant/30 text-center">
            <p class="font-body-sm text-body-sm text-secondary">
                Don't have an account?
                <a class="font-label-md text-label-md text-primary hover:underline ml-xs transition-all" href="{{ route('register') }}">Get Started</a>
            </p>
        </div>
    </section>

    <aside class="grid grid-cols-2 gap-sm opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
        <div class="flex items-center gap-xs px-md py-xs rounded-full border border-outline-variant bg-surface-container-low">
            <span class="material-symbols-outlined text-[16px] text-secondary">verified_user</span>
            <span class="font-label-sm text-label-sm text-secondary">Secure SSL</span>
        </div>
        <div class="flex items-center gap-xs px-md py-xs rounded-full border border-outline-variant bg-surface-container-low">
            <span class="material-symbols-outlined text-[16px] text-secondary">cloud_done</span>
            <span class="font-label-sm text-label-sm text-secondary">Cloud Sync</span>
        </div>
    </aside>

    <footer class="text-center">
        <p class="font-label-sm text-label-sm text-on-surface-variant/60">
            &copy; {{ date('Y') }} Trackr Inc. All rights reserved.
        </p>
    </footer>
</main>
</body>
</html>
