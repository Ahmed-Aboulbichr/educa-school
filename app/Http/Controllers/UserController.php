<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function renderView()
    {
        return view('manageUsers.index');
    }

    public function renderUsers(Request $request)
    {
        if ($request->ajax()) {
            $relations = ['pack'];
            $users = User::All();

            return Datatables::of($users)
                ->addColumn('name', function ($row) {
                    return $row->firstName.' '.$row->lastName;
                })

                ->rawColumns([''])
                ->make(true);
        }
    }
}
