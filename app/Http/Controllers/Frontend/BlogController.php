<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        $blogsCount = Blog::count();

        return view('pages.frontend.blogs', compact('blogs', 'blogsCount'));
    }

    public function blogDetail(int $id)
    {
        $blog = Blog::findOrFail($id);

        return view('pages.frontend.blog-detail', compact('blog'));
    }
}
