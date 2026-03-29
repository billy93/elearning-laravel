@extends('layouts.app')

@section('content')
    <section class="flex flex-wrap items-start justify-between gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-600">Admin panel</p>
            <h1 class="mt-1 text-2xl font-black text-slate-900">Kelola Materi</h1>
            <p class="mt-2 text-sm text-slate-500">Tambah, edit, atau hapus materi pembelajaran untuk student.</p>
        </div>
        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ route('admin.dashboard') }}" class="rounded-xl border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Lihat Statistik</a>
            <a href="{{ route('admin.materials.create') }}" class="rounded-xl bg-emerald-500 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-600">+ Tambah Materi</a>
        </div>
    </section>

    <section class="mt-6 overflow-x-auto rounded-2xl border border-slate-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Judul</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Tipe</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Status</th>
                    <th class="px-4 py-3 text-left font-semibold text-slate-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($materials as $material)
                    <tr>
                        <td class="px-4 py-3 font-medium text-slate-900">{{ $material->title }}</td>
                        <td class="px-4 py-3">
                            <span class="rounded-full px-2.5 py-1 text-xs font-semibold {{ $material->type === 'video' ? 'bg-cyan-100 text-cyan-700' : 'bg-amber-100 text-amber-700' }}">{{ strtoupper($material->type) }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="rounded-full px-2.5 py-1 text-xs font-semibold {{ $material->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-200 text-slate-700' }}">{{ $material->is_published ? 'Published' : 'Draft' }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('admin.materials.edit', $material) }}" class="rounded-lg border border-slate-300 px-3 py-1.5 font-medium text-slate-700 hover:bg-slate-50">Edit</a>
                                <form action="{{ route('admin.materials.destroy', $material) }}" method="POST" onsubmit="return confirm('Yakin hapus materi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-lg border border-rose-300 px-3 py-1.5 font-medium text-rose-700 hover:bg-rose-50">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-8 text-center text-slate-500">Belum ada materi. Klik tombol Tambah Materi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
</section>
@endsection
