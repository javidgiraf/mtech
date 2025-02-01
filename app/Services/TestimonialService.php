<?php

namespace App\Services;

use App\Models\Testimonial;

class TestimonialService
{
    public function getAllTestimonials($perPage)
    {
        return Testimonial::latest()
            ->paginate($perPage);
    }

    public function createTestimonial(array $data)
    {
        return Testimonial::create($data);
    }

    public function editTestimonial(Testimonial $testimonial)
    {
        return $testimonial;
    }

    public function updateTestimonial(Testimonial $testimonial, array $data)
    {
        return $testimonial->update($data);
    }

    public function deleteTestimonial(Testimonial $testimonial)
    {
        return $testimonial->delete();
    }
}