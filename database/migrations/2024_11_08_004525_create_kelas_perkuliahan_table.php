<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kelas_perkuliahans', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('master_kelas_id')->constrained();
            $table->foreignUlid('mata_kuliah_id')->constrained();
            $table->foreignUlid('dosen_id')->nullable()->constrained();
            $table->foreignUlid('mahasiswa_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_perkuliahans');
    }
};
