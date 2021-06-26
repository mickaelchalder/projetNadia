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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            ]);

        if($validator->fails()){
            $validator->fails();
            return redirect('/')->withInput();
        };

        $newsletter = new Newsletter();

        $newsletter->name = $request->name;
        $newsletter->email = $request->email;
        $newsletter->save();

        return view('confirm');
    }
}
