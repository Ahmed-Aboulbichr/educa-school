<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $fillable = [

        'module_id',
        'professeur_id',
        'id_matiere',
        'intitule_matiere',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
