<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|string|min:8|max:255|confirmed',
            'password_confirmation' => 'required|string|min:8|max:255',
        ];
    }

    public function messages()
    {
        return [
            'required' => '入力必須です',
            'max'      => ':max文字以内で入力してください',
            'min'      => ':min文字以上で入力してください',
            'email'    => 'メール形式で入力してください',
            'unique'   => '登録できない情報です',
            'confirmed' => 'パスワードが一致しません',
        ];
    }
}
