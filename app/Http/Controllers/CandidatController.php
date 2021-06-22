<?php

namespace App\Http\Controllers;


use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Candidat;
use App\Candidature;
use App\docFile;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
                'nom_fr' => ['bail', 'required', 'string', 'max:20'],
                'nom_ar' => ['bail', 'required', 'string', 'max:20'],
                'prenom_fr' => ['bail', 'required', 'string', 'max:20'],
                'prenom_ar' => ['bail', 'required', 'string', 'max:20'],
                'lieu_naiss_fr' => ['bail', 'nullable', 'string', 'max:50'],
                'lieu_naiss_ar' => ['bail', 'nullable', 'string', 'max:50'],
                'CIN' => ['bail', 'required', 'string', 'max:10'],
                'CNE' => ['bail', 'required', 'string', 'max:20'],
                'date_naiss' => ['bail', 'required', 'date', 'date_format:dd/mm/YYYY'],
                'tel' => ['bail', 'required', 'numeric'],
                'situation_familiale' => ['nullable', 'string', 'max:20'],
                'sexe' => ['string', 'max:20'],
                'pay_id' => ['nullable', 'integer'],
                'nationalities' => ['nullable', 'integer'],
                'ville' => ['nullable', 'integer'],
                'adresse_etd' => ['nullable', 'string', 'max:100'],
            ]);

            $candidat = Candidat::where('CIN', '=', $fields['CIN'])->first();
            if ($candidat === null) {
                // user doesn't exist
                $candidat =  new Candidat;
                $candidat->nom_fr = $fields['nom_fr'];
                $candidat->nom_ar = $fields['nom_ar'];
                $candidat->prenom_fr = $fields['prenom_fr'];
                $candidat->prenom_ar = $fields['prenom_ar'];
                $candidat->lieu_naiss_fr = $fields['lieu_naiss_fr'];
                $candidat->lieu_naiss_ar = $fields['lieu_naiss_ar'];
                $candidat->CIN = $fields['CIN'];
                $candidat->CNE = $fields['CNE'];
                $candidat->date_naiss = $fields['date_naiss'];
                $candidat->tel = $fields['tel'];
                $candidat->situation_familiale = $fields['situation_familiale'];
                $candidat->sexe = $fields['sexe'];
                $candidat->pay_id = $fields['pay_id'];
                $candidat->nationalities = $fields['nationalities'];
                $candidat->ville = $fields['ville'];
                $candidat->adresse_etd = $fields['adresse_etd'];

                $candidat->save();
            } else {
                $candidat->nom_fr = $fields['nom_fr'];
                $candidat->nom_ar = $fields['nom_ar'];
                $candidat->prenom_fr = $fields['prenom_fr'];
                $candidat->prenom_ar = $fields['prenom_ar'];
                $candidat->lieu_naiss_fr = $fields['lieu_naiss_fr'];
                $candidat->lieu_naiss_ar = $fields['lieu_naiss_ar'];
                $candidat->CIN = $fields['CIN'];
                $candidat->CNE = $fields['CNE'];
                $candidat->date_naiss = $fields['date_naiss'];
                $candidat->tel = $fields['tel'];
                $candidat->situation_familiale = $fields['situation_familiale'];
                $candidat->sexe = $fields['sexe'];
                $candidat->pay_id = $fields['pay_id'];
                $candidat->nationalities = $fields['nationalities'];
                $candidat->ville = $fields['ville'];
                $candidat->adresse_etd = $fields['adresse_etd'];

                $candidat->update();
            }

            $response = array(
                'candidat' => $candidat,
            );
            return  response()->json($response, 200);
        }
    }

    public function saveStepThree(Request $request)
    {


        if ($request->ajax()) {
            $fields = $request->validate([
                'annee_bac' => ['', 'string', 'max:4'],
                'mention_bac' => ['', 'string', Rule::in(['P', 'AB', 'B', 'TB', 'E'])],
                'mg_bac' => ['', 'numeric', 'between:0,20'],
                'lycee_bac' => ['', 'string', 'max:255'],
                'province' => ['', 'string', 'max:255'],
                'delegation' => ['', 'string', 'max:255'],
                'academie' => ['', 'string', 'max:255'],
            ]);
            $candidat = null;
            $candidat = Candidat::where('user_id', Auth::id())->first();

            if (is_object($candidat)) {
                $candidat->update([
                    'annee_bac' => $fields['annee_bac'],
                    'mention_bac' => $fields['mention_bac'],
                    'mg_bac' => $fields['mg_bac'],
                    'lycee_bac' => $fields['lycee_bac'],
                    'province' => $fields['province'],
                    'delegation' => $fields['delegation'],
                    'academie' =>  $fields['academie'],
                ]);


                $response = array(
                    'candidat' => $candidat,
                );
                return  response()->json($response, 200);
            }

            return  response()->json("nothing to update", 200);
        }
    }


    public function saveStepFour(Request $request)
    {


        if ($request->hasFile('file')) {
            $path = $this->handleUploadedImage($request->file('file'));
            $candidat = null;
            $candidat = Candidat::where('user_id', Auth::id())->first();

            if (is_object($candidat)) {
                $candidature = null;
                $doc_file = null;
                $candidature = Candidature::where('condidat_id', $candidat->id)->first();



                if (is_object($candidature)) {

                    $doc_file = docFile::create([
                        'type' => 'bac',
                        'path' => $path,
                        'candidature_id' => $candidature->id,
                    ]);
                    $candidat->update([
                        'bac_id' => $doc_file->id,
                    ]);
                }


                $response = array(
                    'candidat' => $candidat,
                    'candidat' => $candidature,
                );
                return  response()->json($response, 200);
            }

            return  response()->json("nothing to update" . $request, 200);
        }
    }


    public function saveStepFive(Request $request)
    {


        if ($request->ajax()) {
            $fields = $request->validate([
                'pre_insc_annee_universitaire' => [
                    '', 'string',
                    Rule::in([
                        "2021-2022",
                        "2020-2021",
                        "2019-2020",
                        "2018-2019",
                        "2017-2018",
                        "2016-2017",
                        "2015-2016",
                        "2014-2015",
                        "2013-2014",
                        "2012-2013",
                        "2011-2012",
                        "2010-2011",
                        "2009-2010",
                        "2008-2009",
                        "2007-2008",
                        "2006-2007",
                        "2005-2006",
                        "2004-2005",
                        "2003-2004"
                    ])
                ],

                'pre_insc_universite' => ['', 'string', 'max:255'],
                'universite_dip_name' => ['', 'string', 'max:255'],
                'formation' => ['', 'string', 'max:255'],
            ]);
            $candidat = null;
            $candidat = Candidat::where('user_id', Auth::id())->first();

            if (is_object($candidat)) {
                $candidature = null;
                $candidature = Candidature::where('condidat_id', $candidat->id)->where('formation_id', $fields['formation'])->first();

                $candidat->update([
                    'universite_dip_name' => $fields['pre_insc_universite'] . " _-_ " . $fields['universite_dip_name'],
                    'pre_insc_annee_universitaire' => $fields['pre_insc_annee_universitaire'],
                ]);

                if (!is_object($candidature)) {
                    $candidature = Candidature::create([
                        'condidat_id' => $fields[$candidat->id],
                        'formation_id' => $fields['formation'],
                    ]);
                }


                $response = array(
                    'candidat' => $candidat,
                    'candidat' => $candidature,
                );
                return  response()->json($response, 200);
            }

            return  response()->json("nothing to update", 200);
        }
    }

    public function handleUploadedImage($file)
    {


        if (!is_null($file)) {
            $path =  Storage::putFile('Bac', $file);
            return $path;
        }
    }
}
