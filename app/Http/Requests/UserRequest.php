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
        $array = [
            'name' => 'required|string',
            'firstname' => 'required|string',
            'birthdaydate' => 'required|date',
            'phone' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
        ];

        if ($this->method()=='POST') {
            $array['password'] = 'required|min:5|max:255';
        }
        if ($this->method()=='PUT') {
            $array['password'] = 'nullable|min:5|max:255';
        }

        return $array;
    }
}
