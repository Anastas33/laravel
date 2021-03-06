<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'user_name' => ['required', 'string', 'min:5'],
            'comment' => ['required', 'alpha_dash'],
        ];
    }

    public function attributes()
    {
        return [
            'user_name' => 'Имя пользователя',
            'comment' => 'Комментарий',
        ];
    }
}
