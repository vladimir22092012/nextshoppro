<?php
namespace App\Helpers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartHelper {

    public static function getItems(Request $request): array
    {
        $cartItems = CartResource::collection(
            Cart::query()
                ->where('session_id', '=', $request->session()->getId())
                ->get()
        )->resolve();

        $totalSum = 0;
        $totalCount = 0;
        foreach ($cartItems as $item) {
            $totalCount += $item['count'];
            $totalSum += $item['total'];
        }

        return [
            'items' => $cartItems,
            'totalSum' => $totalSum,
            'totalCount' => $totalCount,
        ];
    }

}
