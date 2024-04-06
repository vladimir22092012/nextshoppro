<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrdersController extends Controller
{

    private OrderRepository $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Orders/Index', [
            'columns' => $this->repository->columns(),
            'limits' => $this->repository->limits(),
        ]);
    }

    public function form(): \Inertia\Response
    {
        return Inertia::render('Admin/Orders/Form', [
        ]);
    }

    public function view(Order $order):\Inertia\Response
    {
        return Inertia::render('Admin/Orders/View', [
            'order' => OrderResource::make($order)->resolve(),
            'products' => $order->products
        ]);
    }

    public function get(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->deleted = true;
        return response()->json(['data' => $this->repository->get($request)]);
    }

    public function delete(Order $order): \Illuminate\Http\JsonResponse
    {
        try {
            $this->repository->delete($order);
            return response()->json(['status' => 'ok']);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'error']);
        }
    }

    public function save(Order $order, Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->repository->update($request->toArray(), $order);
            return response()->json([
                'status' => 'ok',
                'product' => OrderResource::make($order->refresh())->resolve()
            ]);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'text' => $exception->getMessage()]);
        }
    }

    public function removeProduct(Order $order, Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->repository->removeProduct($request->toArray(), $order);
            return response()->json([
                'status' => 'ok',
                'product' => OrderResource::make($order->refresh())->resolve()
            ]);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'text' => $exception->getMessage()]);
        }
    }
}
