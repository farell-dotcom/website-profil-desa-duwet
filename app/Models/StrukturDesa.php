<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class StrukturDesa extends Model
{
    use HasFactory;

    protected $table = 'struktur_desa';

    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
    ];
}
