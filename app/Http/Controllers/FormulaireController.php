<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\View\ViewName;

class FormulaireController extends Controller
{
    public function create()
    {
        return view('formulaire');
    }

    public function store(ContactRequest $request)
    {
        return view('confirm');
    }
}
