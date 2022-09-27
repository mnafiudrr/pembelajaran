<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'header',
        'judul',
    ];

    public function soal()
    {
        return $this->hasMany('App\Models\Soal','quiz_id');
    }
}
