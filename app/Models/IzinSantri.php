<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IzinSantri extends Model
{
    use HasFactory;
    protected $table = 'izin_santris';
    protected $width = 'santri';
    protected $fillable = ['santri_id', 'kode_izin', 'keterangan', 'lama_izin', 'tgl_izin', 'tgl_kembali', 'status'];
    protected $timestamp = false;

    public function santri(): BelongsTo
    {
        return $this->belongsTo(Santri::class, "santri_id");
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['izin_search'] ?? false, function ($query, $izin_search) {
            $query->where(function ($query) use ($izin_search) {
                $query->where('kode_izin', 'like', '%' . $izin_search . '%');
            });
        });

        $query->when($filters['santri'] ?? false, fn($query, $santri) => $query->whereHas('santri', fn($query) => $query->where('id', $santri)));
    }
}
