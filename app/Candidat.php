<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    protected $fillable = [
        'nom_fr',
        'nom_ar',
        'prenom_fr',
        'prenom_ar',
        'lieu_naiss_fr',
        'lieu_naiss_ar',
        'CIN',
        'CNE',
        'date_naiss',
        'tel',
        'situation_familiale',
        'sexe',
        'pay_id',
        'nationalities',
        'ville',
        'adresse_etd',
    ];
}
