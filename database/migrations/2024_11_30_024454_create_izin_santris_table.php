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
        Schema::create('izin_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santri_id')->constrained(
                table: 'santris'
            )->onDelete('cascade')->onUpdate('cascade');
            $table->string('kode_izin');
            $table->string('keterangan');
            $table->integer('lama_izin');
            $table->date('tgl_izin');
            $table->date('tgl_kembali');
            $table->enum('status', ['sudah kembali', 'belum kembali'])->default('belum kembali');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izin_santris');
    }
};
