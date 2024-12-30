<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateProductRequest extends FormRequest
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
     * @todo 画像のファイルサイズ上限を緩和することを検討
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1500',
            'price' => 'required|integer|min:0|max:99999999999',
            'image' => 'nullable|file|image|mimes:jpeg,jpg,png,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'required' => '入力必須です',
            'integer'  => '数値で入力してください',
            'max'      => ':max文字以内で入力してください',
            'min'      => ':min以上の数値で入力してください',
            'mime'     => 'jpeg, jpg, png, gif形式の画像ファイルを選択してください',
            'image'    => '画像ファイルを選択してください',
            'file'     => 'ファイルを選択してください',
        ];
    }
}
