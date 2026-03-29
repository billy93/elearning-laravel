@extends('layouts.app')

@section('content')
    <section class="rounded-3xl bg-gradient-to-r from-slate-900 via-teal-900 to-emerald-800 p-6 text-white shadow-xl sm:p-8">
        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-100">Student area</p>
        <h1 class="mt-2 text-2xl font-black leading-tight sm:text-3xl">Materi Pembelajaran</h1>
        <p class="mt-2 max-w-3xl text-sm text-emerald-50 sm:text-base">Pilih materi video untuk menonton pembahasan, atau materi text untuk membaca ringkasan lengkap.</p>
    </section>

    <section class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($materials as $material)
            <article class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="mb-3 inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $material->type === 'video' ? 'bg-cyan-100 text-cyan-700' : 'bg-amber-100 text-amber-700' }}">
                    {{ strtoupper($material->type) }}
                </div>
                <h2 class="line-clamp-2 text-lg font-bold text-slate-900">{{ $material->title }}</h2>
                <p class="mt-2 text-sm text-slate-500">Dibuat oleh {{ $material->creator->name ?? 'Admin' }}</p>

                <a href="{{ route('materials.show', $material->slug) }}" class="mt-4 inline-flex items-center gap-2 rounded-lg bg-slate-900 px-3 py-2 text-sm font-medium text-white transition group-hover:bg-emerald-600">
                    Buka materi
                    <span aria-hidden="true">-&gt;</span>
                </a>
            </article>
        @empty
            <div class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-white p-8 text-center">
                <p class="font-semibold text-slate-700">Belum ada materi dipublish.</p>
                <p class="mt-1 text-sm text-slate-500">Silakan login sebagai admin untuk menambah materi.</p>
            </div>
        @endforelse
</section>
@endsection
