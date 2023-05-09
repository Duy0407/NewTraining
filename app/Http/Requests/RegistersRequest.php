<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistersRequest extends FormRequest
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
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được bỏ trống name',
            'name.unique' => 'User name đã tồn tại',

            'email.required' => 'Không được bỏ trống email',
            'email.unique' => 'Email đã tồn tại',

            'password.required' => 'Không được bỏ trống password',
        ];
    }
}
