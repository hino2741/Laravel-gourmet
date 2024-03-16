<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminInformationRequest extends FormRequest
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
            'title' => 'required|max:30',
            'content' => 'required|max:1000',
            'release_date' => 'required|date|after_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'required' => '入力必須の項目です。',
            'max' => ':max 文字以内で入力してください。',
            'release_date.after_or_equal' => '今日以降の日付を選択してください。',
        ];
    }
}
