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
        'adresse_etd',
        'academie_id',
        'province_id',
        'delegation_id',
        'user_id',
        'pay_id',
        'nationalite_id',
        'ville_id_parent',
        'date_naiss',
        'sec_profession_pere_id',
        'sec_profession_mere_id',
        'ville_id_etud',
        'mention_bac',
        'mg_bac',
        'annee_bac',
        'lycee_bac',
        'adresse_parent',
        'tel_parent',
        'cat_mere',
        'cat_pere',
        'CIN_pere',
        'CIN_mere',
        'profession_pere',
        'profession_mere',
    ];
    public function docFiles()
    {
        return $this->hasMany(docFile::class);
    }

    public function candidatures(){
        return $this->hasMany(Candidature::class);
    }
    public function academie(){
        return $this->belongsTo(Academie::class);
    }
    
    public function delegation(){
        return $this->belongsTo(Delegation::class);
    }

    public function province(){
        return $this->belongsTo(Province::class);
    }
}
