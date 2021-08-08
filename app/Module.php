<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        
        'semestre_id',
        'intitule',
    ];

    public function semestre()
    {
        return $this->belongsTo(Semestre::class);
    }

    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }
}
