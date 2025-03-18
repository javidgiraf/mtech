<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    protected $guarded = [];

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function projectImages()
    {
        return $this->hasMany(ProjectImage::class, 'project_id', 'id');
    }

    public function setImageAttribute($file)
    {
        if ($file) {
            if (!empty($this->attributes['image']) && Storage::disk('public')->exists('projects/' . $this->attributes['image'])) {
                Storage::disk('public')->delete('projects/' . $this->attributes['image']);
            }
            $imageName = time() . '_' . $file->getClientOriginalName();
            $path = 'projects';
            $file->storeAs($path, $imageName, 'public');

            $this->attributes['image'] = $imageName;
        }
    }

    public function getImageUrl()
    {
        return ($this->attributes['image']) ? 
            asset('storage/projects/'. $this->attributes['image'])
            : asset('assets/img/empty-image.jpg');
    }
}
