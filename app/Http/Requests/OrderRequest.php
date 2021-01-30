<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'user_name' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
            'email' => ['required'],
            'info' => ['required', 'alpha_dash'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Необходимо обязательно заполнить поле :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'user_name' => 'Имя пользователя',
            'phone' => 'Телефон',
            'info' => 'Информация',
        ];
    }
}
