<?php

namespace App\Services;

use App\Models\Product;

class ProductService 
{
    public function getAllProducts($perPage)
    {
        return Product::latest()
            ->paginate($perPage);
    }

    public function createProduct(array $data)
    {
        return Product::create($data);
    }

    public function editProduct(Product $product)
    {
        return $product;
    }

    public function updateProduct(Product $product, array $data)
    {
        return $product->update($data);
    }

    public function deleteProduct(Product $product)
    {
        return $product->delete();
    }
}