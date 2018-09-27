<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    // MassAssigmentException 設定をする。
      // Laravelではデフォルトで、意図しないリクエストによって悪意のあるデータが挿入されてしまう脆弱性（MassAssigment）の対策が有効になっている。
      // ＝（悪意のあるユーザーが、本来設定できないカラムの値を設定する攻撃。）
    protected $fillable = ["title", "body"];
      // railsのstrong parameter
}
