<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsFormRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'max:200',
            ],

            'subtitle' => [
                'nullable',
                'string',
                'max:200',
            ],

            'description' => [
                'required',
            ],
            'categories' => [
                'required'
            ],

            'meta_title' => [
                'nullable',
                'string',
                'max:200',
            ],

            'meta_description' => [
                'nullable',
                'string',
            ],

            'meta_keyword' => [
                'nullable',
                'string',
            ],

            'publish_date' => [
                'required',
            ],

        ];

        // $requestType = $this->input('request_type');

        // if ($requestType === 'create') {
        //     $rules['image'] = [
        //         'required',
        //         'mimes:jpeg,jpg,png',
        //     ];
        // }
        // else
        // {
        //     $rules['image'] = [
        //         'mimes:jpeg,jpg,png',
        //     ];
        // };

        $requestType = $this->input('request_type');

        if ($requestType === 'create') {

            $rules = [
                'name' => 'required|unique:project|string|max:200',
                'image' => 'required|mimes:jpeg,jpg,png',
                'description' => 'required',
                'coordinator' => 'required|string|max:400',
            ];
        }
        else
        {
            $rules = [
                'name' => 'required|string|max:200',
                'image' => 'mimes:jpeg,jpg,png',
                'description' => 'required',
                'coordinator' => 'required|string|max:400',
            ];
        };

        return $rules;
    }
}
