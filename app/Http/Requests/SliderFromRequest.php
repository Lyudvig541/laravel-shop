<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderFromRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()

{
       return [
            'title' => [
                'required',
                'string',
                'max:50'
            ],
            'description' => [
                'required',
                'string',
                'max:800'
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp'
            ],
            'status' => [
                'nullable',
            ],
       ];
    }
}