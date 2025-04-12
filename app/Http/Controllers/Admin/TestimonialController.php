<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use App\Services\TestimonialService;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public $testimonialService;

    public function __construct(TestimonialService $testimonialService)
    {
        $this->testimonialService = $testimonialService;
    }
    
    public function index()
    {
        $testimonials = $this->testimonialService->getAllTestimonials(10);

        return view('pages.admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('pages.admin.testimonials.create');
    }

    public function store(CreateTestimonialRequest $request)
    {
        $this->testimonialService->createTestimonial($request->all());

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial saved successfully');
    }

    public function show( $blog)
    {
        
    }

    public function edit(Testimonial $testimonial)
    {
        $testimonial = $this->testimonialService->editTestimonial($testimonial->id);

        return view('pages.admin.testimonials.edit', 
            compact('testimonial')
        );
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {    
        $this->testimonialService->updateTestimonial(
            $testimonial->id, 
            $request->all()
        );

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully');
    }

    public function destroy(Testimonial $testimonial)
    {
        $this->testimonialService->deleteTestimonial($testimonial->id);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully');
    }
}
