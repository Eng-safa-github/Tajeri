<?php

namespace App\Http\Requests;

use App\Enums\OrderStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['required', 'string',],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ];
    }

}
