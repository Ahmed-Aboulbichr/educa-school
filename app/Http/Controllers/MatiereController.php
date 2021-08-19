<?php

namespace App\Http\Controllers;

use App\Matiere;
use App\Module;
use App\Seance;
use App\Semestre;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatiereController extends Controller
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




    public function show_multi(Request $request)
    {
       
        if ($request->ajax()) {
            
           
            $tempstart = New DateTime() ;
            $tempstart= $tempstart->setTime(date('H', strtotime($request->heure) ),date('i', strtotime($request->heure)));
            $temp = $tempstart->modify("+$request->duree minutes")->format('H:i:s') ;
         

            $Matieres = Matiere::whereIn('module_id', Module::where('semestre_id', $request->semestre)->get('id'))->whereNotIn('id', Seance::where('jour',$request->jour)->where('heure','>=',$request->heure)->where('heure','<',$temp)->orWhere('jour',$request->jour)->where('heure','<',$request->heure)->where(DB::raw('DATE_ADD(heure,INTERVAL '.$request->duree.' MINUTE)'),'>=',$request->heure)->get('matiere_id'))->get();

            return response()->json($Matieres);
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
