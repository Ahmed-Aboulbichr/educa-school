<?php

namespace App\Http\Controllers;

use App\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveStepOne(Request $req)
    {
        if ($req->ajax()) {
            $fields = $req->validate([
                'nom_fr' => ['bail', 'required', 'string', 'max:255'],
                'nom_ar' => ['bail', 'required', 'string', 'max:255'],
                'prenom_fr' => ['bail', 'required', 'string', 'max:255'],
                'prenom_ar' => ['bail', 'required', 'string', 'max:255'],
                'lieu_naiss_fr' => ['bail', 'required', 'string', 'max:255'],
                'lieu_naiss_ar' => ['bail', 'required', 'string', 'max:255'],
                'CIN' => ['bail', 'required', 'string', 'max:255'],
                'CNE' => ['bail', 'required', 'string', 'max:255'],
                'date_naiss' => ['bail', 'required', 'string', 'max:255'],
                'tel' => ['bail', 'required', 'string', 'max:255'],
                'situation_familiale' => ['string', 'max:255'],
                'sexe' => ['string', 'max:255'],
                'pay_id' => ['string', 'max:255'],
                'nationalities' => ['string', 'max:255'],
                'ville' => ['string', 'max:255'],
                'adresse_etd' => ['string', 'email', 'max:255'],
            ]);

            $candidat = Candidat::where('CIN', '=', $fields['CIN'])->first();
            if ($candidat === null) {
                // user doesn't exist
            } else {
                $candidat =  new Candidat;
                $candidat->nom_fr = $fields['nom_fr'];
                $candidat->nom_ar = $fields['nom_ar'];
                $candidat->prenom_fr = $fields['prenom_fr'];
                $candidat->prenom_ar = $fields['prenom_ar'];
                $candidat->lieu_naiss_fr = $fields['lieu_naiss_fr'];
                $candidat->lieu_naiss_ar = $fields['lieu_naiss_ar'];
                $candidat->CIN = $fields['CIN'];
                $candidat->CNE = $fields[''];
                $candidat->date_naiss = $fields[''];
                $candidat->tel = $fields[''];
                $candidat->situation_familiale = $fields[''];
                $candidat->sexe = $fields[''];
                $candidat->pay_id = $fields[''];
                $candidat->nationalities = $fields[''];
                $candidat->ville = $fields[''];
                $candidat->adresse_etd = $fields[''];
            }

            $response = array(
                'user' => $candidat,
            );
            return  response()->json($response, 200);
        }
    }
}
