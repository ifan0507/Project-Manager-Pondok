<?php

namespace Database\Factories;

use App\Models\Ortu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Santri>
 */
class SantriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => '1234',
            'nama' => 'Muhammad Ifan',
            'jenis_kelamin' => 'Laki-Laki',
            'id_ortu' => Ortu::factory(),
            'alamat' => 'Lumajang'
        ];
    }
}
