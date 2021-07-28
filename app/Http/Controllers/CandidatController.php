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
        $candidat = Candidat::where('user_id', Auth::id())->orWhere('editor_id',Auth::id())->latest()->first();
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('candidat.profile')->with('candidat',Candidat::where('user_id',Auth::id())->orWhere('editor_id',Auth::id())->first());

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
            $validator = Validator::make($req->all(),[
                'nom_fr' => ['required', 'string', 'max:20'],
                'nom_ar' => ['required', 'string', 'max:20'],
                'prenom_fr' => ['required', 'string', 'max:20'],
                'prenom_ar' => ['required', 'string', 'max:20'],
                'lieu_naiss_fr' => ['nullable', 'string', 'max:50'],
                'lieu_naiss_ar' => ['nullable', 'string', 'max:50'],
                'CIN' => ['required', 'string', 'max:10'],
                'CNE' => ['required', 'string', 'max:20'],
                'date_naiss' => ['required', 'date_format:Y-m-d'],
                'tel' => ['required', 'numeric'],
                'situation_familiale' => ['nullable', 'string', 'max:20'],
                'sexe' => ['string', 'max:20'],
                'pay_id' => ['nullable', 'integer', Rule::exists('pays', 'id')->where('id', $req->input('pay_id'))],
                'nationalite_id' => ['nullable', 'integer', Rule::exists('nationalites', 'id')->where('id', $req->input('nationalite_id'))],
                'ville_id_etud' => ['nullable', 'integer', Rule::exists('villes', 'id')->where('id', $req->input('ville_id_etud'))],
                'adresse_etd' => ['nullable', 'string', 'max:100'],
            ]);
            if($validator->fails()){

                return  response()->json(['errors' => $validator->errors()->toArray()], 500);

            }else {
            $fields = $req->all();

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
                $candidat->editor_id = Auth::id();
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
    }



    public function saveStepTwo(Request $request)
    {
        if ($request->ajax()) {

            $validator = Validator::make($request->all(),[
                'cin_pere' => [ 'required', 'string', 'max:10'],
                'cin_mere' => [ 'required', 'string', 'max:10'],
                'tel_parent' => [ 'required', 'string', 'max:20'],
                'cat_pere' => [ 'required', 'string', Rule::in(['PUBLIC', 'PRIVE', 'LIBRE'])],
                'cat_mere' => [ 'required', 'string', Rule::in(['PUBLIC', 'PRIVE', 'LIBRE'])],
                'secteur_pere' => [ 'required', 'integer', Rule::exists('secteur_professions', 'id')->where('id', $request->input('secteur_pere'))],
                'secteur_mere' => [ 'required', 'integer', Rule::exists('secteur_professions', 'id')->where('id', $request->input('secteur_mere'))],
                'ville_parent' => [ 'required', 'integer', Rule::exists('villes', 'id')->where('id', $request->input('ville_parent'))],
                'prof_pere' => [ 'required', 'string', 'max:50'],
                'prof_mere' => [ 'required', 'string', 'max:50'],
                'adresse_parent' => [ 'nullable', 'string', 'max:100'],
            ]);
            if($validator->fails()){

                return  response()->json(['errors' => $validator->errors()->toArray()], 500);

            }else {
            $fields = $request->all();
            $candidat = null;
            $candidat = Candidat::where('user_id', Auth::id())->orWhere('editor_id',Auth::id())->first();
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
    }


    public function saveStepThree(Request $request)
    {
        if ($request->ajax()) {

            $validator = Validator::make($request->all(),[
                'annee_bac' => [ 'required', 'string', 'max:4'],
                'mention_bac' => [ 'required', 'string', Rule::in(['P', 'AB', 'B', 'TB', 'E'])],
                'mg_bac' => [ 'required', 'numeric', 'between:0,20'],
                'lycee_bac' => [ 'required', 'string', 'max:255'],
                'type_bac' => [ 'required', 'string', 'max:255'],
                'province' => [ 'required', 'integer', 'max:255',Rule::exists('provinces', 'id')->where('id', $request->input('province'))],
                'delegation' => [ 'required', 'integer', 'max:255',Rule::exists('delegations', 'id')->where('id', $request->input('delegation'))],
                'academie' => [ 'required', 'integer', 'max:255',Rule::exists('academies', 'id')->where('id', $request->input('academie'))],
            ]);
            if($validator->fails()){

                return  response()->json(['errors' => $validator->errors()->toArray()], 500);

            }else {
                $fields = $request->all();
                $candidat = null;
                $candidat = Candidat::where('user_id', Auth::id())->orWhere('editor_id',Auth::id())->first();

                if (is_object($candidat)) {
                    $candidat->update([
                        'annee_bac' => $fields['annee_bac'],
                        'mention_bac' => $fields['mention_bac'],
                        'mg_bac' => $fields['mg_bac'],
                        'type_bac' => $fields['type_bac'],
                        'lycee_bac' => $fields['lycee_bac'],
                        'province_id' => $fields['province'],
                        'delegation_id' => $fields['delegation'],
                        'academie_id' =>  $fields['academie'],
                        'completed' => 1,
                    ]);


                    $response = array(
                        'candidat' => $candidat,
                        'url'     => route('cursus_universitaire.index'),
                    );
                    return  response()->json($response, 200);
                } return  response()->json("nothing to update", 200);
            }
        }
    }

    public function saveStepFour(Request $request,$type)
    {


        if ($request->hasFile('file')) {

            $candidat = null;
            $doc_file = null;
            $candidat = Candidat::where('user_id', Auth::id())->orWhere('editor_id',Auth::id())->first();

            if (is_object($candidat)) {

                $path = $this->handleUploadedImage($request->file('file'));


                $doc = docFile::where('type',$type)->where('candidat_id',$candidat->id)->first();
                if($doc){
                    try {

                        unlink(base_path(). '/storage/app/'.  $doc->path);
                       } catch (\Throwable $th) {
                           //throw $th;
                       }


                       $doc->update([
                        'path' => $path,
                    ]);

                } else{

                    $doc_file = docFile::create([
                        'type' => $type,
                        'path' => $path,
                        'candidat_id' => $candidat->id,
                    ]);

                }






                $response = array(
                    'candidat' => $candidat,
                    'doc_file' => $doc_file,

                );


                return  response()->json($response, 200);
            }



            return  response()->json("nothing to update", 200);
        }

        return  response()->json("nothing to update" . $request, 200);
    }


    public function handleUploadedImage($file)
    {


        if (!is_null($file)) {
            $path =  Storage::putFile('Bac', $file);
            return $path;
        }
    }
}
