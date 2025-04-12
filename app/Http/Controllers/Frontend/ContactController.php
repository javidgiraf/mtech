<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;

class ContactController extends Controller
{
    public function index()
    {
        $careers = Career::all();
        
        return view('pages.frontend.contact-us', compact('careers'));
    }
}
