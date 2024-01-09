<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ArticleRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        return [

            'title' => [
                'required',
                'unique:articles,title,' . $request->id . ',id',
                'max:255',
            ],
            'body' => ['required'],

        ];
    }
    public function attributes(): array
    {
        return [
            'title' => 'タイトル',
            'body' => '内容',
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
            'title.max' => 'タイトルは255文字以内で入力してください。',
            'body.required' => '内容は必須項目です。'
        ];
    }
}
