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
        Schema::create('riwayat_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santri_id')->constrained(
                table: 'santris'
            )->onDelete('cascade')->onUpdate('cascade');
            $table->string('pendidikan_sekolah');
            $table->string('asal_sekolah');
            $table->string('thn_lulus');
            $table->string('daftar_kelas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_santris');
    }
};
