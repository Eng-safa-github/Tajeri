<?php

namespace App\Http\Resources;

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
            'amount' => $this->amount,
            'delivery_type' => $this->delivery_type,
            'status' => $this->status,
            'user_address_id' => $this->user_address_id,
            'orderStore' => OrderStoreResource::collection($this->orderStore),
            'userAddress' => UserAddressResource::make($this->userAddress),
        ];
    }
}
