<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'description' => 'required|string',
            'price' => 'required',
            'genre' => 'required',
            'substance' => 'required',
            'color' => 'required',
            'section' => 'required',
            'quantity' => 'required',
        ];

        if ($this->method()=='POST') {
            $array['picture'] = 'required|max:500|mimes:jpeg,png,jpg';
        }
        if ($this->method()=='PUT') {
            $array['picture'] = 'nullable|max:500|mimes:jpeg,png,jpg';
        }

        return $array;
    }
}
