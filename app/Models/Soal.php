<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $fillable = [
        'soal',
        'jawaban1',
        'jawaban2',
        'jawaban3',
        'jawaban4',
        'jawaban5',
        'jawaban',
        'quizzes_id'
    ];

    public function quizzes()
    {
        return $this->belongsTo('App\Models\Quiz','quizzes_id');
    }
}
