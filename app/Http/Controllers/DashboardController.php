<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(!auth()->user()->can('View Dashboard')) {
            return redirect()->route('admin.access-controls');
        }
        
        return view('pages.admin.dashboard');
    }
} 
