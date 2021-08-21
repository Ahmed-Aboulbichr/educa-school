<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends User
{
    public function docFiles()
    {
        return $this->hasMany(docFile::class);
    }

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function semestres()
    {
        return $this->belongsToMany(Semestre::class);
    }

}
