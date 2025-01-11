<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class WorkingHourRequest extends FormRequest
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
            'week_days' => ['required', 'array'],
            'week_days.*.day' => ['nullable'],
            'week_days.*.open_time' => ['nullable'],
            'week_days.*.close_time' => ['nullable'],
            'week_days.*.is_available' => ['required', 'boolean'],
            'week_days.*.provider_offer_id' => ['required', 'exists:provider_offers,id']
        ];
    }
}
