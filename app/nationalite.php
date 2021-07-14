<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nationalite extends Model
{
    protected $fillable = [
        
        'name'
    ];

    public function candidats(){
        return $this->hasMany(Candidat::class);
    }
}
