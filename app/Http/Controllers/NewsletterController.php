<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewsletterRequest;
use Illuminate\View\ViewName;

class NewsletterController extends Controller
{
    public function create()
    {
        return view('newsletter');
    }

    public function store(NewsletterRequest $request)
    {
        return view('confirm');
    }
}
