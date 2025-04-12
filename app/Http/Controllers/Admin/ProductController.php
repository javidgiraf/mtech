<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Project;
use App\Models\Sector;
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
        $productsCount = Product::count();

        return view(
            'pages.admin.products.index',
            compact('products', 'productsCount')
        );
    }

    public function create()
    {
        $sectors = Sector::all();
        $projects = Project::all();

        return view(
            'pages.admin.products.create',
            compact('sectors', 'projects')
        );
    }

    public function store(CreateProductRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $this->productService->createProduct($validatedData);

            return redirect()->route('admin.products.index')
                ->with('success', 'Product saved successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $product = $this->productService->editProduct($product->id);

        $sectors = Sector::all();

        return view(
            'pages.admin.products.edit',
            compact('product', 'sectors')
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
