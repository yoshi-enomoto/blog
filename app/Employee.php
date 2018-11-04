<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //timestamps利用しない
    public $timestamps = false;

    //belongsTo設定
    public function dept()
    {
        return $this->belongsTo('App\Dept', 'dept_id', 'dept_id');


        // 任意のカラムに変更したい場合は下記のように記述する。
        // return $this->belongsTo('App\Models\Members', 'foreign_key_name', 'own_key_name');
            // 基本、暗黙的にphonesテーブルのmembers_id（外部キー）とmembersテーブルのid（オーナーキー？）が結合される。

        // Eloquentはリレーションメソッド名に_idのサフィックスを付けた名前をデフォルトの外部キー名とする。しかしPhoneモデルの外部キーがuser_idでなければ、belongsToメソッドの第２引数にカスタムキー名を渡す。
        // ：子モデルの別名カラム名（親モデルとの結び付き名を変えた場合）
        // 親のモデルの主キーがidでない、もしくは子のモデルと違ったカラムで紐付けたい場合は、親テーブルのカスタムキー名をbelongsToメソッドの第３引数に渡す。
        // ：親モデルのカラム名（pkキーの名前を変えた場合）

    }
}


