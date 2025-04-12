<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function serviceDetails()
    {
        $service = Service::with('serviceImages', 'serviceVideos')->latest()->first();
        $servicesCount = Service::count();
        
        return view('pages.frontend.service-details', compact('service', 'servicesCount'));
    }
}
