<?php
namespace Socieboy\Jupiter\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignRuleToUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'roles[]' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'roles[].required' => 'The user has to be assigned to at least one role.'
        ];
    }

}