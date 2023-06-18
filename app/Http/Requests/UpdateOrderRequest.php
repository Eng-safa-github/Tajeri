<?php

namespace App\Http\Requests;

use App\Enums\DeliveryTypeEnum;
use App\Enums\OrderStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
//            'amount' => ['required', 'numeric', 'min:0'],
            'delivery_type' => ['required', 'string', Rule::in(array_column(DeliveryTypeEnum::cases(), 'value'))],
            'status' => ['required', 'string', Rule::in(array_column(OrderStatusEnum::cases(), 'value'))],
//            'user_address_id' => ['required', 'exists:user_addresses,id'],
//            'stores' => ['required', 'array'],
//            'stores.*.store_id' => ['required', 'numeric', 'exists:stores,id'],
//            'stores.*.quantity' => ['required', 'numeric'],
        ];
    }
}
