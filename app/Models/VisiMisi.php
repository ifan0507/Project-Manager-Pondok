<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;
    protected $table = 'visi_misis';
    protected $fillable = ['visi', 'misi'];
    protected $timestamp = false;
}
