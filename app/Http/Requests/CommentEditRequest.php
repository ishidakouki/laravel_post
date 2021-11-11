<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentEditRequest extends FormRequest
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
            'comments' => 'required|max:40'
        ];
    }

    public function messages()
    {
        return [
            'comments.required' => 'コメントを入力してください',
            'comments.max' => 'コメントは40文字以内で入力してください',
        ];
    }
}
