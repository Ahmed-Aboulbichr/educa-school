<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }
}
