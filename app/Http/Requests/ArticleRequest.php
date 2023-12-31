<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            [
                'title' => [
                    'required',
                    'unique:articles',
                    'max:255'
                ],
                'body' => ['required'],
            ]
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
            'title.unique' => '他に重複したタイトル名が存在しています。',
            'title.required' => 'タイトルは必須項目です。',
            'body.required' => '内容は必須項目です。'
        ];
    }
}
