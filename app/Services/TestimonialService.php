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
        $testimonial = new Testimonial();
        $testimonial->author_name = $data['author_name'];
        if (isset($data['photo'])) {
            $testimonial->setPhotoAttribute($data['photo']);
        }
        $testimonial->slug = Str::slug($data['author_name'], '-');
        $testimonial->content = $data['content'];
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
        $testimonial->author_name = $data['author_name'];
        if (isset($data['photo'])) {
            $testimonial->setPhotoAttribute($data['photo']);
        }
        $testimonial->slug = Str::slug($data['author_name'], '-');
        $testimonial->content = $data['content'];
        $testimonial->update();

        return $testimonial;
    }

    public function deleteTestimonial(int $id)
    {
        return Testimonial::findOrFail($id)->delete();
    }
}
