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
        'dateLimite',
        'duree',
        'niveau_acces',
        'niveau_preRequise',
    ];


    public function candidatures(){
        return $this->hasMany(Candidature::class);
    }

    public function niveauEtude(){
        return $this->belongsTo(Niveau_etude::class);
    }

    public function typeFormation(){
        return $this->belongsTo(Type_formation::class);
    }

    public function sessions()
    {
        return $this->belongsToMany(Session::class);
    }

}
