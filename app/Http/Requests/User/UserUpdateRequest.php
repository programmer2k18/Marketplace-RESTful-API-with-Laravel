<?php

namespace App\Http\Requests\User;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name'=>'required|string|max:30|min:3',
            'email'=>'required|email|max:40|unique:users,email,'.$this->route('user')->id,
            'password'=>'required|confirmed:password_confirmation|min:8',
            'admin'=>'sometimes|in:'.User::ADMIN_USER.','.User::REGULAR_USER.''
        ];
    }

}
