<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Santri extends Model
{
    use HasFactory;
    protected $table = 'santris';
    protected $fillable = ['no_daftar', 'tgl_daftar', 'thn_pelajaran', 'nis', 'nisn', 'nik', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'provinsi', 'kab_id', 'kabupaten', 'kec_id', 'kecamatan', 'desa', 'alamat', 'rt', 'rw'];
    protected $width = ["ortu", "RiwayatSantri"];
    protected $timestamp = false;
    public function ortu(): HasOne
    {
        return $this->hasOne(Ortu::class, 'santri_id');
    }

    public function RiwayatSantri(): HasOne
    {
        return $this->hasOne(RiwayatSantri::class, 'santri_id');
    }

    public function izinSantri(): HasMany
    {
        return $this->hasMany(IzinSantri::class, 'santri_id');
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

        $query->when($filters['izin_nis'] ?? false, function ($query, $izin_nis) {
            $query->where(function ($query) use ($izin_nis) {
                $query->where('nis', 'like', '%' . $izin_nis . '%');
            });
        });

        $query->when($filters['ortu'] ?? false, fn($query, $ortu) => $query->whereHas('ortu', fn($query) => $query->where('id', $ortu)));

        $query->when($filters['RiwayatSantri'] ?? false, fn($query, $riwayat) => $query->whereHas('RiwayatSantri', fn($query) => $query->where('id', $riwayat)));
    }
}
