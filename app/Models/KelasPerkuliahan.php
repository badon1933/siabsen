<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KelasPerkuliahan extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [];

    public function master_kelas(): BelongsTo
    {
        return $this->BelongsTo(MasterKelas::class);
    }

    public function mata_kuliah(): BelongsTo
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class);
    }

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
