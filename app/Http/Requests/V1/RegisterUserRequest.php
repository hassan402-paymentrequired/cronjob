<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100', 'min:5' ],
            'email' => ['required', 'email', 'string', 'unique:users,email'],
            'password' => ['required','string', 'min:8', 'confirmed'],
            'referal_code' => ['nullable', 'string', 'max:30'],
            'phone_number' => ['required', 'string', 'min:11', 'max:11'],
            'profile_picture' => ['nullable', 'file', 'mimes:png,jpg,gif,webp'],
            'date_of_birth' => ['nullable', 'date'],
            'coupon' => ['nullable', 'string', 'max:20']
        ];
    }
}
