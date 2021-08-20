<?php

namespace App\Http\Controllers;

use App\Module;
use App\Semestre;
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
        $modules = Module::where('semestre_id',$request->input('semestre_id'))->get();
        return view('admin.structure_formation.module.index', ['modules' => $modules, 'semestre_id' => $request->input('semestre_id')]);

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
            'semestre_id' => ['required', 'integer', Rule::exists('semestres', 'id')->where('id', $request->input('semestre_id'))],
            'id_module' => ['required', 'string', 'max:255'],
            'intitule_module' => ['required', 'string', 'max:255']
        ]);

        Module::create([
            'semestre_id' => $request->get('semestre_id'),
            'id_module' => $request->get('id_module'),
            'intitule_module' => $request->get('intitule_module')
        ]);

        return redirect()->route('module.index', ["semestre_id" => $request->input('semestre_id')])
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

        $module = Module::where('id',$id)->first();

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
            'semestre_id' => ['required', 'integer', Rule::exists('semestres', 'id')->where('id', $request->input('semestre_id'))],
            'id_module' => ['required', 'string', 'max:255'],
            'intitule_module' => ['required', 'string', 'max:255']
        ]);

        Module::where('id', $id)->first()->update([
            'semestre_id' => $request->get('semestre_id'),
            'id_module' => $request->get('id_module'),
            'intitule_module' => $request->get('intitule_module')
        ]);

        return redirect()->route('module.index', ["semestre_id" => $request->input('semestre_id')])
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
        $semestre_id = $module->semestre_id;
        return redirect()->route('module.index', ["semestre_id" =>  $semestre_id])
            ->with('success', 'Le module a été supprimée');
    }

    public function getModulesBySemestre(Request $request)
    {
        $semestre = Semestre::where('id', $request->input('semestre'))->first();
        $modules = Module::where('semestre_id', $semestre->id)->get();
        return response()->json($modules, 200);
    }
}
