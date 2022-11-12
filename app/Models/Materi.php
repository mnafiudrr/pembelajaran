<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'header',
        'judul',
        'link',
        'photo',
        'paragraf1',
        'paragraf2',
        'paragraf3',
        'paragraf4',
    ];

    public function submateris()
    {
        return $this->hasMany(Submateri::class,'materis_id');
    }
}
