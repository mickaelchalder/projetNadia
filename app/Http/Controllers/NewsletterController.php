<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewsletterRequest;
use App\Http\Controllers\Controller;
use Illuminate\View\ViewName;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function create()
    {
        return view('newsletter');
    }

    public function store(NewsletterRequest $request)
    {
        

        $newsletter = new Newsletter();

        $newsletter->name = $request->name;
        $newsletter->email = $request->email;
        $newsletter->save(); 

        return view('confirm');
    }
}
