<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau_etude extends Model
{
    protected $fillable = [
        'id',
        'intitule',
    ];

    public function cursusUniversitaires()
    {
        return $this->hasMany(Cursus_universitaire::class);
    }

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
}
