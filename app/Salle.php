<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $fillable = [
        
        'label',
        'capacite',
    ];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

}
