<?php

namespace App\Http\Controllers;

use App\Candidat;
use App\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('formation_index'), 403);
        $formations = DB::table('formations')
            ->join('sessions', 'session_id', '=', 'sessions.id')
            ->join('type_formations', 'type_formation_id', '=', 'type_formations.id')
            ->join('niveau_etudes', 'niveau_preRequise', '=', 'niveau_etudes.id')
            ->select(['formations.*', 'sessions.date_session', 'sessions.annee_univ', 'type_formations.designation', 'niveau_etudes.intitule'])
            ->orderBy('sessions.date_session', 'DESC')
            ->orderBy('formations.dateLimite', 'ASC')
            ->get();
        //return  response()->json($formations, 200);
        return view('admin.formation.index', compact('formations'));
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
        $request->session()->flash('operation', 'store');
        $request->validate([
            'session_id' => ['required', 'integer', Rule::exists('sessions', 'id')->where('id', $request->input('session_id'))],
            'dateLimite' => ['required',  'date_format:Y-m-d'],
            'type_formation_id' => ['required', 'integer', Rule::exists('type_formations', 'id')->where('id', $request->input('type_formation_id'))],
            'niveau_preRequise' => ['required', 'integer', Rule::exists('niveau_etudes', 'id')->where('id', $request->input('niveau_preRequise'))],
            'niveau_acces' => ['required', 'integer', Rule::in(['1', '2', '3', '4', '5'])],
            'duree' => ['required', 'integer', Rule::in(['1', '2', '3', '4', '5'])],
            'specialite' => ['required', 'string', 'max:255']
        ]);

        Formation::create([
            'session_id' => $request->get('session_id'),
            'dateLimite' => $request->get('dateLimite'),
            'type_formation_id' => $request->get('type_formation_id'),
            'niveau_preRequise' => $request->get('niveau_preRequise'),
            'niveau_acces' => $request->get('niveau_acces'),
            'duree' => $request->get('duree'),
            'specialite' => $request->get('specialite')
        ]);

        return redirect()->route('formation.index')
            ->with('success', 'La formation a été enregistrée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* $formation = Formation::where('type_formation_id', $id)->get();

        return view('admin.candidature.formations', ['formations' => $formation]); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('formation_edit'), 403);
        $formation = Formation::where('formations.id', $id)
            ->join('sessions', 'session_id', '=', 'sessions.id')
            ->join('type_formations', 'type_formation_id', '=', 'type_formations.id')
            ->join('niveau_etudes', 'niveau_preRequise', '=', 'niveau_etudes.id')
            ->select(['formations.*', 'sessions.date_session', 'sessions.annee_univ', 'type_formations.designation', 'niveau_etudes.intitule'])
            ->get()
            ->first();

        $response = [
            'formation' => $formation,
            'route' =>  route('formation.update', [$id])
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
        $request->session()->flash('operation', 'update');
        $request->validate([
            'session_id' => ['required', 'integer', Rule::exists('sessions', 'id')->where('id', $request->input('session_id'))],
            'dateLimite' => ['required',  'date_format:Y-m-d'],
            'type_formation_id' => ['required', 'integer', Rule::exists('type_formations', 'id')->where('id', $request->input('type_formation_id'))],
            'niveau_preRequise' => ['required', 'integer', Rule::exists('niveau_etudes', 'id')->where('id', $request->input('niveau_preRequise'))],
            'niveau_acces' => ['required', 'integer', Rule::in(['1', '2', '3', '4', '5'])],
            'duree' => ['required', 'integer', Rule::in(['1', '2', '3', '4', '5'])],
            'specialite' => ['required', 'string', 'max:255']
        ]);

        Formation::where('id', $id)->first()->update([
            'session_id' => $request->get('session_id'),
            'dateLimite' => $request->get('dateLimite'),
            'type_formation_id' => $request->get('type_formation_id'),
            'niveau_preRequise' => $request->get('niveau_preRequise'),
            'niveau_acces' => $request->get('niveau_acces'),
            'duree' => $request->get('duree'),
            'specialite' => $request->get('specialite')
        ]);
        return redirect()->route('formation.index')
            ->with('success', 'La formation a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('formation_delete'), 403);
        $formation = Formation::findOrFail($id);
        $formation->delete();
        return redirect()->route('formation.index')
            ->with('success', 'La formation a été supprimée');
    }

    public function renderFormations()
    {
        /*if ($request->ajax()) {

        $formations = Formation::with(['session','typeFormation', 'niveauEtude'])
        ->orderBy('niveau_etude_intitule')
        ->get();
        return  response()->json($formations, 200);
        }
        */

        $candidat  = Candidat::where('user_id', Auth::id())->orWhere('editor_id',Auth::id())->latest()->first();
        if ($candidat == null) return redirect(route('getPreInscr'), 302);
        else
            $formations = DB::table('formations')
                ->join('sessions', 'session_id', '=', 'sessions.id')
                ->join('type_formations', 'type_formation_id', '=', 'type_formations.id')
                ->select(['formations.*', 'sessions.date_session', 'sessions.annee_univ', 'type_formations.designation'])
                ->whereNotIn('formations.id', function ($query) {
                    $candidat  = Candidat::where('user_id', Auth::id())->orWhere('editor_id',Auth::id())->latest()->first();
                    $query->select('formation_id')->from('candidatures')->where('candidat_id', $candidat->id);
                })
                ->orderBy('sessions.date_session', 'DESC')
                ->orderBy('formations.dateLimite', 'ASC')
                ->get();

        return view('candidat.candidatures.formations', compact('formations'));
    }
}
