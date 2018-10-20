<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// storeとupdateで2つ作成していたので、内容同じだが真似て作成
    // 『namespace』より前の行には、記述が許可されている内容が決まったもののみ。

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|min:3',
            'body' => 'required'
        ];
    }

    public function messages()
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
