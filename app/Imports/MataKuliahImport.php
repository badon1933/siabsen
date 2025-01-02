<?php

namespace App\Imports;

use App\Models\MataKuliah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MataKuliahImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new MataKuliah([
            'nama' => $row['nama'],
            'kode_matkul' => $row['kode_matkul'],
            'kode_prodi' => $row['kode_prodi'],
        ]);
    }
}
