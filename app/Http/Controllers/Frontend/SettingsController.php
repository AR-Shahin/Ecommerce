<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $navItem = 'settings';
        return view('Frontend.settings.index', compact('navItem'));
    }

    public function updateInformation(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ['numeric'],
        ]);
        auth('customer')->user()->update($request->all());
        session()->flash('success', 'Profile Updated');
        return back();
    }
}
