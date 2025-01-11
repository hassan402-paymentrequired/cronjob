<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class ProviderOfferRequest extends FormRequest
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
            'price' => ['required', 'string'],
            'service' => ['required', 'exists:services,id', 'string', 'max:100'],
            'description' => ['required', 'string'],
            'name' => ['required', 'string', 'max:225'],
            'image' => ['required', 'file', 'mimes:png,jpg,jpeg,webp'],
        ];
    }
}
