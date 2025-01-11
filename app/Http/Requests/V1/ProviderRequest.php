<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
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
            'official_email' => ['required', 'string', 'email', 'unique:providers,official_email', 'unique:users,email'],
            'official_phone_number' => ['required', 'string','regex:/^0(70|80|81|90|91|71)\d{8}$/', 'unique:providers,official_phone_number', 'unique:users,phone_number'],
            'address' => ['required', 'string', 'max:225'],
            'latitude' => ['sometimes', 'string', 'max:100'],
            'longitude' => ['sometimes', 'string', 'max:100'],
            'image' => ['required','file', 'mimes:png,jpg,jpeg,webp'],
        ];
    }
}
