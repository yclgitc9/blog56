<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request
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
            'name'     => 'required',
            'email'    => 'email|required|unique:users,email,' . $this->route("users"),
            'password' => 'required_with:password_confirmation|confirmed',
            'role'     => 'required',
            'slug'     => 'required|unique:users,slug,' . $this->route("users"),
        ];
    }
}
