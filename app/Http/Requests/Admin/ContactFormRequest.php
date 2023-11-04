<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
        $rules = [
            'address' => [
                'required',
                'string',
                'max:200',
            ],

            'phone_no' => [
                'required',
                'numeric',
                'digits:10',
            ],

            'email' => [
                'required',
                'string',
            ],

            'website_name' => [
                'required',
                'string',
            ],

            'map_url' => [
                'required',
                'string',
            ],

        ];

        return $rules;

    }
}
