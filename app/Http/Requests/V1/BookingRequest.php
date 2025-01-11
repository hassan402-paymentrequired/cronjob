<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'provider_offers_id' => ['required', 'exists:users,id'],
            'time' => ['required'],
            'date' => ['required', 'date'],
            'address_area' => ['required', 'string', 'max:225'],
            'address' => ['required', 'string', 'max:225'],
            'longitude' => ['nullable', 'max:100'],
            'latitude' => ['nullable', 'max:100']
        ];
    }
}
