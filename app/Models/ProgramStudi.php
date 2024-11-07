<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgramStudi extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [];

    public function jenjang(): BelongsTo
    {
        return $this->belongsTo(Jenjang::class);
    }
}
