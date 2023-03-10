<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            $photo = 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096';
        } else {
            $photo = 'required|image|mimes:jpeg,png,jpg,gif|max:4096';
        }
        return [
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'max_participant' => 'required|numeric',
            'min_education' => 'required',
            'start_at' => 'required',
            'finish_at' => 'required|greater_than_field:start_at',
            'photo' => $photo
        ];
    }
}
