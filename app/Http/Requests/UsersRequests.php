<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Users extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255',
            'password'=>'sometimes|nullable|string|min:8|confirmed',
            'password_confirmation'=>'sometimes|nullable|string|min:8'
        ];
    }
}
