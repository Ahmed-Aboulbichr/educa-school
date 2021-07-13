<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universite extends Model
{
    protected $fillable = [
        'id',
        'intitule',
    ];

    public function cursusUniversitaires()
    {
        return $this->hasMany(Cursus_universitaire::class);
    }

}
