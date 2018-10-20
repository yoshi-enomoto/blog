<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// コントローラーの方で、今まで使用していたRequestクラスの代わりに記述する。
class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
        // authorize メソッド：認証のルールを書く箇所。
        // 「何でも通すよ」場合、『true』とする。
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
        // validationルールを記述する箇所。
    {
        return [
            'title' => 'required|min:3',
            'body' => 'required'
        ];
    }

    public function messages()
        // validationのエラーメッセージをカスタマイズしたい場合に記述。
    {
        return [
            'title.required' => 'please enter title!!!'
        ];
    }

    // 標準で設定したattributesの日本語設定をオーバーライドする方法
    public function attributes()
    {
        return [
            'body' => '本文',
            'title' => 'タイトル',
        ];
    }
}
