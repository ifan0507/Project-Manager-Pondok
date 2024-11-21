<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Santri extends Model
{
    use HasFactory;
    protected $table = 'santris';
    protected $fillable = ['nis', 'nik', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'provinsi', 'kab_id', 'kabupaten', 'kec_id', 'kecamatan', 'desa', 'alamat'];
    protected $width = ["ortu", "riwayat_santri"];
    protected $timestamp = false;
    public function ortu(): HasOne
    {
        return $this->hasOne(Ortu::class, 'santri_id');
    }

    public function RiwayatSantri(): HasOne
    {
        return $this->hasOne(RiwayatSantri::class, 'santri_id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('nis', 'like', '%' . $search . '%')
                    ->orWhere('nik', 'like', '%' . $search . '%')
                    ->orWhere('nama', 'like', '%' . $search . '%');
            });
        });
        $query->when($filters['ortu'] ?? false, fn($query, $ortu) => $query->whereHas('ortu', fn($query) => $query->where('id', $ortu)));
    }
}
