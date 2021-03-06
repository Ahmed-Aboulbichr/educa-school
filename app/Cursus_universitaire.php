<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursus_universitaire extends Model
{
    protected $fillable = [

        'specialite',
        'universite_id',
        'note_S1',
        'note_S2',
        'Annee_univ',
        'niveau_etude_id',
        'candidat_id',
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function niveau_etude()
    {
        return $this->belongsTo(Niveau_etude::class);
    }

    public function universite()
    {
        return $this->belongsTo(Universite::class);
    }

    public function docFiles()
    {
        return $this->hasMany(docFile::class);
    }

    public function candidatures(){
        return $this->belongsToMany(Candidature::class);
    }
}
