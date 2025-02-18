<?php

namespace App\Services;

use App\Models\Catalog;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService
{
    public function getAllProducts(int $perPage)
    {
        return Product::latest()
            ->paginate($perPage);
    }

    public function createProduct(array $data)
    {
        DB::beginTransaction();

        try {
            $product = Product::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title'], '-'),
                'sub_title' => $data['sub_title'] ?? null,
                'image' => $data['image'],
                'description' => $data['description'],
            ]);

            if (isset($data['productImages'])) {
                foreach ($data['productImages'] as $image) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $image,
                    ]);
                }
            }

            if (isset($data['pdfFile']) && isset($data['catalogTitle'])) {
                foreach ($data['pdfFile'] as $index => $pdf) {
                    Catalog::create([
                        'product_id' => $product->id,
                        'title' => $data['catalogTitle'][$index],
                        'pdf_file' => $pdf,
                    ]);
                }
            }
            DB::commit();

            return $product;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Product creation failed: ' . $e->getMessage());

            return response()->json(['error' => 'Product creation failed!'], 500);
        }
    }

    public function editProduct(int $id)
    {
        return Product::with('productImages', 'catalogs')->findOrFail($id);
    }

    public function updateProduct(int $id, array $data)
    {
        DB::beginTransaction();

        try {
            $product = Product::with('productImages')->findOrFail($id);
            $product->title = $data['title'];
            $product->sub_title = $data['sub_title'];
            $product->slug = Str::slug($data['title'], '-');
            if (request()->hasFile('image')) {
                $product->setImageAttribute($data['image']);
            }
            $product->description = $data['description'];
            $product->update();

            $existingImages = $product->productImages->pluck('image')->toArray();
            foreach ($existingImages as $oldImage) {
                if (!in_array($oldImage, request('oldImages'))) {
                    
                    Storage::disk('public')->delete('productImages/' . $oldImage);
                    ProductImage::where('product_id', $product->id)->where('image', $oldImage)->delete();
                }
            }

            if (!empty($data['productImages']) && is_array($data['productImages'])) {
                Log::info('Files received:', [$data['productImages']]);

                foreach ($data['productImages'] as $image) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image'      => $image,
                    ]);
                }
            }


            if (isset($data['pdfFile']) && isset($data['catalogTitle'])) {
                Catalog::where('product_id', $product->id)->delete();
                foreach ($data['pdfFile'] as $index => $pdf) {
                    Catalog::create([
                        'product_id' => $product->id,
                        'title' => $data['catalogTitle'][$index],
                        'pdf_file' => $pdf,
                    ]);
                }
            }

            DB::commit();

            return $product;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Product update failed: ' . $e->getMessage());

            return response()->json(['error' => 'Product update failed!'], 500);
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
