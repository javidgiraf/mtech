<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts(10);

        return view(
            'pages.admin.products.index',
            compact('products')
        );
    }

    public function create()
    {
        return view('pages.admin.products.create');
    }

    public function store(CreateProductRequest $request)
    {
        $this->productService->createProduct(
            request()->all()
        );

        return redirect()->route('admin.products.index')->with('success', 'Product saved successfully');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $product = $this->productService->editProduct($product->id);

        return view(
            'pages.admin.products.edit',
            compact('product')
        );
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->productService->updateProduct($product->id, $request->all());

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $this->productService->deleteProduct($product->id);

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }
}
