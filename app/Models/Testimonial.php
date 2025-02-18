<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    protected $guarded = [];

    public function setPhotoAttribute($file)
    {
        if ($file) {
            if (!empty($this->attributes['photo']) && Storage::disk('public')->exists('testimonials/' . $this->attributes['photo'])) {
                Storage::disk('public')->delete('testimonials/' . $this->attributes['photo']);
            }
            $photoName = time() . '_' . $file->getClientOriginalName();
            $path = 'testimonials';
            $file->storeAs($path, $photoName, 'public');

            $this->attributes['photo'] = $photoName;
        }
    }

    public function getPhotoUrl()
    {
        return asset('storage/testimonials/'. $this->attributes['photo']);
    }
}
