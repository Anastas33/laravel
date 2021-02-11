<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        return [
            'category_id' => ['required'],
            'title' => ['required', 'string', 'min:3'],
            'description' => ['sometimes'],
            'image' => ['sometimes', 'image:jpg,jpeg,png'],
            'source_id' => ['required']
        ];
    }
}
