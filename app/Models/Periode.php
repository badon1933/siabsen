<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Periode extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [];

    public function master_kelas(): HasMany
    {
        return $this->hasMany(MasterKelas::class);
    }
}
