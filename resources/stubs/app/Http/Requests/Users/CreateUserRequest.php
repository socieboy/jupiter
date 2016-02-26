<?php
namespace App\Http\Requests\Users;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
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
            'name'                  => 'required',
            'email'                 => 'required|email|max:255|unique:users',
            'generate_password'     => 'sometimes',
            'password'              => 'required_unless:generate_password,true|min:6',
            'password_confirmation' => 'required_unless:generate_password,true|confirmed|min:6',
            'avatar'                => 'sometimes|image',
        ];
    }

    public function messages()
    {
        return [
            'password.required_unless' => 'The password field is required.',
            'password_confirmation.required_unless' => 'The confirm password field is required.'
        ];
    }
}
