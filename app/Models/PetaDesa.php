<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class PetaDesa extends Model
{
    use HasFactory;

    protected $table = 'peta_desa';

    protected $fillable = [
        'alamat',
        'link_google_maps',
        'deskripsi',
    ];
}
