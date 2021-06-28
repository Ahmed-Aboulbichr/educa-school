<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academie extends Model
{
    //


    public function candidats()
    {
        return $this->hasMany(candidat::class);
    }
}
