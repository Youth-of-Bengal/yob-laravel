<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeamFormRequest extends FormRequest
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
                'name' => 'required|string',
                'image' => 'mimes:jpeg,jpg,png',
                'profession' => 'required',
                'department' => 'required',
                'social_link' => 'string',
                'ngo_role' => 'string',
            ];
        }
        else
        {
            $rules = [
                'image' => 'mimes:jpeg,jpg,png',
                'name' => 'required|string',
                'profession' => 'required',
                'department' => 'required',
                'social_link' => 'string',
                'ngo_role' => 'string',
            ];
        };

        return $rules;
    }
}
