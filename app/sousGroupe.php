<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sousGroupe extends Model
{
    protected $fillable = [
        
        'groupe_id',
        'intitule',
    ];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
    
    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
