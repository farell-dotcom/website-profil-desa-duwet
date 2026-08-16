<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class InformasiDesa extends Model
{
    use HasFactory;

    protected $table = 'informasi_desa';

    protected $fillable = [
        'visi',
        'misi',
        'sejarah',
        'luas_wilayah',
        'jumlah_penduduk',
        'jumlah_laki_laki',
        'jumlah_perempuan',
        'jumlah_kk',
        'nama_kepala_desa',
        'foto_kepala_desa',
        'sambutan',
    ];
}
