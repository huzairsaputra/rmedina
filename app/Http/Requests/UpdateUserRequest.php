<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $id = $this->route('user');
        $rules = [
            'email'    => 'required|email|unique:users,email,'.$id,
            'password'              => ['confirmed','min:8','regex:/[a-z]/','regex:/[A-Z]/', 'regex:/[0-9]/'],
        ];

        return array_merge(User::$rules, $rules);
    }
}
