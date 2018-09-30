<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use \App\comment;
    // 『use』を用いてリレーションを簡略化して記述しようと思ったが、失敗した。原因追求できず。

// モデル生成時、名前は大文字にする！
class post extends Model
{
    // MassAssigmentException 設定をする。
      // Laravelではデフォルトで、意図しないリクエストによって悪意のあるデータが挿入されてしまう脆弱性（MassAssigment）の対策が有効になっている。
      // ＝（悪意のあるユーザーが、本来設定できないカラムの値を設定する攻撃。）
    protected $fillable = ["title", "body"];
      // railsのstrong parameter

    // リレーションの設定
    // $post->comments
      // →$postからcommentsへアクセスする。belongsかhasかで、メソッド名は単数・複数となる！
    public function comments() {
      return $this->hasMany('App\Comment');
    }
}
