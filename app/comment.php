<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// モデル生成時、名前は大文字にする！
class comment extends Model
{
    protected $fillable = ["body"];

    // リレーションの設定
      // $comment->post
      // →$commentからpostへアクセスする。belongsかhasかで、メソッド名は単数・複数となる！
    public function post() {
      return $this->belongsTo('App\Post');
    }
}
