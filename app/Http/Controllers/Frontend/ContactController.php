<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Website;

class ContactController extends Controller
{
    function index()
    {
        $website = Website::first();
        return view('Frontend.contact',compact('website'));
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'subject' => ['required'],
            'text' => ['required'],
        ]);

        Contact::create($request->all());
        session()->flash('success', 'Thanks for Contact with us!');
        return back();
    }
}
