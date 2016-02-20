<?php

namespace Socieboy\Jupiter\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignPermissionToRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'permissions[]' => 'required',
        ];
    }

    /**
     * Validation messages.
     * @return array
     */
    public function messages()
    {
        return [
            'permissions[].required' => 'The role has to have at least one permission assigned.'
        ];
    }
}