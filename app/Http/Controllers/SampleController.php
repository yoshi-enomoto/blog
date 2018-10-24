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

        // Mailクラスのto()メソッド
        // かつ、sendメソッドでSampleNotificationクラスのインスタンスを渡す
        Mail::to($to)->send(new SampleNotification($name, $text));
    }
}
