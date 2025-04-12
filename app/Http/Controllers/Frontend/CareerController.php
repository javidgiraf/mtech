<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        return view('pages.frontend.career');
    }

    public function careerForm()
    {
        $careers = Career::latest()->get();

        return view('pages.frontend.career-form', compact('careers'));
    }
}
