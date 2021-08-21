<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    protected $fillable = [

        'nom',
        'prenom',
        'matricule',
        'etat_civile',
        'sexe',
        'tel',
        'adresse',
        'ville_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function matieres()
    {
        return $this->belongsToMany(Candidature::class);
    }

}
