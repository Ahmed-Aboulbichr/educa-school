<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function renderView()
    {
        return view('manageUsers.index');
    }

    public function renderUsers(Request $request)
    {
        if ($request->ajax()) {
            $users = User::All();

            return Datatables::of($users)
                ->addColumn('name', function ($row) {
                    return $row->firstName . ' ' . $row->lastName;
                })

                ->rawColumns([''])
                ->make(true);
        }
    }

    public function renderUser(Request $request)
    {
        if ($request->ajax()) {

            $user = User::find($request->id);

            $response = array(
                'user' => $user,
            );
            return  response()->json($response, 200);
        }
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
        if ($request->ajax()) {
            $fields = $request->validate([
                'lastName' => ['required', 'string', 'max:255'],
                'firstName' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $user = User::create([
                'firstName' => $fields['firstName'],
                'lastName' => $fields['lastName'],
                'email' => $fields['email'],
                'password' => Hash::make($fields['password']),
            ]);

            $response = array(
                'user' => $user,
            );
            return  response()->json($response, 200);
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
    public function update(Request $request)
    {

        if ($request->ajax()) {
            $fields = $request->validate([
                'lastName' => ['string', 'max:255'],
                'firstName' => ['string', 'max:255'],
                'email' => ['string', 'email', 'max:255', 'unique:users,email,' . $request->userid,],
                'password' => ['string', 'min:8', 'confirmed'],
            ]);

            $user = User::where('id', $request->userid)->firstOrFail();
            $user->update([
                'firstName' => $fields['firstName'],
                'lastName' => $fields['lastName'],
                'email' => $fields['email'],
                'password' => Hash::make($fields['password']),
            ]);


            $response = array(
                'user' => $user,
            );
            return  response()->json($response, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        User::findOrFail($request->userid)->delete();

        return "success";
    }
}
