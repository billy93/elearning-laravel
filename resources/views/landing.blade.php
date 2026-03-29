@extends('layouts.app')

@section('content')
    <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-slate-900 via-teal-900 to-emerald-800 p-7 text-white shadow-2xl sm:p-10">
        <div class="absolute -right-10 -top-10 h-44 w-44 rounded-full bg-cyan-300/20 blur-2xl"></div>
        <div class="absolute -bottom-12 -left-8 h-48 w-48 rounded-full bg-emerald-300/20 blur-2xl"></div>

        <div class="relative max-w-3xl">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-100">Platform belajar online</p>
            <h1 class="mt-3 text-3xl font-black leading-tight sm:text-5xl">Selamat datang di e-learning</h1>
            <p class="mt-4 text-sm leading-relaxed text-emerald-50 sm:text-lg">Belajar materi video dan text dalam satu tempat. Login sebagai student untuk mulai belajar, atau login admin untuk mengelola materi.</p>

            <div class="mt-6 flex flex-wrap items-center gap-3">
                <a href="{{ route('login') }}" class="rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition hover:bg-emerald-100">Login sekarang</a>
                <span class="rounded-xl border border-white/30 px-4 py-3 text-sm text-emerald-100">Akses materi khusus pengguna login</span>
            </div>
        </div>
    </section>

    <section class="mt-6 grid gap-4 sm:grid-cols-3">
        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <h2 class="text-base font-bold text-slate-900">Materi Video</h2>
            <p class="mt-2 text-sm text-slate-600">Admin dapat upload link video pembelajaran untuk ditonton student.</p>
        </article>
        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <h2 class="text-base font-bold text-slate-900">Materi Text</h2>
            <p class="mt-2 text-sm text-slate-600">Ringkasan materi text tersedia untuk pembelajaran cepat dan terstruktur.</p>
        </article>
        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <h2 class="text-base font-bold text-slate-900">Role Admin/Student</h2>
            <p class="mt-2 text-sm text-slate-600">Hak akses dipisah jelas agar pengelolaan materi aman dan teratur.</p>
        </article>
    </section>
@endsection
