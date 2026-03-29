<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\View\View;

class StudentMaterialController extends Controller
{
    public function index(): View
    {
        $materials = Material::query()
            ->with('creator')
            ->where('is_published', true)
            ->latest()
            ->get();

        return view('materials.index', compact('materials'));
    }

    public function show(Material $material): View
    {
        abort_unless($material->is_published, 404);

        return view('materials.show', compact('material'));
    }
}
