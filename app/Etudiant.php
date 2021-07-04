<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends User
{
    public function docFiles()
    {
        return $this->hasMany(docFile::class);
    }
}
