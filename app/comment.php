<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// モデル生成時、名前は大文字にする！
class comment extends Model
{
    use softDeletes;

    // protected $fillable = ["body"];
    protected $fillable =
    [
      "body",
      "post_id"
    ];

    protected $dates =
    [
        // カラムの設定
        'deleted_at',
    ];

    // リレーションの設定
      // $comment->post
      // →$commentからpostへアクセスする。belongsかhasかで、メソッド名は単数・複数となる！
    public function post() {
      return $this->belongsTo('App\Post');
    }
}
