<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    protected $guarded = [];

    public function setImageAttribute($file)
    {
        if ($file instanceof UploadedFile) {
            if (!empty($this->attributes['image']) && Storage::disk('public')->exists('productImages/' . $this->attributes['image'])) {
                Storage::disk('public')->delete('productImages/' . $this->attributes['image']);
            }
    
            $imageName = time() . '_' . $file->getClientOriginalName();
            $path = 'productImages';
            $file->storeAs($path, $imageName, 'public');
    

            $this->attributes['image'] = $imageName;
        }
    }

    public function getProductImageUrl()
    {
        return asset('storage/productImages/'. $this->attributes['image']);
    }
}
