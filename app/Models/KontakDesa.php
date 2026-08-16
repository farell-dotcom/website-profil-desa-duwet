<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class KontakDesa extends Model
{
    use HasFactory;

    protected $table = 'kontak_desa';

    protected $fillable = [
        'alamat',
        'telepon',
        'nomor_whatsapp',
        'email',
        'jam_pelayanan',
    ];
}
