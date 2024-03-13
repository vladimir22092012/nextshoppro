<?php

namespace App\Http\Resources;

use App\Helpers\DateHelper;
use App\Helpers\Html;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'firstname' => $this->firstname,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'company' => $this->company,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'comment' => $this->comment,
            'delivery_type' => $this->delivery_type,
            'payment_type' => $this->payment_type,
            'status' => $this->status,
            'manager_comment' => $this->manager_comment,
            'htmlStatus' => $this->htmlStatus,
        ];
    }
}
