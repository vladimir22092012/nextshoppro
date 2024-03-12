<?php

namespace App\Http\Controllers;

use App\Repositories\CartRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{

    public $repository;
    public function __construct()
    {
        $this->repository = new CartRepository();
    }

    public function addToCard(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json(['cart' => $this->repository->addToCart($request)]);
    }

    public function deleteProduct(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json(['cart' => $this->repository->deleteProduct($request)]);
    }

    public function checkout()
    {
        return Inertia::render('Site/Checkout');
    }

}
