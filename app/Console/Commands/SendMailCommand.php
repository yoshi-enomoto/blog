<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// Mailクラスのuse（Mail::toで使用）
use Illuminate\Support\Facades\Mail;
// SampleNotificationクラスのuse（インスタンス？としてnewする為）
use App\Mail\SampleNotification;

class SendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // 登録するコマンド名
    protected $signature = 'app:email:send';
    // protected $signature = 'command:name';
        // command：グルーピング、name：この処理の識別子

    // どのように使用するか分かっていない為、コメアウト
    // /**
    // * @var App\Mailer
    // */
    // protected $mailer;

    // *
    //  * Create a new command instance.
    //  *
    //  * @param App\Mailer $mailer
    //  * @return void

    // public function __construct(Mailer $mailer)
    // {
    //     parent::__construct();

    //     $this->mailer = $mailer;
    // }


    /**
     * The console command description.
     *
     * @var string
     */
    // php artisan list時に表示されるこのコマンドの説明
    protected $description = 'send an email to subscriber';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    // このコマンドを実行するたびに呼び出される処理
    public function handle()
    {
        $name = 'コマンド次郎';
        $text = '今後ともご贔屓に。';
        $to = 'try@gmail.com';
        Mail::to($to)->send(new SampleNotification($name, $text));
    }
}
