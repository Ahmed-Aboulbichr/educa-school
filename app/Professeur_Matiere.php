<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professeur_Matiere extends Model
{

    protected $table = 'matiere_professeur';

    protected $fillable = [
        'professeur_id',
        'matiere_id'
    ];
}
