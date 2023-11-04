<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HomeFormRequest extends FormRequest
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
                'heading' => 'required|string|max:200',
                'subheading' => 'required|string|max:200',
                'video_url' => 'required|string',
                'served_number' => 'required|number',
                'served_description' => 'required|string|max:200',
                'image' => 'required|mimes:jpeg,jpg,png,avif,webp',
                'meta_title' => 'nullable|string',
                'meta_description' => 'nullable|string',
            ];
        }
        else
        {
            $rules = [
                'heading' => 'string|max:200',
                'subheading' => 'string|max:200',
                'video_url' => 'string',
                'served_number' => 'number',
                'served_description' => 'string|max:200',
                'image' => 'mimes:jpeg,jpg,png,avif,webp',
                'meta_title' => 'nullable|string',
                'meta_description' => 'nullable|string',
            ];
        };

        return $rules;
    }
}
