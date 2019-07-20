<?php

namespace Eemi\Http\Controllers;

use Illuminate\Http\Request;

class MonController extends Controller
{
    public function maMethode()
    {
        return view('exemple.affichage');
    }
}
