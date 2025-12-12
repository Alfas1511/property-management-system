<?php

namespace App\Http\Requests\Admin\UserManagement;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'form_number' => 'required|integer|in:1,2,3',
            'user_id' => 'required|exists:users,id',

            'name' => 'required_if:form_number,1',
            'email' => 'required_if:form_number,1|email',
            'password' => 'required_if:form_number,1',
            'roles' => 'required_if:form_number,1',

            'blood_group' => 'required_if:form_number,2',
            'date_of_birth' => 'required_if:form_number,2',
            'gender' => 'required_if:form_number,2',
            'primary_mobile_number' => 'required_if:form_number,2',
            'alternate_mobile_number' => 'nullable'
        ];
    }
}
