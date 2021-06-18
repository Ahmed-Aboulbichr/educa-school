<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function doc_files()
    {
        return $this->hasMany(docFile::class);
    }
    public function demandes()
    {
        return $this->belongsToMany(Demande::class);
    }
}
