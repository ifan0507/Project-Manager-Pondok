<?php

namespace Database\Seeders;

use App\Models\Ortu;
use App\Models\Santri;
use App\Models\User;
use App\Models\VisiMisi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ortu::factory()->create();
        // Santri::factory()->create();
        // User::factory(5)->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        VisiMisi::factory()->create();
    }
}
