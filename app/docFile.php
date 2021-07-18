<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class docFile extends Model
{

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'type',
        'formation_id',
        'document_id',
        'etudiant_id',
        'cursus_universitaire_id',
        'candidat_id',
    ];


    //many to many relation ship
    public function responses()
    {
        return $this->belongsToMany(Reponse::class);
    }

  

    public function cursusUniversitaire()
    {
        return $this->belongsTo(Cursus_universitaire::class);
    }

    public function candidat()
    {
        return $this->belongsTo(candidat::class);
    }

    public function documents()
    {
        return $this->belongsTo(Document::class);
    }

    public function etudiants()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function candidatures(){

        return $this->belongsToMany(Candidature::class);
    }

}
