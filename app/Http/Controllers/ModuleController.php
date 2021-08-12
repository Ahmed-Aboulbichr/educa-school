<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //abort_if(Gate::denies('semestre_index'), 403);
        $semestres = Module::with(['session'])->where('formation_id',$request->input('formation_id'))->get();
        return view('admin.structure_formation.module.index', ['semestres' => $semestres, 'formation_id' => $request->input('formation_id')]);

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

        Module::create([
            'session_id' => $request->get('session_id'),
            'formation_id' => $request->get('formation_id'),
            'intitule_semestre' => $request->get('intitule_semestre')
        ]);

        return redirect()->route('module.index', ["formation_id" => $request->input('formation_id')])
            ->with('success', 'Le module a été enregistrée');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $module = Module::with(['session'])->where('id',$id)->first();

        $response = [
            'module' => $module,
            'route' =>  route('module.update', [$id])
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

        Module::where('id', $id)->first()->update([
            'session_id' => $request->get('session_id'),
            'formation_id' => $request->get('formation_id'),
            'intitule_semestre' => $request->get('intitule_semestre')
        ]);

        return redirect()->route('module.index', ["formation_id" => $request->input('formation_id')])
            ->with('success', 'Le module a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        //abort_if(Gate::denies('semestre_delete'), 403);
        $module->delete();
        $formation_id = $module->formation_id;
        return redirect()->route('module.index', ["formation_id" =>  $formation_id])
            ->with('success', 'Le module a été supprimée');
    }
}
