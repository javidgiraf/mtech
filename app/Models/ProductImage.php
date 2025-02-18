<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    protected $guarded = [];

    public function setImageAttribute($file)
    {
        if ($file) {
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
