<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\ViewName;

class FormulaireController extends Controller
{
    public function store(Request $request)
    {
        return 'Le nom est ' . $request->input('name');
        /* $nom = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        return View('test', [$nom,$email,$message]); */
                
    }
}
