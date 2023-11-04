<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DescriptionFormRequest extends FormRequest
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
                'description' => 'required|string',
                'image' => 'required|mimes:jpeg,jpg,png',
            ];
        }
        else
        {
            $rules = [
                'description' => 'string',
                'image' => 'mimes:jpeg,jpg,png',
            ];
        };

        return $rules;

    }
}
