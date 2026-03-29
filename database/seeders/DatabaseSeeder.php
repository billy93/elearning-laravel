<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::query()->updateOrCreate(
            ['email' => 'admin@elearning.test'],
            [
                'name' => 'Admin E-Learning',
                'role' => 'admin',
                'password' => Hash::make('password123'),
            ]
        );

        User::query()->updateOrCreate(
            ['email' => 'student@elearning.test'],
            [
                'name' => 'Student Demo',
                'role' => 'student',
                'password' => Hash::make('password123'),
            ]
        );

        Material::query()->delete();

        Material::query()->create([
            'title' => 'Pengenalan Laravel untuk Pemula',
            'slug' => 'pengenalan-laravel-untuk-pemula',
            'type' => 'video',
            'video_url' => 'https://www.youtube.com/embed/MYyJ4PuL4pY',
            'content' => null,
            'is_published' => true,
            'created_by' => $admin->id,
        ]);

        Material::query()->create([
            'title' => 'Dasar Routing dan Controller',
            'slug' => 'dasar-routing-dan-controller',
            'type' => 'text',
            'video_url' => null,
            'content' => "Routing adalah mekanisme untuk mengarahkan request ke controller yang tepat.\n\nLangkah dasar:\n1. Definisikan route di routes/web.php\n2. Arahkan route ke method controller\n3. Return view atau data dari controller\n\nTips: gunakan penamaan route agar URL mudah dikelola saat aplikasi berkembang.",
            'is_published' => true,
            'created_by' => $admin->id,
        ]);

        Material::query()->create([
            'title' => 'Validasi Form Input di Laravel',
            'slug' => 'validasi-form-input-di-laravel',
            'type' => 'text',
            'video_url' => null,
            'content' => "Validasi membantu menjaga data tetap bersih dan aman.\n\nContoh aturan penting:\n- required\n- string\n- email\n- max\n\nSelalu tampilkan pesan error yang jelas supaya user paham input apa yang harus diperbaiki.",
            'is_published' => true,
            'created_by' => $admin->id,
        ]);
    }
}
