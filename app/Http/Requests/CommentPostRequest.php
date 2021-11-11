<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentPostRequest extends FormRequest
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
            'post_id' => 'required|exists:posts,id',
            'comments.*' => 'required|max:40'
        ];
    }

    public function messages()
    {
        return [
            'post_id.required' => 'post_idがありません',
            'post_id.exists' => '存在しない投稿です',
            'comments.*.required' => 'コメントを入力してください',
            'comments.*.max' => 'コメントは40文字以内で入力してください',
        ];
    }
}
