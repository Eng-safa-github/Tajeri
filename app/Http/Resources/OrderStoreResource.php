<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderStoreResource extends JsonResource
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
            'quantity' => $this->quantity,
            'store_id' => $this->store_id,
            'unit' => $this->store->unit,
            'unit_price' => $this->store->unit_price,
            'order_product' => OrderProductResource::make($this->store->product),
        ];
    }
}
