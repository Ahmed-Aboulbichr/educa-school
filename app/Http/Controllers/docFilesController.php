<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class docFilesController extends Controller
{
    public function getFiles(Request $request)
    {

        return Storage::get($request->directory.'/'.$request->filename);
       
    }
}
