<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = $this->get('user_id');
        if ($this->method() == 'PUT') {
            $username = 'required|unique:users,username,' . $id;
            $password = 'nullable|string|min:8|confirmed';
        } else {
            $username = 'required|unique:users,username,NULL';
            $password = 'required|string|min:8|confirmed';
        }
        return [
            'username' => $username,
            'password' => $password,
        ];
    }
}
