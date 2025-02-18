<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProjectImage extends Model
{
    protected $guarded = [];

    public function setImageAttribute($file)
    {
        if ($file) {
            $imageName = time() . '_' . $file->getClientOriginalName();
            $path = 'projects';
            $file->storeAs($path, $imageName, 'public');
            $this->attributes['image'] = $imageName;
        }
    }

    public function getProjectImageUrl()
    {
        return asset('storage/projects/'. $this->attributes['image']);
    }
}
