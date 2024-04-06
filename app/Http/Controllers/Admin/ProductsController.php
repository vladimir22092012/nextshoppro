<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductsController extends Controller
{

    private ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Products/Index', [
            'columns' => $this->repository->columns(),
            'limits' => $this->repository->limits(),
        ]);
    }

    public function archive(): \Inertia\Response
    {
        return Inertia::render('Admin/Products/Archive', [
            'columns' => $this->repository->columns(),
            'limits' => $this->repository->limits(),
        ]);
    }

    public function form(): \Inertia\Response
    {
        return Inertia::render('Admin/Products/Form', [
        ]);
    }

    public function view(Product $product):\Inertia\Response
    {
        return Inertia::render('Admin/Products/View', [
            'categories' => Category::getMap(),
            'product' => ProductResource::make($product)->resolve(),
            'discountAmount' => $product->discount?->amount ?? 0,
        ]);
    }

    public function get(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->deleted = true;
        return response()->json(['data' => $this->repository->get($request)]);
    }

    public function archiveProducts(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->deleted = true;
        return response()->json(['data' => $this->repository->get($request, true)]);
    }

    public function delete(Product $product): \Illuminate\Http\JsonResponse
    {
        try {
            $this->repository->delete($product);
            return response()->json(['status' => 'ok']);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'error']);
        }
    }

    public function save(Product $product, Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->repository->update($request->toArray(), $product);
            return response()->json([
                'status' => 'ok',
                'product' => ProductResource::make($product->refresh())->resolve()
            ]);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'text' => $exception->getMessage()]);
        }
    }
}
