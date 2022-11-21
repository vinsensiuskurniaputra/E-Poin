<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DaftarPelanggaran>
 */
class DaftarPelanggaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id' => rand(1,10),
            'kategori_id' => rand(1,10),
            'user_id' => rand(1,5),
        ];
    }
}
