<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    
    public function index()
    {
        $blogs = $this->blogService->getAllBlogs(10);

        return view('pages.admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('pages.admin.blogs.create');
    }

    public function store(CreateBlogRequest $request)
    {
        $this->blogService->createBlog($request->all());

        return redirect()->route('admin.blogs.index')->with('success', 'Blog saved successfully');
    }

    public function show(Blog $blog)
    {
        
    }

    public function edit(Blog $blog)
    {
        $blog = $this->blogService->editBlog($blog->id);

        return view('pages.admin.blogs.edit', 
            compact('blog')
        );
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {    
        $this->blogService->updateBlog(
            $blog->id, 
            $request->all()
        );

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully');
    }

    public function destroy(Blog $blog)
    {
        $this->blogService->deleteBlog($blog->id);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully');
    }
}
