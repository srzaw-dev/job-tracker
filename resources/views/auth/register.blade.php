<!DOCTYPE html>
<html class="light" lang="en">
<head>
@include('partials.trackr-head', ['title' => 'Create Account'])
</head>
<body class="bg-background text-on-background min-h-screen flex items-center justify-center p-md md:p-lg">
<div class="w-full max-w-[1200px] grid grid-cols-1 md:grid-cols-2 bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm border border-outline-variant">

    {{-- Brand/Hero Section --}}
    <div class="relative hidden md:flex flex-col justify-between p-margin-desktop bg-primary text-on-primary">
        <div class="z-10">
            <div class="flex items-center gap-2 mb-xl">
                <span class="material-symbols-outlined text-[32px]">track_changes</span>
                <h1 class="font-headline-md text-headline-md font-black tracking-tight">Trackr</h1>
            </div>
            <h2 class="font-headline-lg text-headline-lg mb-md leading-tight">Master your professional momentum.</h2>
            <p class="font-body-lg text-body-lg opacity-90 max-w-[400px]">Join thousands of professionals managing their career trajectory with energetic utility and focused precision.</p>
        </div>
        <div class="z-10 mt-auto">
            <p class="font-label-md text-label-md">Trusted by 5,000+ applicants globally</p>
        </div>
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <div class="absolute top-0 right-0 w-full h-full bg-[radial-gradient(circle_at_70%_20%,#ffdbce_0%,transparent_50%)]"></div>
            <div class="absolute bottom-0 left-0 w-full h-full bg-[radial-gradient(circle_at_20%_80%,#ffb599_0%,transparent_40%)]"></div>
        </div>
    </div>

    {{-- Registration Form Section --}}
    <div class="flex flex-col p-md md:p-margin-desktop bg-surface-container-lowest">
        <div class="flex items-center gap-2 mb-xl md:hidden">
            <span class="material-symbols-outlined text-primary text-[28px]">track_changes</span>
            <span class="font-headline-sm text-headline-sm font-black text-primary">Trackr</span>
        </div>
        <div class="mb-xl">
            <h2 class="font-headline-md text-headline-md text-on-surface mb-xs">Create Account</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">Start managing your applications today.</p>
        </div>

        <form class="space-y-lg" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="space-y-xs">
                <label class="font-label-sm text-label-sm text-on-surface-variant block" for="name">Full Name</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">person</span>
                    <input class="w-full pl-xl pr-md py-md bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-md text-body-md text-on-surface placeholder:text-outline @error('name') border-error @enderror"
                        id="name" name="name" type="text" placeholder="John Doe"
                        value="{{ old('name') }}" autocomplete="name" autofocus />
                </div>
                @error('name')
                    <p class="font-label-sm text-label-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-xs">
                <label class="font-label-sm text-label-sm text-on-surface-variant block" for="email">Email Address</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">mail</span>
                    <input class="w-full pl-xl pr-md py-md bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-md text-body-md text-on-surface placeholder:text-outline @error('email') border-error @enderror"
                        id="email" name="email" type="email" placeholder="name@company.com"
                        value="{{ old('email') }}" autocomplete="email" />
                </div>
                @error('email')
                    <p class="font-label-sm text-label-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-lg">
                <div class="space-y-xs">
                    <label class="font-label-sm text-label-sm text-on-surface-variant block" for="password">Password</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">lock</span>
                        <input class="w-full pl-xl pr-md py-md bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-md text-body-md text-on-surface placeholder:text-outline @error('password') border-error @enderror"
                            id="password" name="password" type="password" placeholder="••••••••"
                            autocomplete="new-password" />
                    </div>
                    @error('password')
                        <p class="font-label-sm text-label-sm text-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="space-y-xs">
                    <label class="font-label-sm text-label-sm text-on-surface-variant block" for="password_confirmation">Confirm Password</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">lock_reset</span>
                        <input class="w-full pl-xl pr-md py-md bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all font-body-md text-body-md text-on-surface placeholder:text-outline"
                            id="password_confirmation" name="password_confirmation" type="password" placeholder="••••••••"
                            autocomplete="new-password" />
                    </div>
                </div>
            </div>

            <button class="w-full py-md bg-primary text-on-primary font-label-md text-label-md rounded-lg hover:bg-primary-container active:scale-[0.98] transition-all flex justify-center items-center gap-sm mt-md shadow-sm" type="submit">
                Create Account
                <span class="material-symbols-outlined">arrow_forward</span>
            </button>
        </form>

        <div class="mt-xl pt-lg border-t border-outline-variant flex flex-col items-center gap-md">
            <p class="font-body-md text-body-md text-on-surface-variant">
                Already have an account? <a class="text-primary font-bold hover:underline" href="{{ route('login') }}">Login</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>
