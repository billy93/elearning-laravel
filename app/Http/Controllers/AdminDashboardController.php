<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_materials' => Material::query()->count(),
            'published_materials' => Material::query()->where('is_published', true)->count(),
            'draft_materials' => Material::query()->where('is_published', false)->count(),
            'video_materials' => Material::query()->where('type', 'video')->count(),
            'text_materials' => Material::query()->where('type', 'text')->count(),
            'student_count' => User::query()->where('role', 'student')->count(),
        ];

        $recentMaterials = Material::query()
            ->with('creator')
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentMaterials'));
    }
}
