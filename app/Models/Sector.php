<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Sector extends Model
{
    protected $guarded = [];

    public function sectorDetails()
    {
        return $this->hasMany(SectorDetail::class, 'sector_id', 'id');
    }

    public function setImageAttribute($file)
    {
        if ($file) {
            if (!empty($this->attributes['image']) && Storage::disk('public')->exists('sectors/' . $this->attributes['image'])) {
                Storage::disk('public')->delete('sectors/' . $this->attributes['image']);
            }
            $imageName = time() . '_' . $file->getClientOriginalName();
            $path = 'sectors';
            $file->storeAs($path, $imageName, 'public');

            $this->attributes['image'] = $imageName;
        }
    }

    public function getImageUrl()
    {
        return asset('storage/sectors/'. $this->attributes['image']);
    }
}
