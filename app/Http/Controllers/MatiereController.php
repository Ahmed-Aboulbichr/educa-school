<?php

namespace App\Http\Controllers;

use App\Matiere;
use App\Module;
use App\Seance;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MatiereController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


    }
    public function index(Request $request)
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $matieres = Matiere::where('module_id',$request->input('module_id'))->get();
        return view('admin.structure_formation.matiere.index', ['matieres' => $matieres, 'module_id' => $request->input('module_id')]);

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
   

        //abort_if(Gate::denies('semestre_create'), 403);
        $request->session()->flash('operation', 'store');
        $request->validate([
            'module_id' => ['required', 'integer', Rule::exists('modules', 'id')->where('id', $request->input('module_id'))],
            'professeur_id' => ['required', 'integer', Rule::exists('professeurs', 'id')->where('id', $request->input('professeur_id'))],
            'id_matiere' => ['required', 'string', 'max:255'],
            'intitule_matiere' => ['required', 'string', 'max:255']
        ]);

        Matiere::create([
            'module_id' => $request->get('module_id'),
            'professeur_id' => $request->get('professeur_id'),
            'id_matiere' => $request->get('id_matiere'),
            'intitule_matiere' => $request->get('intitule_matiere')
        ]);

        return redirect()->route('matiere.index', ["module_id" => $request->input('module_id')])
            ->with('success', 'La matiere a été enregistrée');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $matiere = Matiere::where('id',$id)->first();

        $response = [
            'matiere' => $matiere,
            'route' =>  route('matiere.update', [$id])
        ];

        return response()->json($response, 200);
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
        //abort_if(Gate::denies('semestre_edit'), 403);
        $request->session()->flash('operation', 'update');
        $request->validate([
            'module_id' => ['required', 'integer', Rule::exists('modules', 'id')->where('id', $request->input('module_id'))],
            'professeur_id' => ['required', 'integer', Rule::exists('professeurs', 'id')->where('id', $request->input('professeur_id'))],
            'id_matiere' => ['required', 'string', 'max:255'],
            'intitule_matiere' => ['required', 'string', 'max:255']
        ]);

        Matiere::where('id', $id)->first()->update([
            'module_id' => $request->get('module_id'),
            'professeur_id' => $request->get('professeur_id'),
            'id_matiere' => $request->get('id_matiere'),
            'intitule_matiere' => $request->get('intitule_matiere')
        ]);

        return redirect()->route('matiere.index', ["module_id" => $request->input('module_id')])
            ->with('success', 'La matiere a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matiere $matiere)
    {
        //abort_if(Gate::denies('semestre_delete'), 403);
        $matiere->delete();
        $module_id = $matiere->module_id;
        return redirect()->route('matiere.index', ["module_id" =>  $module_id])
            ->with('success', 'La matiere a été supprimée');
    }

  /*  public function getModulesBySemestre(Request $request)
    {
        $semestre = Semestre::where('id', $request->input('semestre'))->first();
        $modules = Module::where('semestre_id', $semestre->id)->get();
        return response()->json($modules, 200);
    }*/
}
