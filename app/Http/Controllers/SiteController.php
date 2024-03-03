<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class SiteController extends Controller
{

    public $repository;
    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    /**
     * @return Response
     */
    public function index(): Response
    {
        $products = $this->repository->main_page_products();
        //dd($products);
        $feature = $products[0];
        unset($products[0]);
        return Inertia::render('Site/Index', [
            'feature' => $feature,
            'main_products' => $products,
        ]);
    }

    /**
     * @param int $cat_id
     * @return Response
     */
    public function catalog(int $cat_id = 0): Response
    {
        return Inertia::render('Site/Catalog', [
            'cat_id' => $cat_id,
        ]);
    }

    /**
     * @param int $cat_id
     * @return Response
     */
    public function search(string $q = ''): Response
    {
        return Inertia::render('Site/Catalog', [
            'q' => $q,
        ]);
    }

    /**
     * @return Response
     */
    public function view(Product $product): Response
    {
        return Inertia::render('Site/Product', [
            'product' => $product,
            'images' => $product->normalizeImages,
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function filter(Request $request): JsonResponse
    {
        return response()->json(['data' => $this->repository->get($request)]);
    }

}
