<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectFormRequest extends FormRequest
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
