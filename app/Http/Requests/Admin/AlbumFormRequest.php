<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AlbumFormRequest extends FormRequest
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
            'album_name' => 'required|unique:albums',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,jpg,png,webp,avif|max:2000'
        ];

        return $rules;
    }
}
