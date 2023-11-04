<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class MemberFormRequest extends FormRequest
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
                'name' => 'required|string|max:100',
                'email' => 'required|string',
                'phone_no' => 'required|numeric|digits:10',
                'address' => 'required|string',
                'blood_gr' => 'required|string',
                'image' => 'required|mimes:jpeg,jpg,png',
                'idProof' => 'required|mimes:jpeg,jpg,png,pdf',
                'dob' => 'nullable',
                'height' => 'nullable|number',
                'weight' => 'nullable|number',
                'disease' => 'nullable|string',
            ];
        }
        else
        {
            $rules = [
                'name' => 'required|string|max:100',
                'email' => 'required|string',
                'phone_no' => 'required|numeric|digits:10',
                'address' => 'required|string',
                'blood_gr' => 'required|string',
                'image' => 'mimes:jpeg,jpg,png',
                'idProof' => 'mimes:jpeg,jpg,png,pdf',
                'dob' => 'nullable',
                'height' => 'nullable|number',
                'weight' => 'nullable|number',
                'disease' => 'nullable|string',
            ];
        };

        return $rules;
    }
}
