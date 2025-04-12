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

    public function productVideos()
    {
        return $this->hasMany(ProductVideo::class, 'product_id', 'id');
    }

    public function productSectors()
    {
        return $this->hasMany(ProductSector::class, 'product_id', 'id');
    }  

    public function setImageAttribute($file)
    {
        if ($file) {
            if (!empty($this->attributes['image']) && Storage::disk('public')->exists('products/' . $this->attributes['image'])) {
                Storage::disk('public')->delete('products/' . $this->attributes['image']);
            }
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
