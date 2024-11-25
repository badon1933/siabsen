<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataKuliah extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [];

    public function program_studi(): BelongsTo
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    public function kelas_perkuliahan(): HasMany
    {
        return $this->hasMany(KelasPerkuliahan::class);
    }
}
