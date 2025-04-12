<?php

namespace App\Services;

use App\Models\Catalog;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSector;
use App\Models\ProductVideo;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService
{
    public function getAllProducts(int $perPage)
    {
        return Product::with('productSectors.sector')->latest()
            ->paginate($perPage);
    }

    public function createProduct(array $data)
    {
        DB::beginTransaction();

        try {
            $product = new Product();
            $product->title = $data['title'];
            $product->slug = Str::slug($data['title'], '-');
            $product->sub_title = $data['sub_title'] ?? null;
            $product->content = $data['content'];
            $product->description = $data['description'] ?? null;
            if (isset($data['image'])) {
                $product->setImageAttribute($data['image']);
            }
            $product->save();

            if (!empty($data['sector_ids']) && is_array($data['sector_ids'])) {
                foreach ($data['sector_ids'] as $sector) {
                    ProductSector::create([
                        'product_id' => $product->id,
                        'sector_id' => $sector
                    ]);
                }
            }


            // Save Application Images
            if (!empty($data['applicationImage']) && is_array($data['applicationImage'])) {
                foreach ($data['applicationImage'] as $key => $image) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'title' => $data['applicationTitle'][$key],
                        'image' => $image,
                    ]);
                }
            }

            // Save Application Videos
            if (!empty($data['applicationVideoTitle']) && is_array($data['applicationVideoTitle'])) {
                foreach ($data['applicationVideoTitle'] as $key => $title) {
                    ProductVideo::create([
                        'product_id' => $product->id,
                        'title' => $title,
                        'url' => $data['applicationVideoUrl'][$key],
                    ]);
                }
            }

            DB::commit();

            return $product;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Product creation failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            throw new \Exception('Something went wrong while creating the product. Please try again.');
        }
    }



    public function editProduct(int $id)
    {
        return Product::with('productImages', 'productVideos', 'productSectors')->findOrFail($id);
    }

    public function updateProduct(int $id, array $data)
    {
        DB::beginTransaction();

        try {
            
            $product = Product::with('productImages')->findOrFail($id);

            $product->title = $data['title'];
            $product->slug = Str::slug($data['title'], separator: '-');
            $product->sub_title = $data['sub_title'] ?? null;
            $product->content = $data['content'];
            $product->description = $data['description'] ?? null;
            if (isset($data['image'])) {
                $product->setImageAttribute($data['image']);
            }
            $product->save();

            ProductSector::where('product_id', $product->id)->delete();

            $sectorIds = $data['sector_ids'];

            foreach ($sectorIds as $sector) {
                ProductSector::create([
                    'product_id' => $product->id,
                    'sector_id' => $sector
                ]);
            }

            ProductImage::whereNotIn('id', $data['imageId'])->delete();
            if (isset($data['applicationTitle'])) {
                foreach ($data['applicationTitle'] as $key => $title) {
                    $image = $data['applicationImage'][$key] ?? null;
                    $imageId = $data['imageId'][$key] ?? null;

                    if ($imageId) {
                        $existingImage = ProductImage::find($imageId); 
            
                        if ($existingImage) {
                            $existingImage->update([
                                'title' => $title ?? $existingImage->title,
                                'image' => $image ?? $existingImage->image
                            ]);
                        }
                    } else {
                        
                        ProductImage::create([
                            'product_id' => $product->id,
                            'title' => $title,
                            'image' => $image
                        ]);
                    }
                }
            }


            if (isset($data['applicationVideoTitle'])) {
                ProductVideo::where('product_id', $product->id)->delete();

                foreach ($data['applicationVideoTitle'] as $key => $value) {
                    ProductVideo::create([
                        'product_id' => $product->id,
                        'title' => $value,
                        'url' => $data['applicationVideoUrl'][$key],
                    ]);
                }
            }

            DB::commit();

            return $product;
        } catch (\Exception $e) {
            DB::rollBack();
            
            Log::error('Product update failed: ' . $e->getMessage());
            throw new \Exception('Failed to update product.');
        }
    }


    public function deleteProduct(int $id)
    {
        ProductImage::where('product_id', $id)->delete();
        Catalog::where('product_id', $id)->delete();
        Product::findOrFail($id)->delete();

        return true;
    }
}
