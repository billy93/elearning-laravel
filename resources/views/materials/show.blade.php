@extends('layouts.app')

@section('content')
    <a href="{{ route('materials.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
        <span aria-hidden="true">&lt;-</span>
        Kembali ke daftar materi
    </a>

    <article class="mt-4 rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-8">
        <div class="mb-3 inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $material->type === 'video' ? 'bg-cyan-100 text-cyan-700' : 'bg-amber-100 text-amber-700' }}">
            {{ strtoupper($material->type) }}
        </div>

        <h1 class="text-2xl font-black leading-tight text-slate-900 sm:text-3xl">{{ $material->title }}</h1>
        <p class="mt-2 text-sm text-slate-500">Dipublish {{ $material->created_at->format('d M Y H:i') }}</p>

        @if($material->type === 'video')
            <div class="mt-6 overflow-hidden rounded-2xl border border-slate-200">
                <div class="aspect-video w-full bg-slate-100">
                    <iframe
                        src="{{ $material->video_url }}"
                        class="h-full w-full"
                        title="{{ $material->title }}"
                        loading="lazy"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        @else
            <div class="prose prose-slate mt-6 max-w-none whitespace-pre-line text-sm leading-relaxed sm:text-base">{{ $material->content }}</div>
        @endif
</article>
@endsection
