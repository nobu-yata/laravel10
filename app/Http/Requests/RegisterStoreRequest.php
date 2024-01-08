<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStoreRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                'unique:users',
            ],
            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],
            'name' => [
                'required',
            ],
        ];
    }
    /**
     * 定義済みバリデーションルールのエラーメッセージ取得
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Eメールアドレスは必須項目です。',
            'email.email' => 'Eメールアドレスの形式で入力してください。',
            'email.unique' => 'そのEメールアドレスは既に使用されています。',
            'password.required' => 'パスワードは必須項目です。',
            'password.confirmed' => '確認用パスワードが一致しません。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'name.required' => 'お名前は必須項目です。',
        ];
    }
    public function passedValidation(): void
    {
        $this->merge([
            'password' => password_hash($this->input('password'), PASSWORD_BCRYPT),
        ]);
    }
}
