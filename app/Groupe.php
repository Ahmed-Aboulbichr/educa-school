<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $fillable = [
        
        'intitule_groupe',
        'semestre_id',
    ];

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
    
    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
    
    
    public function semestre()
    {
        return $this->belongsTo(Semestre::class);
    }
    
    
    public function sousGroupes()
    {
        return $this->hasMany(sousGroupe::class);
    }
}
