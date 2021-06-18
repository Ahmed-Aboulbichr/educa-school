<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{

    public function doc_files()
    {
        return $this->hasMany(docFile::class);
    }
}
