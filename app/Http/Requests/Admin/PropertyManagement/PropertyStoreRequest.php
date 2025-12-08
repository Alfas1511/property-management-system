<?php

namespace App\Http\Requests\Admin\PropertyManagement;

use Illuminate\Foundation\Http\FormRequest;

class PropertyStoreRequest extends FormRequest
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
            'property_title' => 'required',
            'property_type' => 'required',
            'property_description' => 'required',
            'property_area' => 'required',
            'property_address' => 'required',
            'option_type' => 'required',
            'property_rate' => 'required',
            'property_images' => 'nullable',
        ];
    }
}
