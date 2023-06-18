<?php

namespace App\Http\Requests;

use App\Enums\DeliveryTypeEnum;
use App\Enums\OrderStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_address_id' => ['required', 'exists:user_addresses,id'],
            'delivery_type' =>  ['required', 'string', Rule::in(array_column(DeliveryTypeEnum::cases(), 'value'))],
            'stores' => ['required', 'array'],
            'stores.*.store_id' => ['required', 'numeric', 'exists:stores,id'],
            'stores.*.quantity' => ['required', 'numeric'],
        ];
    }
}
