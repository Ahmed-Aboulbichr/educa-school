<?php

namespace App\Http\Controllers;

use App\Formation;
use App\Semestre;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;
class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $semestres = Semestre::with(['session'])->where('formation_id',$request->input('formation_id'))->get();
        return view('admin.structure_formation.semestre.index', ['semestres' => $semestres, 'formation_id' => $request->input('formation_id')]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //abort_if(Gate::denies('semestre_create'), 403);
        $request->session()->flash('operation', 'store');
        $request->validate([
            'session_id' => ['required', 'integer', Rule::exists('sessions', 'id')->where('id', $request->input('session_id'))],
            'formation_id' => ['required', 'integer', Rule::exists('formations', 'id')->where('id', $request->input('formation_id'))],
            'intitule_semestre' => ['required', 'string', 'max:255']
        ]);

        Semestre::create([
            'session_id' => $request->get('session_id'),
            'formation_id' => $request->get('formation_id'),
            'intitule_semestre' => $request->get('intitule_semestre')
        ]);

        return redirect()->route('semestre.index', ["formation_id" => $request->input('formation_id')])
            ->with('success', 'Le semestre a été enregistrée');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_multi(Request $request)
    {
        if ($request->ajax()) {

            $Semestres = Semestre::where('session_id', $request->session)->get();


            return response()->json($Semestres);
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $semestre = Semestre::with(['session'])->where('id',$id)->first();

        $response = [
            'semestre' => $semestre,
            'route' =>  route('semestre.update', [$id])
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
            'session_id' => ['required', 'integer', Rule::exists('sessions', 'id')->where('id', $request->input('session_id'))],
            'formation_id' => ['required', 'integer', Rule::exists('formations', 'id')->where('id', $request->input('formation_id'))],
            'intitule_semestre' => ['required', 'string', 'max:255']
        ]);

        Semestre::where('id', $id)->first()->update([
            'session_id' => $request->get('session_id'),
            'formation_id' => $request->get('formation_id'),
            'intitule_semestre' => $request->get('intitule_semestre')
        ]);

        return redirect()->route('semestre.index', ["formation_id" => $request->input('formation_id')])
            ->with('success', 'Le semestre a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semestre $semestre)
    {
        //abort_if(Gate::denies('semestre_delete'), 403);
        $semestre->delete();
        $formation_id = $semestre->formation_id;
        return redirect()->route('semestre.index', ["formation_id" =>  $formation_id])
            ->with('success', 'Le semestre a été supprimée');
    }

    public function getSemestresByFormation(Request $request)
    {
        $formation = Formation::where('id', $request->input('formation'))->first();
        $semestres = Semestre::where('formation_id', $formation->id)->get();
        return response()->json($semestres, 200);
    }
}
