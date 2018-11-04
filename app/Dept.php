<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dept extends Model
{
    //timestamps利用しない
    public $timestamps = false;

    //primaryKeyの変更
    protected $primaryKey = "dept_id";

    //hasMany設定
    public function employees()
    {
        return $this->hasMany('App\Employee', 'dept_id', 'dept_id');

        // return $this->belongsTo('App\User', 'owner_id', 'user_id');
            // <ex>users テーブルのプライマリキーを id から user_id に変更し、phones テーブルの user_id を owner_id に変更した場合。


        // ※has側には外部キーは無い。belongs側に外部キーが存在。
        // 外部キーとローカルキーを変更する場合は下記のように記述する。

        // return $this->hasOne('App\Models\Phone', '$foreign_key', '$local_key');
            // 第二引数に外部キー（foreignKey）を指定し、第三引数にローカルキー（localKey）を指定する。
            // ＝membersテーブルのlocal_key（idの代わりのカラム）とphonesテーブルのforeign_key（members_id）がリレーションされる。

        // return $this->hasMany('App\Models\Comments', 'foreign_key', 'local_key');
            // 第二引数に外部キーを、第三引数にローカルキーを渡す。
            // ＝membersテーブルのlocal_keyカラムと、commentsテーブルのforeign_keyカラムがリレーションされる。
    }
}


