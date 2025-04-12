<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Faq;
use App\Models\Sector;
use App\Models\Service;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Career;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $clients = Client::latest()->get();
        $sector = Sector::latest()->first();
        $product = Product::latest()->first();
        $service = Service::latest()->first();
        $servicesCount = Service::count();
        $sectorsCount = Sector::count();
        $productsCount = Product::count();
        $faqsCount = Faq::count();
        $testimonialsCount = Testimonial::count();
        $clientsCount = Client::count();
        $blogsCount = Blog::count();
        $careers = Career::all();
        $latestBlog = Blog::latest()->first();
        $blogs = Blog::latest()->skip(1)->take(2)->get();

        return view('pages.frontend.home', compact('faqs', 'testimonials', 'clients', 'sector', 'faqsCount', 'testimonialsCount', 'clientsCount', 'servicesCount', 'sectorsCount', 'productsCount', 'blogsCount', 'careers', 'service', 'product', 'latestBlog', 'blogs'));
    }
}
