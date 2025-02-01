<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    protected $guarded = [];

    public function setImageAttribute($file)
    {
        if ($file) {
            if ($this->attributes['image'] ?? false) {
                Storage::disk('public')->delete('blogs/'. $this->attributes['image']);
            }
            $imageName = time() . '_' . $file->getClientOriginalName();
            $path = 'blogs';
            $file->storeAs($path, $imageName, 'public');

            $this->attributes['image'] = $imageName;
        }
    }

    public function getImageUrl()
    {
        return asset('storage/blogs/'. $this->attributes['image']);
    }
}
