<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SectorDetail extends Model
{
    protected $guarded = [];

    public function setImageAttribute($file)
    {
        if ($file) {
            $imageName = time() . '_' . $file->getClientOriginalName();
            $path = 'sectorImages';
            $file->storeAs($path, $imageName, 'public');

            $this->attributes['image'] = $imageName;
        }
    }

    public function getImageUrl()
    {
        return asset('storage/sectorImages/'. $this->attributes['image']);
    }
}
