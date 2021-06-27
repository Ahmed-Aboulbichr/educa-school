<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    //


    public function candidat()
    {
        return $this->hasMany(candidat::class);
    }
}
