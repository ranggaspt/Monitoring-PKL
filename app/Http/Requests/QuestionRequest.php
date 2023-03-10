<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
        // $id = $this->get('id');
        // if ($this->method() == 'PUT') {
        //     $email = 'required|unique:instances,email,' . $id;
        //     $phone = 'required|unique:instances,phone,' . $id;
        //     $photo = 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096';
        // } else {
        //     $email = 'required|unique:instances,email,NULL';
        //     $phone = 'required|unique:instances,phone,NULL';
        //     $photo = 'required|image|mimes:jpeg,png,jpg,gif|max:4096';
        // }
        return [
            'question' => 'required|string',
            'option1' => 'required|string|max:255',
            'option2' => 'required|string|max:255',
            'option3' => 'required|string|max:255',
            'option4' => 'required|string|max:255',
            'option5' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
        ];
    }
}
