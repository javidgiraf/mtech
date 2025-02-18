<?php

namespace App\Services;

use App\Models\Testimonial;
use Illuminate\Support\Str;

class TestimonialService
{
    public function getAllTestimonials(int $perPage)
    {
        return Testimonial::latest()
            ->paginate($perPage);
    }

    public function createTestimonial(array $data)
    {
        $testimonial = new Testimonial($data);

        if (isset($data['photo'])) {
            $testimonial->setPhotoAttribute($data['photo']);
        }
        $testimonial->slug = Str::slug($data['title'], '-');
        $testimonial->save();

        return $testimonial;
    }

    public function editTestimonial(int $id)
    {
        return Testimonial::findOrFail($id);
    }

    public function updateTestimonial(int $id, array $data)
    {
        $testimonial = Testimonial::findOrFail($id);

        if (request()->hasFile('photo')) {
            $testimonial->setPhotoAttribute($data['photo']);
        }
        $testimonial->slug = Str::slug($data['title'], '-');
        $testimonial->fill($data)->update();

        return $testimonial;
    }

    public function deleteTestimonial(int $id)
    {
        return Testimonial::findOrFail($id)->delete();
    }
}