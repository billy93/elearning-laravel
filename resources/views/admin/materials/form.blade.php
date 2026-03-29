@extends('layouts.app')

@section('content')
    <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
        <h1 class="text-2xl font-black text-slate-900">{{ $isEdit ? 'Edit Materi' : 'Tambah Materi Baru' }}</h1>
        <p class="mt-2 text-sm text-slate-500">Isi form di bawah ini untuk menyimpan materi pembelajaran.</p>

        <form action="{{ $isEdit ? route('admin.materials.update', $material) : route('admin.materials.store') }}" method="POST" class="mt-6 space-y-5">
            @csrf
            @if($isEdit)
                @method('PUT')
            @endif

            <div>
                <label for="title" class="mb-1 block text-sm font-medium text-slate-700">Judul materi</label>
                <input id="title" name="title" value="{{ old('title', $material->title) }}" required class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm outline-none ring-emerald-500 transition focus:border-emerald-500 focus:ring" placeholder="Contoh: Dasar Laravel Routing">
                @error('title')
                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="type" class="mb-1 block text-sm font-medium text-slate-700">Tipe materi</label>
                <select id="type" name="type" required class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm outline-none ring-emerald-500 transition focus:border-emerald-500 focus:ring">
                    <option value="">Pilih tipe</option>
                    <option value="video" @selected(old('type', $material->type) === 'video')>Video</option>
                    <option value="text" @selected(old('type', $material->type) === 'text')>Text</option>
                </select>
                @error('type')
                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="video_url" class="mb-1 block text-sm font-medium text-slate-700">URL video (YouTube embed)</label>
                <input id="video_url" name="video_url" value="{{ old('video_url', $material->video_url) }}" class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm outline-none ring-emerald-500 transition focus:border-emerald-500 focus:ring" placeholder="https://www.youtube.com/embed/xxxxxxxxxxx">
                @error('video_url')
                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="content" class="mb-1 block text-sm font-medium text-slate-700">Konten text</label>
                <textarea id="content" name="content" rows="8" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none ring-emerald-500 transition focus:border-emerald-500 focus:ring" placeholder="Tulis materi text di sini...">{{ old('content', $material->content) }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <label class="inline-flex items-center gap-2 text-sm text-slate-700">
                <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $material->is_published ?? true)) class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                Publish sekarang
            </label>

            <div class="flex flex-wrap gap-3">
                <button type="submit" class="rounded-xl bg-emerald-500 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-600">{{ $isEdit ? 'Simpan perubahan' : 'Tambah materi' }}</button>
                <a href="{{ route('admin.materials.index') }}" class="rounded-xl border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
            </div>
        </form>
</section>
@endsection
