<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App as FacadesApp;

class LocaleController extends Controller
{
    public function lang($locale)
    {
        FacadesApp::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
