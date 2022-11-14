<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submateri extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'photo',
        'paragraf1',
        'paragraf2',
        'materis_id'
    ];

    public function materis()
    {
        return $this->belongsTo('App\Models\Materi','materis_id');
    }

    public function subsubmateris()
    {
        return $this->hasMany(Subsubmateri::class,'submateris_id');
    }
}
