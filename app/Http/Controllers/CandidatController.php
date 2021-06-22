<?php

namespace App\Http\Controllers;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Candidat;
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
    public function saveStepTwo(Request $request){
        if ($request->ajax()) {
            $fields = $request->validate([
                'cin_pere' => ['bail', '', 'string', 'max:255'],
                'cin_mere' => ['bail','', 'string', 'max:255'],
                'tel_parent' => ['bail','', 'string', 'max:255']
            ]);
            $candidat=null;
            $candidat = Candidat::where('user_id', Auth::id())->first();
            if(is_object($candidat)){
                $candidat->update([
                    'CIN_pere' => $fields['cin_pere'],
                    'CIN_mere' => $fields['cin_mere'],
                    'tel_parent' => $fields['tel_parent'],
                ]);
                $response = array(
                    "candidat" => $candidat
                );
                return response()->json($response, 200);
            }else{
                 $response = "nothing to update";
                return response()->json($response,405);
            }
        }
    }


    public function saveStepThree(Request $request){

        if ($request->ajax()) {
           $fields = $request->validate([
                'annee_bac' => ['','string', 'max:4'],
                'mention_bac' => ['','string', Rule::in(['P', 'AB','B', 'TB','E'])],
                'mg_bac' => ['','numeric', 'between:0,20'],
                'lycee_bac' => ['','string', 'max:255'],
                'province' => ['','string', 'max:255'],
                'delegation' => ['','string', 'max:255'],
                'academie' => ['','string', 'max:255'],
            ]);
            $candidat =null;
            $candidat = Candidat::where('user_id',Auth::id())->first();

            if(is_object($candidat)){
                $candidat->update([
                    'annee_bac' => $fields['annee_bac'],
                    'mention_bac'=> $fields['mention_bac'],
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


    public function saveStepFour(Request $request){


        if ($request->hasFile('file')) {
            $path = $this->handleUploadedImage($request->file('file'));
            $candidat =null;
            $candidat = Candidat::where('user_id',Auth::id())->first();

            if(is_object($candidat)){
                $candidature = null;
                $doc_file = null;
                $candidature = Candidature::where('condidat_id',$candidat->id)->first();



               if(is_object($candidature)){

                $doc_file = doc_file::create([
                    'type' => 'bac',
                    'path' => $path,
                    'candidature_id' => $candidature->id,
                ]);
                $candidat->update([
                    'bac_id' => $doc_file->id,
                ]);
               }


                $candidature = array(
                    'candidat' => $candidat,
                    'candidat' => $candidature,
                );
                return  response()->json($response, 200);
            }

                return  response()->json("nothing to update".$request, 200);
            }



    }


    public function saveStepFive(Request $request){


        if ($request->ajax()) {
            $fields = $request->validate([
                'pre_insc_annee_universitaire' => ['','string',
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
                "2003-2004"])],

                'pre_insc_universite' => ['','string', 'max:255'],
                'universite_dip_name' => ['','string', 'max:255'],
                'formation' => ['','string', 'max:255'],
            ]);
            $candidat =null;
            $candidat = Candidat::where('user_id',Auth::id())->first();

            if(is_object($candidat)){
                $candidature = null;
                $candidature = Candidature::where('condidat_id',$candidat->id)->where('formation_id',$fields['formation'])->first();

                $candidat->update([
                    'universite_dip_name' => $fields['pre_insc_universite']." _-_ ".$fields['universite_dip_name'],
                    'pre_insc_annee_universitaire'=> $fields['pre_insc_annee_universitaire'],
                ]);

               if(!is_object($candidature)){
                $candidature = Candidature::create([
                    'condidat_id' => $fields[$candidat->id],
                    'formation_id'=> $fields['formation'],
                ]);
               }


                $candidature = array(
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
