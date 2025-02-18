<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $guarded = [];

    
    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function catalogs()
    {
        return $this->hasMany(Catalog::class, 'product_id', 'id');
    }


    public function setImageAttribute($file)
    {
        if ($file) {
            $imageName = time() . '_' . $file->getClientOriginalName();
            $path = 'products';
            $file->storeAs($path, $imageName, 'public');

            $this->attributes['image'] = $imageName;
        }
    }

    public function getImageUrl()
    {
        return asset('storage/products/'. $this->attributes['image']);
    }
}
