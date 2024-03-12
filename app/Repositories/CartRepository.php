<?php

namespace App\Repositories;


use App\Helpers\CartHelper;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartRepository {


    public function addToCart(Request $request)
    {
        $data = $request->toArray();
        $product = Product::findOrFail($data['product_id']);

        $count = $data['count'] ?? 1;

        $cart = Cart::query()
            ->where('session_id', '=', $request->session()->getId())
            ->where('product_id', '=', $product->id)->first();

        if ($cart) {
            $cart->update(['count' => $cart->count += 1]);
        } else {
            Cart::create([
                'session_id' => $request->session()->getId(),
                'product_id' => $product->id,
                'count' => $count,
                'product_price' => $product->actualPrice,
                'total' => $product->actualPrice * $count
            ]);
        }

        return CartHelper::getItems($request);
    }

    public function deleteProduct(Request $request)
    {
        $data = $request->toArray();

        $cart = Cart::query()
            ->where('session_id', '=', $request->session()->getId())
            ->where('product_id', '=', $data['product_id'])->first();

        if ($cart) {
            $cart->delete();
        }

        return CartHelper::getItems($request);
    }

}
