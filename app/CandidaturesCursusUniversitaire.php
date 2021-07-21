<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidaturesCursusUniversitaire extends Model
{
    protected $fillable = [
        'candidature_id',
        'cursus_universitaire_id'
    ];

}
