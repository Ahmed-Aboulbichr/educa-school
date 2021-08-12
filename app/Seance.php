<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    protected $fillable = [
        
        'matiere_id',
        'salle_id',
        'semestre_id',
        'sous_groupe_id',
        'groupe_id',
        'jour',
        'heure',
        'duree',
    ];

    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }
    public function semestre()
    {
        return $this->belongsTo(Semestre::class);
    }
    public function sous_groupe()
    {
        return $this->belongsTo(sousGroupe::class);
    }
    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
    
}
