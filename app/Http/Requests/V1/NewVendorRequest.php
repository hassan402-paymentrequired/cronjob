<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewVendorRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:120'],
            'official_email' => ['required', 'string', 'email', 'unique:vendors,official_email'],
            'official_phone_number' => ['required', 'string'],
            'description' => ['required', 'string'],
            'banner' => ['file', 'mimes:png,jpg'],
            'vendor_type' => ['required', 'string'],
            'address' => ['required', 'string']
        ];
    }
}
