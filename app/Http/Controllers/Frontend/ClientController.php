<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $clientsCount = Client::count();
        $testimonialsCount = Testimonial::count();

        return view('pages.frontend.clients', compact('clients', 'testimonials', 'clientsCount', 'testimonialsCount'));
    }
}
