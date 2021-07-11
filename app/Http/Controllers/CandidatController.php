<?php

namespace App\Http\Controllers;


use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Candidat;
use App\Candidature;
use App\Formation;
use App\docFile;
use App\User;
use App\Pay;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Nullable;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //i change it from candidature to candidat
        $candidat = Candidat::where('user_id', Auth::id())->latest()->first();
        return view('pre-inscription.inscription-page')->with('candidat', $candidat);
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
        dd($id);
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

    public function saveStepTwo(Request $request)
    {
        if ($request->ajax()) {
            $fields = $request->validate([
                'cin_pere' => ['bail', 'required', 'string', 'max:10'],
                'cin_mere' => ['bail', 'required', 'string', 'max:10'],
                'tel_parent' => ['bail', 'required', 'string', 'max:20'],
                'cat_pere' => ['bail', 'required', 'string', Rule::in(['PUBLIC', 'PRIVE', 'LIBRE'])],
                'cat_mere' => ['bail', 'required', 'string', Rule::in(['PUBLIC', 'PRIVE', 'LIBRE'])],
                'secteur_pere' => ['bail', 'required', 'integer', Rule::exists('secteur_professions', 'id')->where('id', $request->input('secteur_pere'))],
                'secteur_mere' => ['bail', 'required', 'integer', Rule::exists('secteur_professions', 'id')->where('id', $request->input('secteur_mere'))],
                'ville_parent' => ['bail', 'required', 'integer', Rule::exists('villes', 'id')->where('id', $request->input('ville_parent'))],
                'prof_pere' => ['bail', 'required', 'string', 'max:50'],
                'prof_mere' => ['bail', 'required', 'string', 'max:50'],
                'adresse_parent' => ['bail', 'nullable', 'string', 'max:100'],
            ]);
            $candidat = null;
            $candidat = Candidat::where('user_id', Auth::id())->first();
            if (is_object($candidat)) {
                $candidat->update([
                    'CIN_pere' => $fields['cin_pere'],
                    'CIN_mere' => $fields['cin_mere'],
                    'tel_parent' => $fields['tel_parent'],
                    'cat_pere' => $fields['cat_pere'],
                    'cat_mere' => $fields['cat_mere'],
                    'sec_profession_mere_id' => $fields['secteur_mere'],
                    'sec_profession_pere_id' => $fields['secteur_pere'],
                    'ville_id_parent' => $fields['ville_parent'],
                    'profession_pere' => $fields['prof_pere'],
                    'profession_mere' => $fields['prof_mere'],
                    'adresse_parent' => $fields['adresse_parent'],
                ]);
                $response = array(
                    "candidat" => $candidat
                );
                return response()->json($response, 200);
            } else {
                $response = "nothing to update" . Auth::id();
                return response()->json($response, 200);
            }
        }
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
                'date_naiss' => ['bail', 'required', 'date_format:Y-m-d'],
                'tel' => ['bail', 'required', 'numeric'],
                'situation_familiale' => ['nullable', 'string', 'max:20'],
                'sexe' => ['string', 'max:20'],
                'pay_id' => ['bail', 'nullable', 'integer', Rule::exists('pays', 'id')->where('id', $req->input('pay_id'))],
                'nationalite_id' => ['bail', 'nullable', 'integer', Rule::exists('nationalites', 'id')->where('id', $req->input('nationalite_id'))],
                'ville_id_etud' => ['bail', 'nullable', 'integer', Rule::exists('villes', 'id')->where('id', $req->input('ville_id_etud'))],
                'adresse_etd' => ['nullable', 'string', 'max:100'],
            ]);

            $candidat = Candidat::where('CIN', '=', $fields['CIN'])->first();
            if ($candidat === null) {
                // user doesn't exist
                $candidat =  new Candidat;
                $candidat->user_id = Auth::id();
                $candidat->nom_fr = $fields['nom_fr'];
                $candidat->nom_ar = $fields['nom_ar'];
                $candidat->prenom_fr = $fields['prenom_fr'];
                $candidat->prenom_ar = $fields['prenom_ar'];
                $candidat->lieu_naiss_fr = $fields['lieu_naiss_fr'];
                $candidat->lieu_naiss_ar = $fields['lieu_naiss_ar'];
                $candidat->CIN = $fields['CIN'];
                $candidat->CNE = $fields['CNE'];
                $candidat->date_naiss = date("Y-m-d", strtotime($fields['date_naiss']));
                $candidat->tel = $fields['tel'];
                $candidat->situation_familiale = $fields['situation_familiale'];
                $candidat->sexe = $fields['sexe'];
                $candidat->pay_id = $fields['pay_id'];
                $candidat->nationalite_id = $fields['nationalite_id'];
                $candidat->ville_id_etud = $fields['ville_id_etud'];
                $candidat->adresse_etd = $fields['adresse_etd'];

                $candidat->save();
            } else {
                $candidat->user_id = Auth::id();
                $candidat->nom_fr = $fields['nom_fr'];
                $candidat->nom_ar = $fields['nom_ar'];
                $candidat->prenom_fr = $fields['prenom_fr'];
                $candidat->prenom_ar = $fields['prenom_ar'];
                $candidat->lieu_naiss_fr = $fields['lieu_naiss_fr'];
                $candidat->lieu_naiss_ar = $fields['lieu_naiss_ar'];
                $candidat->CIN = $fields['CIN'];
                $candidat->CNE = $fields['CNE'];
                $candidat->date_naiss = date("Y-m-d", strtotime($fields['date_naiss']));
                $candidat->tel = $fields['tel'];
                $candidat->situation_familiale = $fields['situation_familiale'];
                $candidat->sexe = $fields['sexe'];
                $candidat->pay_id = $fields['pay_id'];
                $candidat->nationalite_id = $fields['nationalite_id'];
                $candidat->ville_id_etud = $fields['ville_id_etud'];
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
                    'province_id' => $fields['province'],
                    'delegation_id' => $fields['delegation'],
                    'academie_id' =>  $fields['academie'],
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

            $candidat = null;
            $doc_file = null;
            $candidat = Candidat::where('user_id', Auth::id())->first();

            if (is_object($candidat)) {

                $path = $this->handleUploadedImage($request->file('file'));
                $doc_file = docFile::create([
                    'type' => 'bac',
                    'path' => $path,
                ]);
                $candidat->update([
                    'bac_id' => $doc_file->id,
                ]);

                $response = array(
                    'candidat' => $candidat,
                );


                return  response()->json($response, 200);
            }





            return  response()->json("nothing to update", 200);
        }

        return  response()->json("nothing to update" . $request, 200);
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
                $candidature = Candidature::where('candidat_id', $candidat->id)->where('formation_id', $fields['formation'])->first();

                $candidat->update([
                    'universite_dip_name' => $fields['pre_insc_universite'] . " _-_ " . $fields['universite_dip_name'],
                    'pre_insc_annee_universitaire' => $fields['pre_insc_annee_universitaire'],
                ]);

                if (!is_object($candidature)) {

                    $candidature = Candidature::create([
                        'labelle' => $candidat->nom_fr,
                        'candidat_id' => $candidat->id,
                        'formation_id' => $fields['formation'],
                    ]);

                    docFile::where('id', $candidat->bac_id)->first()->update([
                        'candidature_id' => $candidature->id,
                    ]);
                }


                $response = array(
                    'candidat' => $candidat,
                    'candidature' => $candidature,
                    'url'     => route('showPDF', $candidat->id),
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
