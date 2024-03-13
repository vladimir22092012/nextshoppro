<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Repositories\OrderRepository;
use http\Env\Request;
use Inertia\Inertia;

class OrderController extends Controller
{

    public $repository;
    public function __construct()
    {
        $this->repository = new OrderRepository();
    }

    public function create(CreateOrderRequest $request)
    {
        try {
            $data = $request->validated();
            $this->repository->create($data, $request);
            return response()->json(['success' => 1]);
        } catch (\Exception $exception) {
            return response()->json(['er' => $exception->getMessage()]);
        }
    }

}
