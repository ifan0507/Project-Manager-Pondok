<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatSantri extends Model
{
    use HasFactory;

    protected $table = 'riwayat_santri';
    protected $fillable = ['santri_id', 'pendidikan_santri', 'asal_sekolah', 'thn_lulus', 'daftar_kelas'];
    protected $timestamp = false;

    public function santri(): BelongsTo
    {
        return $this->belongsTo(Santri::class, 'santri_id');
    }
}
