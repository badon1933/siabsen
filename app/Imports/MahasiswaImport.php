<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Mahasiswa([
            'npm' => $row['npm'],
            'nama_lengkap' => $row['nama_lengkap'],
            'email' => $row['email'],
            'program_studi_id' => $row['program_studi_id'],
        ]);
    }
}
