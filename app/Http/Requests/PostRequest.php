<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        'title'=>'required|filled|max:50',
        'text'=>'required|filled|max:250',
        ];
    }
    public function messages()
    {
        return[
        'title.required'=>'タイトルを入力してください',
        'title.max'=>'タイトルは50文字以下で入力してください',
        'text.required'=>'本文を入力してください',
        'text.max'=>'本文は250文字以内で入力してください'
    ];
    }
}
