<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\View\ViewName;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Mail\Newsletter;
use Illuminate\Support\Facades\DB;

class FormulaireController extends Controller
{
    public function create()
    {
        return view('formulaire');
    }

    public static function news($var)
    {
        $tab[] = $var;
        $sendNewsletter = DB::table('Newsletter')->select('email')->get();
        Mail::to($sendNewsletter)
        ->send(new Newsletter($tab));

        return 'ok';
    }
    public  function store(ContactRequest $request)
    {
        Mail::to('chalder@hotmail.fr')
        ->send(new Contact($request->except('_token')));

        return view('confirm');
    }
}
