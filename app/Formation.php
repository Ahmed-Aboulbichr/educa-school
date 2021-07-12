<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'specialite',
        'type_formation_id',
        'niveau_etude_id',
        'niveau_preRequise',
    ];


     public function candidatures(){
        return $this->hasMany(Candidature::class);
    }  
}
