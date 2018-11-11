<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SampleNotification extends Mailable
{
    use Queueable, SerializesModels;

    // メンバ変数宣言（格納用）
    protected $title;
    protected $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct()
    public function __construct($name='テスト', $text='テストです。')
        // メール本文プレビュー用に、仮で引数を渡す。
        // コンストラクタで引数を使用している為
    {
        // 処理発動時に、引数をとってメンバ変数へ格納する
        $this->title = sprintf('%sさん、ありがとうございます。', $name);
            // sprintf(文字列のフォーマット, 入力文字１, 入力文字２,)のフォーマット
            // 『%s』なら文字列、『%d』なら数値を代入。その他色々あり。
            // <ex>sprintf("%s 君は %s を %d 個食べました。", "太郎", "りんご", 7)
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // メイン処理
    public function build()
    {
        return $this->view('emails.sample_notification')
                        // htmlメールのビューをセット
                    ->text('emails.sample_notification_plain')
                        // 平文メールのビューをセット
                        // 『view』と『text』の両方はセット出来ない？
                    ->subject($this->title)
                        // メールのタイトルをセット
                    ->with([
                        'text' => $this->text,
                        // ビューに渡す変数をセット
                      ]);

        // return $this->view('view.name');：初期記述
    }
}
