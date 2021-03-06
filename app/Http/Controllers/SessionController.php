<?php

namespace App\Http\Controllers;

use App\DateSession;
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
        $sessions = Session::all()->sortByDesc('annee_univ');
        return view('admin.session.index', compact('sessions'));
    }
    /*
    public function getSessionsByAnneeUniv($date = 0)
    {
        $date_sessions = DateSession::where('session_id', Session::where('annee_univ', $date)->first('id')->id)->get();

        $response = [
            'date' => $date_sessions
        ];

        return response()->json($response, 200);
    }
    */
    public function all(Request $req)
    {
        /* $sessions = Session::all()->sortByDesc('date_session'); */
        $sessions = Session::all();
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
        ]);

        Session::create([
            'annee_univ' => $request->get('annee_univ'),
        ]);

        return redirect()->route('session.index')
            ->with('success', 'La session a ??t?? enregistr??e');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_multi(Request $request)
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
        ]);

        Session::where('id', $id)->update([
            'annee_univ' => $request->get('annee_univ'),
        ]);
        return redirect()->route('session.index')
            ->with('success', 'La session a ??t?? modifi??');
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
            ->with('success', 'La session a ??t?? supprim??e');
    }

    public function renderSessions()
    {
        $sessions = Session::orderBy('annee_univ', 'desc')->get();
        return  response()->json($sessions, 200);
    }
}
