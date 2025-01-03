<?php

namespace Database\Factories;

use App\Models\Periode;
use App\Models\ProgramStudi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MataKuliah>
 */
class MataKuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => "AMDAL",
            'kode_matkul' => 11011,
            'kode_prodi' => ProgramStudi::all()->random()->kode_prodi,
        ];
    }
}
