<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Dosen;
use App\Models\Jenjang;
use App\Models\MasterKelas;
use App\Models\MataKuliah;
use App\Models\Periode;
use App\Models\ProgramStudi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Muhammad Ramadhan Firdaus',
            'email' => 'ramadhan.firdaus75@gmail.com',
        ]);
        Jenjang::factory(1)->create();
        Periode::factory(1)->create();
        ProgramStudi::factory(1)->create();
        MasterKelas::factory(1)->create();
        MataKuliah::factory(1)->create();
        Dosen::factory(30)->create();
    }
}
