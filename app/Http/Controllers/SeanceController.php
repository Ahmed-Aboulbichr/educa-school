<?php

namespace App\Http\Controllers;

use App\Matiere;
use App\Module;
use App\Salle;
use App\Seance;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Validation\Rule ;

class SeanceController extends Controller
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
    {  if($request->ajax())

    	{
            $tempstart = New DateTime() ;
            $tempstart= $tempstart->setTime(date('H', strtotime($request->heure) ),date('i', strtotime($request->heure)));
            $temp = $tempstart->modify("+$request->duree minutes")->format('H:i:s') ;
            $ids = Salle::whereNotIn('id', Seance::where('jour',$request->jour)->where('heure','>=',$request->heure)->where('heure','<',$temp)->orWhere('jour',$request->jour)->where('heure','<',$request->heure)->where(DB::raw('DATE_ADD(heure,INTERVAL '.$request->duree.' MINUTE)'),'>=',$request->heure)->get('salle_id'))->pluck('id')->toArray();
            $idsMatieres = Matiere::whereIn('module_id', Module::where('semestre_id', $request->semestre)->get('id'))->whereNotIn('id', Seance::where('jour',$request->jour)->where('heure','>=',$request->heure)->where('heure','<',$temp)->orWhere('jour',$request->jour)->where('heure','<',$request->heure)->where(DB::raw('DATE_ADD(heure,INTERVAL '.$request->duree.' MINUTE)'),'>=',$request->heure)->get('matiere_id'))->pluck('id')->toArray();

             $validator = Validator::make($request->all(),[
            'salle' => ['required', 'integer', Rule::in($ids) ],
            'semestre' => ['required', 'integer', Rule::exists('semestres', 'id')->where('id', $request->semestre)],
            'duree' => ['required', 'integer', ],
            'heure' => ['required', 'date_format:H:i', ],
            'matiere' => ['required', 'integer', Rule::in($idsMatieres)],
            'groupe' => ['required', 'integer', Rule::exists('groupes', 'id')->where('id', $request->groupe)],
            'sousGroupe' =>  'nullable:integer:exists:sous_groupes,id|nullable:string:null',
            'jour' => ['required', 'string', 'max:20',],
            ]);
        if($validator->fails()){

            return  response()->json(['errors' => $validator->errors()->toArray()], 500);

        }else {
        $fields = $request->all();

        
            $Seance =  new Seance();
            $Seance->salle_id = $fields['salle'];
            $Seance->semestre_id = $fields['semestre'];
            $Seance->duree = $fields['duree'];
            $Seance->heure = $fields['heure'];
            $Seance->matiere_id = $fields['matiere'];
            $Seance->groupe_id = $fields['groupe'];
            if($fields['sousGroupe'] != 'null'){

                $Seance->sous_groupe_id = $fields['sousGroupe'];
            }
            $Seance->jour = $fields['jour'];

            $Seance->save();
            return  response()->json('success', 200);
    	}
    }
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
}
