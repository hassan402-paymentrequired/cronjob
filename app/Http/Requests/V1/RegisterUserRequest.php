<?php

namespace App\Http\Requests\V1;

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
            'first_name' => ['required', 'string', 'max:100', 'min:5' ],
            'last_name' => ['required', 'string', 'max:100', 'min:5' ],
            'email' => ['required', 'email', 'string', 'unique:users,email', 'max:200'],
            'password' => ['required','string', 'min:8', 'confirmed', 'max:100'],
            'referal_code' => ['nullable', 'string', 'max:30'],
            'phone_number' => ['required', 'string', 'min:11', 'max:11', 'regex:/^0(70|80|81|90|91|71)\d{8}$/'],
            'profile_picture' => ['nullable', 'file', 'mimes:png,jpg,gif,webp'],
            'date_of_birth' => ['nullable', 'date'],
            'coupon' => ['nullable', 'string', 'max:20']
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.string' => 'First name must be valid text.',
            'first_name.max' => 'First name may not exceed 100 characters.',
            'first_name.min' => 'First name must be at least 5 characters long.',

            'last_name.required' => 'Last name is required.',
            'last_name.string' => 'Last name must be valid text.',
            'last_name.max' => 'Last name may not exceed 100 characters.',
            'last_name.min' => 'Last name must be at least 5 characters long.',

            'email.required' => 'Email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.string' => 'Email must be valid text.',
            'email.unique' => 'This email address is already in use.',
            'email.max' => 'Email may not exceed 200 characters.',

            'password.required' => 'Password is required.',
            'password.string' => 'Password must be valid text.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.max' => 'Password may not exceed 100 characters.',

            'referal_code.string' => 'Referral code must be valid text.',
            'referal_code.max' => 'Referral code may not exceed 30 characters.',

            'phone_number.required' => 'Phone number is required.',
            'phone_number.string' => 'Phone number must be valid text.',
            'phone_number.min' => 'Phone number must be exactly 11 digits.',
            'phone_number.max' => 'Phone number must be exactly 11 digits.',
            'phone_number.regex' => 'Phone number must start with a valid Nigerian prefix (e.g., 070, 080, etc.).',

            'profile_picture.file' => 'Profile picture must be a file.',
            'profile_picture.mimes' => 'Profile picture must be in PNG, JPG, GIF, or WEBP format.',

            'date_of_birth.date' => 'Please provide a valid date of birth.',

            'coupon.string' => 'Coupon code must be valid text.',
            'coupon.max' => 'Coupon code may not exceed 20 characters.',
        ];
    }
}
