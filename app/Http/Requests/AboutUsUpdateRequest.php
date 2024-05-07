<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsUpdateRequest extends FormRequest
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
            'description_ar' => 'string',
            'description_en' => 'string',
            'car_per_month' => 'integer',
            'num_ksa_branches' => 'string',
            'header_photo' => 'nullable|image|mimes:jpeg,png,gif|max:10000', 
            'description_photo' => 'nullable|image|mimes:jpeg,png,gif|max:10000', 
            ];
    }
}
