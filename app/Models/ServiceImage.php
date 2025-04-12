<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ServiceImage extends Model
{
    protected $guarded = [];

    public function setImageAttribute($file)
    {
        if ($file) {
            if (!empty($this->attributes['image']) && Storage::disk('public')->exists('serviceImages/' . $this->attributes['image'])) {
                Storage::disk('public')->delete('serviceImages/' . $this->attributes['image']);
            }
            $imageName = time() . '_' . $file->getClientOriginalName();
            $path = 'serviceImages';
            $file->storeAs($path, $imageName, 'public');
            $this->attributes['image'] = $imageName;
        }
    }

    public function getServiceImageUrl()
    {
        return asset('storage/serviceImages/'. $this->attributes['image']);
    }
}
