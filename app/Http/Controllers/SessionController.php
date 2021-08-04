<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('session_index'), 403);
          
        $sessions = Session::all()->sortBy('date_session')->sortByDesc('annee_univ');
        return view('admin.session.index', compact('sessions'));
    }

    public function all(Request $req)
    {
        $sessions = Session::all()->sortByDesc('date_session');

        return view('admin.candidature.sessions')->with('sessions', $sessions);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('session_create'), 403);
        return view('admin.session.create');
    }

    function listeAnneeUniv()
    {
        $t[0] = strval(date('Y') . "-" . (date('Y') + 1));
        for ($i = 0; $i < 20; $i++) {
            $currentYear = date('Y');
            $year = $currentYear - $i;
            $lastYear = $currentYear - ($i + 1);
            $t[$i + 1] = strval($lastYear . "-" . $year);
        }
        return $t;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('session_create'), 403);
        $t = $this->listeAnneeUniv();
        $request->session()->flash('operation', 'store');
        $request->validate([
            'annee_univ' => 'required|in:' . implode(',', $t),
            'date_session' => ['required', 'date_format:Y-m-d']
        ]);

        Session::create([
            'annee_univ' => $request->get('annee_univ'),
            'date_session' => $request->get('date_session')
        ]);

        return redirect()->route('session.index')
            ->with('success', 'La session a été enregistrée');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('session_edit'), 403);
        $session = Session::findOrFail($id);
        $response = [
            'session' => $session,
            'route' =>  route('session.update', [$id])
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
        abort_if(Gate::denies('session_edit'), 403);
        $t = $this->listeAnneeUniv();
        $request->session()->flash('operation', 'update');
        $request->validate([
            'annee_univ' => 'required|in:' . implode(',', $t),
            'date_session' => ['required', 'date_format:Y-m-d']
        ]);

        Session::where('id', $id)->update([
            'annee_univ' => $request->get('annee_univ'),
            'date_session' => $request->get('date_session')
        ]);
        return redirect()->route('session.index')
            ->with('success', 'La session a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('session_delete'), 403);
        $session = Session::findOrFail($id);
        $session->delete();
        return redirect()->route('session.index')
            ->with('success', 'La session a été supprimée');
    }

    public function renderSessions()
    {
        $sessions = Session::all();
        return  response()->json($sessions, 200);
    }
}
