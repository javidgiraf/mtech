<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productDetails()
    {
        $product = Product::with('productImages', 'productSectors.sector', 'productVideos')->latest()->first();
        $productsCount = Product::count();
        
        return view('pages.frontend.product-details', compact('product', 'productsCount'));
    }
}
