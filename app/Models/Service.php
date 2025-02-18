<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    protected $guarded = [];

    public function setImageAttribute($file)
    {
        if ($file) {
            if (!empty($this->attributes['image']) && Storage::disk('public')->exists('services/' . $this->attributes['image'])) {
                Storage::disk('public')->delete('services/' . $this->attributes['image']);
            }
            $imageName = time() . '_' . $file->getClientOriginalName();
            $path = 'services';
            $file->storeAs($path, $imageName, 'public');

            $this->attributes['image'] = $imageName;
        }
    }

    public function getImageUrl()
    {
        return asset('storage/services/'. $this->attributes['image']);
    }
}
