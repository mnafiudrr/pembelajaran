<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsubmateri extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'header',
        'judul',
        'photo1',
        'paragraf1',
        'paragraf2',
        'paragraf3',
        'paragraf4',
        'photo2',
        'paragraf5',
        'paragraf6',
        'paragraf7',
        'paragraf8',
        'submateris_id'
    ];

    public function submateris()
    {
        return $this->belongsTo('App\Models\Submateri','submateris_id');
    }
}
