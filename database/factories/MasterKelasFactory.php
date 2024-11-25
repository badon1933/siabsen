<?php

namespace Database\Factories;

use App\Models\Periode;
use App\Models\ProgramStudi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MasterKelas>
 */
class MasterKelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => "A",
            'periode_id' => Periode::all()->random()->id,
            'program_studi_id' => ProgramStudi::all()->random()->id,
        ];
    }
}
