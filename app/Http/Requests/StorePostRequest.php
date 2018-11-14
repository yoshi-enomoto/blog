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
            // Requestに記述することで、validation.phpをオーバーライドすることが可能。
            'title.required' => 'please enter title!!!',
            // 複数設定している場合、上記と下記のようにセクションを分けて記述する
            // 下記をコメントアウトすれば、validation.phpの方が適用される。
            'title.min' => 'タイトルは最小でも3文字ですよ〜',
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

    // 独自のバリデーションルール
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (
                $this->title == "好日"
                ||
                $this->title == "木の下"
                ||
                $this->title == "秋そば"
                ||
                $this->title == "暁"
                ||
                $this->title == "夢道"
                ||
                $this->title == "バビー"
                ||
                $this->title == "時シル"
                ||
                $this->title == "泡愛"
                ||
                $this->title == "メイドリ"
                ||
                $this->title == "湿夏"
            )
            {
                // notificationエリアを作成している場合の通知
                // $validator->errors()->add('field', 'aikoのアルバムのタイトルは正式名称を入力して下さい。');

                // add()によってキーとバリューを加えるイメージ？
                $validator->errors()->add('title', 'aikoのアルバムのタイトルは正式名称を入力して下さい。');
            }
        });
    }
}
