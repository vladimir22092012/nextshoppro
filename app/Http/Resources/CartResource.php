<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'session' => $this->session_id,
            'product_id' => $this->product_id,
            'count' => $this->count,
            'product_price' => $this->product_price,
            'total' => $this->total,
            'created_at' => $this->created_at,
            'product' => ProductResource::make($this->product)->resolve()
        ];
    }
}
