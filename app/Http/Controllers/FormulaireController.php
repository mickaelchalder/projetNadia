<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\View\ViewName;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class FormulaireController extends Controller
{
    public function create()
    {
        return view('formulaire');
    }

    public function store(ContactRequest $request)
    {
        Mail::to('chalder@hotmail.fr')
        ->send(new Contact($request->except('_token')));

        return view('confirm');
    }
}
