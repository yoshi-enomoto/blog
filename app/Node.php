<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $fillable = ["name", "parent"];
}

// 『php artisan tinker』で自己結合する場合
// \DB::table('nodes as f1')->select('f1.id', 'f1.name', 'f2.name as parent_name')->leftJoin('nodes as f2', 'f1.parent', '=', 'f2.id')->get();

    // 1つのテーブルをf1とf2という別名を付け、f1に対してleftJoinする。
    // その際、同じカラム名は上書きされてしまうので、『f2.name as parent_name』などで変更してやる。
