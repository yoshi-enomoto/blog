<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Mailクラスのuse（Mail::toで使用）
use Illuminate\Support\Facades\Mail;
// SampleNotificationクラスのuse（インスタンス？としてnewする為）
use App\Mail\SampleNotification;

class SampleController extends Controller
{
    // 送信URLが叩かれた時に動くアクションの設定
    public function SampleNotification()
    {
        $name = 'ララベル太郎';
        $text = 'これからもよろしくお願いいたします。';
        $to = 'test@gmail.com';
            // 送信先を複数セットする場合
            // $to = [
            //     'test01@gmail.com',
            //     'test02@gmail.com'
            // ];
            // 名前もセットする場合
            // $to = [
            //     [
            //         'name' => 'Laravel-Mike',
            //         'email' => 'test@gmail.com'
            //     ]
            // ];
                // 複数の名前と送信先をセットする場合は上記を『,』で区切り続ける。（10件未満推奨）

        // Mailクラスのto()メソッド
        // かつ、sendメソッドでSampleNotificationクラスのインスタンスを渡す
        Mail::to($to)->send(new SampleNotification($name, $text));

            // ccやbccで送信する場合は、送信先を変数に格納してアロー演算子で繋げる。
            // Mail::to($to)
            //     ->cc($cc)
            //     ->bcc($bcc)
            //     ->send(new SampleNotification($name, $text));

        // 必要に応じて、送信メールドライバの設定を変更する（.envファイル）
        // ドライバの設定を変更した場合、キャッシュクリアをする必要あり。
        // 『php artisan cache:clear』『php artisan config:cache』
    }

    // test
}
