<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    function index()
    {
        $navItem = 'message';
        return view('Frontend.message.index', compact(('navItem')));
    }
}
