<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use \App\comment;
    // 『use』を用いてリレーションを簡略化して記述しようと思ったが、失敗した。原因追求できず。
use Illuminate\Database\Eloquent\SoftDeletes;
// 『softDelets』の読み込み記述
use App\Tag;

// モデル生成時、名前は大文字にする！
class post extends Model
{
    use SoftDeletes;
    // 『softDelets』の使用記述

    // MassAssigmentException 設定をする。
      // Laravelではデフォルトで、意図しないリクエストによって悪意のあるデータが挿入されてしまう脆弱性（MassAssigment）の対策が有効になっている。
      // ＝（悪意のあるユーザーが、本来設定できないカラムの値を設定する攻撃。）
    protected $fillable = ["title", "body"];
      // railsのstrong parameter

    protected $dates =
    [
        // カラムの設定
        'deleted_at',
    ];


    // リレーションの設定
    // $post->comments
      // →$postからcommentsへアクセスする。belongsかhasかで、メソッド名は単数・複数となる！
    public function comments() {
      return $this->hasMany('App\Comment');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
