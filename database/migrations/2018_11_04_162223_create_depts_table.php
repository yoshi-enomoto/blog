<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeptsTable extends Migration
{
    // Eloquentではテーブルの主キーをidカラム名と想定しており、この規約をオーバーライドする。
    protected $primaryKey = 'dept_id';
    // 自動増分ではない、もしくは整数値ではない主キーを使う場合、falseをセットする。
    public $incrementing = false;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depts', function (Blueprint $table) {
            $table->integer('dept_id')->primary();
            $table->string('dept_name', 32);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depts');
    }
}
