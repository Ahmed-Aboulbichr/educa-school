<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ville extends Model
{
    //




    public function candidats()
    {
        return $this->hasMany(candidat::class,'ville_id_etud','id');
    }
 
}
