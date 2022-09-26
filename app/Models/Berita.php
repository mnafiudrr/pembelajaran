<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table='berita';

    protected $fillable = [
        'judul',
        'photo1',
        'photo2',
        'photo3',
        'paragraf1',
        'paragraf2',
        'paragraf3',
        'paragraf4',
    ];
}
