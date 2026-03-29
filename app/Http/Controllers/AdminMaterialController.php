<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class AdminMaterialController extends Controller
{
    public function index(): View
    {
        $materials = Material::query()->with('creator')->latest()->get();

        return view('admin.materials.index', compact('materials'));
    }

    public function create(): View
    {
        return view('admin.materials.form', [
            'material' => new Material(),
            'isEdit' => false,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateMaterial($request);

        Material::create([
            'title' => $validated['title'],
            'slug' => $this->generateUniqueSlug($validated['title']),
            'type' => $validated['type'],
            'video_url' => $validated['type'] === 'video' ? $validated['video_url'] : null,
            'content' => $validated['type'] === 'text' ? $validated['content'] : null,
            'is_published' => (bool) ($validated['is_published'] ?? false),
            'created_by' => $request->user()->id,
        ]);

        return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil ditambahkan.');
    }

    public function edit(Material $material): View
    {
        return view('admin.materials.form', [
            'material' => $material,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, Material $material): RedirectResponse
    {
        $validated = $this->validateMaterial($request);

        $material->update([
            'title' => $validated['title'],
            'slug' => $material->title !== $validated['title']
                ? $this->generateUniqueSlug($validated['title'], $material->id)
                : $material->slug,
            'type' => $validated['type'],
            'video_url' => $validated['type'] === 'video' ? $validated['video_url'] : null,
            'content' => $validated['type'] === 'text' ? $validated['content'] : null,
            'is_published' => (bool) ($validated['is_published'] ?? false),
        ]);

        return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy(Material $material): RedirectResponse
    {
        $material->delete();

        return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil dihapus.');
    }

    private function validateMaterial(Request $request): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', Rule::in(['video', 'text'])],
            'video_url' => ['nullable', 'url', 'max:2048', 'required_if:type,video'],
            'content' => ['nullable', 'string', 'required_if:type,text'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        if ($validated['type'] === 'video' && empty($validated['video_url'])) {
            throw ValidationException::withMessages([
                'video_url' => 'URL video wajib diisi untuk materi tipe video.',
            ]);
        }

        return $validated;
    }

    private function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        while (
            Material::query()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }
}
