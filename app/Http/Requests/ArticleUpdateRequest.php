<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image'   => 'between:1,5',
            'image.*'  => 'max:1024|image|'
        ];
    }


    public function messages()
    {

        return [
            'image.between' => 'More than 5 images not allowed !',
            'image.0.max' => 'Chosse an image less than 1 mb!',
            'image.0.image' => 'Please select an image!',


        ];
    }
}