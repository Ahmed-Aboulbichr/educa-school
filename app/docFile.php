<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class docFile extends Model
{
    //many to many relation ship
    public function responses()
    {
        return $this->belongsToMany(Reponse::class);
    }

    //mone to many relation ships
    public function candidatures()
    {
        return $this->belongsTo(Candidature::class);
    }

    public function documents()
    {
        return $this->belongsTo(Document::class);
    }

    public function etudiants()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
