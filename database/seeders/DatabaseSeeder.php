<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Especialidad;
use App\Models\Mascota;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $categoria = new Categoria();
        // $categoria->nombre = 'Desarrollo';
        // $categoria->save();
        
        // $categoria2 = new Categoria();
        // $categoria2->nombre = 'UX/UI';
        // $categoria2->save();

        // Post::factory(100)->create();

        Mascota::factory(10000)->create();
        Especialidad::factory(50)->create();
    }
}
