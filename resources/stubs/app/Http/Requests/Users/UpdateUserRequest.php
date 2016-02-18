<?php
namespace App\Http\Requests\Users;

use App\Http\Requests\Request;

class UpdateUserRequest extends Request
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
            'name'                  => 'required|max:255',
            'email'                 => 'required|email|max:255|unique:users,id,' . $this->route('user')->id,
            'password'              => 'sometimes|min:6',
            'password_confirmation' => 'sometimes|confirmed|min:6',
            'avatar'                => 'sometimes|image',
        ];
    }

}
