<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontenssm extends Model
{
    use HasFactory;

    protected $table='kontenssm';

    protected $fillable = [
        'judul',
        'photo1',
        'photo2',
        'photo3',
        'paragraf1',
        'paragraf2',
        'paragraf3',
        'paragraf4',
        'juduldoc1',
        'doc1',
        'juduldoc2',
        'doc2',
        'juduldoc3',
        'doc3',
        'subsubmateris_id'
    ];

    public function subsubmateris()
    {
        return $this->belongsTo('App\Models\Subsubmateri','subsubmateris_id');
    }
}
