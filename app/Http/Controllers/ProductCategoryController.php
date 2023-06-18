<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCategoryResource;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use Yajra\DataTables\DataTables;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $model = ProductCategory::query();
        return DataTables::of($model)->toJson();
    }

    public function store(StoreProductCategoryRequest $request)
    {
        $productCategory=ProductCategory::create($request->validated());
        return ProductCategoryResource::make($productCategory);
    }

    public function show(ProductCategory $productCategory)
    {
        return ProductCategoryResource::make($productCategory);
    }

    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $productCategory->update($request->validated());
        return ProductCategoryResource::make($productCategory);

    }

    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return response()->noContent();
    }
}
