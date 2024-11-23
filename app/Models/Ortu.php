<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ortu extends Model
{
    use HasFactory;
    protected $table = 'ortus';
    protected $fillable = ['santri_id', 'no_kk', 'ayah', 'no_ktp_ayah', 'pendidikan_ayah', 'pekerjaan_ayah', 'ibu', 'no_ktp_ibu', 'pendidikan_ibu', 'pekerjaan_ibu', 'no_tlp'];
    protected $timestamp = false;
    public function santri(): BelongsTo
    {
        return $this->belongsTo(Santri::class, 'santri_id');
    }
}
