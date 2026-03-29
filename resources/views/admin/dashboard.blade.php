@extends('layouts.app')

@section('content')
    <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-600">Admin dashboard</p>
        <h1 class="mt-1 text-2xl font-black text-slate-900">Statistik e-learning</h1>
        <p class="mt-2 text-sm text-slate-500">Ringkasan data materi dan student secara real-time.</p>
    </section>

    <section class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Total materi</p>
            <p class="mt-2 text-3xl font-black text-slate-900">{{ $stats['total_materials'] }}</p>
        </article>
        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Materi publish</p>
            <p class="mt-2 text-3xl font-black text-emerald-600">{{ $stats['published_materials'] }}</p>
        </article>
        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Materi draft</p>
            <p class="mt-2 text-3xl font-black text-amber-600">{{ $stats['draft_materials'] }}</p>
        </article>
        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Materi video</p>
            <p class="mt-2 text-3xl font-black text-cyan-600">{{ $stats['video_materials'] }}</p>
        </article>
        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Materi text</p>
            <p class="mt-2 text-3xl font-black text-indigo-600">{{ $stats['text_materials'] }}</p>
        </article>
        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Total student</p>
            <p class="mt-2 text-3xl font-black text-slate-900">{{ $stats['student_count'] }}</p>
        </article>
    </section>

    <section class="mt-6 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
        <div class="mb-4 flex items-center justify-between gap-3">
            <h2 class="text-lg font-bold text-slate-900">Materi terbaru</h2>
            <a href="{{ route('admin.materials.index') }}" class="rounded-lg border border-slate-300 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">Kelola materi</a>
        </div>

        <div class="space-y-3">
            @forelse($recentMaterials as $material)
                <div class="rounded-xl border border-slate-200 p-4">
                    <div class="flex flex-wrap items-center justify-between gap-2">
                        <p class="font-semibold text-slate-900">{{ $material->title }}</p>
                        <span class="rounded-full px-2.5 py-1 text-xs font-semibold {{ $material->type === 'video' ? 'bg-cyan-100 text-cyan-700' : 'bg-amber-100 text-amber-700' }}">{{ strtoupper($material->type) }}</span>
                    </div>
                    <p class="mt-1 text-sm text-slate-500">By {{ $material->creator->name ?? 'Admin' }} - {{ $material->created_at->format('d M Y H:i') }}</p>
                </div>
            @empty
                <p class="text-sm text-slate-500">Belum ada materi.</p>
            @endforelse
        </div>
    </section>
@endsection
