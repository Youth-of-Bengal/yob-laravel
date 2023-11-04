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
        $requestType = $this->input('request_type');

        if ($requestType === 'create') {

            $rules = [
                'title' => 'required|unique:news|string|max:200',
                'subtitle' => 'nullable|string|max:200',
                'description' => 'required',
                'tags' => 'required',
                'meta_title' => 'nullable|string|max:200',
                'meta_description' => 'nullable|string',
                'meta_keyword' => 'nullable|string',
                'publish_date' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png',
            ];
        }
        else
        {
            $rules = [
                'image' => 'mimes:jpeg,jpg,png',
                'title' => 'required|string|max:200',
                'subtitle' => 'nullable|string|max:200',
                'description' => 'required',
                'tags' => 'required',
                'meta_title' => 'nullable|string|max:200',
                'meta_description' => 'nullable|string',
                'meta_keyword' => 'nullable|string',
                'publish_date' => 'required',
            ];
        };

        return $rules;

        
        // $rules = [
        //     'title' => [
        //         'required',
        //         'string',
        //         'max:200',
        //     ],

        //     'subtitle' => [
        //         'nullable',
        //         'string',
        //         'max:200',
        //     ],

        //     'description' => [
        //         'required',
        //     ],
        //     'tags' => [
        //         'required'
        //     ],

        //     'meta_title' => [
        //         'nullable',
        //         'string',
        //         'max:200',
        //     ],

        //     'meta_description' => [
        //         'nullable',
        //         'string',
        //     ],

        //     'meta_keyword' => [
        //         'nullable',
        //         'string',
        //     ],

        //     'publish_date' => [
        //         'required',
        //     ],

        // ];

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

        
    }
}
