<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class DonationFormRequest extends FormRequest
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
                'name' => 'required|string|max:200',
                'email' => 'required|string|max:200',
                'phone_no' => 'required|numeric|digits:10',
                'amount' => 'required|numeric'
            ];
            return $rules;
    }
}
