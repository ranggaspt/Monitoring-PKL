<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipantRequest extends FormRequest
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
        $id = $this->get('id');
        if ($this->method() == 'PUT') {
            $email = 'required|unique:participants,email,' . $id;
            $phone = 'required|unique:participants,phone,' . $id;
            $photo = 'image|mimes:jpeg,png,jpg,gif|max:4096';
        } else {
            $email = 'required|unique:participants,email,NULL';
            $phone = 'required|unique:participants,phone,NULL';
            $photo = 'required|image|mimes:jpeg,png,jpg,gif|max:4096';
        }
        return [
            'name' => 'required|string|max:255',
            'gender' => 'required',
            'address' => 'required|string',
            'education' => 'required',
            'date_of_birth' => 'required',
            'email' => $email,
            'phone' => $phone,
            'photo' => $photo
        ];
    }
}
