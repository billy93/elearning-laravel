@extends('layouts.app')

@section('content')
    <section class="mx-auto grid w-full max-w-5xl gap-8 lg:grid-cols-2 lg:items-stretch">
        <div class="rounded-2xl bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 p-6 text-white shadow-xl sm:p-8">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-100">Portal belajar</p>
            <h1 class="mt-3 text-2xl font-black leading-tight sm:text-3xl">Masuk ke platform e-learning</h1>
            <p class="mt-3 text-sm leading-relaxed text-emerald-100 sm:text-base">Admin dapat upload materi video/text. Student bisa langsung akses materi yang sudah dipublish.</p>

            <div class="mt-6 space-y-3 text-sm">
                <div class="rounded-xl bg-white/15 p-3">
                    <p class="font-semibold">Akun Admin Demo</p>
                    <p>Email: admin@elearning.test</p>
                    <p>Password: password123</p>
                </div>
                <div class="rounded-xl bg-white/15 p-3">
                    <p class="font-semibold">Akun Student Demo</p>
                    <p>Email: student@elearning.test</p>
                    <p>Password: password123</p>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            <h2 class="text-xl font-bold text-slate-900">Login</h2>
            <p class="mt-1 text-sm text-slate-500">Masukkan akun yang sudah disediakan.</p>

            <form action="{{ route('login.attempt') }}" method="POST" class="mt-6 space-y-5">
                @csrf

                <div>
                    <label for="email" class="mb-1 block text-sm font-medium text-slate-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm outline-none ring-emerald-500 transition focus:border-emerald-500 focus:ring" placeholder="nama@email.com">
                    @error('email')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="mb-1 block text-sm font-medium text-slate-700">Password</label>
                    <input id="password" name="password" type="password" required class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm outline-none ring-emerald-500 transition focus:border-emerald-500 focus:ring" placeholder="••••••••">
                </div>

                <label class="inline-flex items-center gap-2 text-sm text-slate-600">
                    <input type="checkbox" name="remember" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                    Ingat saya
                </label>

                <button type="submit" class="w-full rounded-xl bg-emerald-500 px-4 py-3 text-sm font-semibold text-white transition hover:bg-emerald-600">Masuk</button>
            </form>
        </div>
</section>
@endsection
