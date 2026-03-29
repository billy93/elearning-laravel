<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'E-Learning' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
    <header class="border-b border-slate-200 bg-white/90 backdrop-blur">
        <div class="mx-auto flex w-full max-w-6xl flex-wrap items-center justify-between gap-3 px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ auth()->check() ? route('materials.index') : route('landing') }}" class="inline-flex items-center gap-2 text-base font-bold tracking-tight sm:text-lg">
                <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl bg-emerald-500 text-sm font-black text-white">EL</span>
                <span>E-Learning</span>
            </a>

            <nav class="flex items-center gap-2 text-sm sm:gap-3">
                @auth
                    <a href="{{ route('materials.index') }}" class="rounded-lg px-3 py-2 font-medium text-slate-700 transition hover:bg-slate-100">Materi</a>

                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="rounded-lg px-3 py-2 font-medium text-slate-700 transition hover:bg-slate-100">Dashboard</a>
                        <a href="{{ route('admin.materials.index') }}" class="rounded-lg px-3 py-2 font-medium text-slate-700 transition hover:bg-slate-100">Admin</a>
                    @endif

                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="rounded-lg bg-emerald-500 px-3 py-2 font-semibold text-white transition hover:bg-emerald-600">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="rounded-lg bg-emerald-500 px-3 py-2 font-semibold text-white transition hover:bg-emerald-600">Login</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="mx-auto w-full max-w-6xl px-4 py-6 sm:px-6 lg:px-8 lg:py-8">
        @if(session('success'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        @isset($slot)
            {{ $slot }}
        @else
            @yield('content')
        @endisset
    </main>
</body>
</html>
