<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{

    //many to many relation ships
    public function doc_files()
    {
        return $this->belongsToMany(docFile::class);
    }


}
