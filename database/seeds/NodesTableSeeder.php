<?php

use Illuminate\Database\Seeder;

class NodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nodes')->insert([
            [
                'name' => '邦楽',
                // nullでレコード作成した場合は『null』を挿入する。
                'parent' => null,
            ],
            [
                'name' => '洋楽',
                'parent' => null,
            ],
            [
                'name' => 'j-pop',
                'parent' => 1,
            ],
            [
                'name' => 'アニメ',
                'parent' => 1,
            ],
            [
                'name' => 'rock',
                'parent' => 1,
            ],
            [
                'name' => 'R&B',
                'parent' => 2,
            ],
            [
                'name' => 'blues',
                'parent' => 2,
            ],
            [
                'name' => 'aiko',
                'parent' => 3,
            ],
            [
                'name' => '水樹奈々',
                'parent' => 4,
            ],
            [
                'name' => '[Alexandros]',
                'parent' => 5,
            ],
            [
                'name' => 'レッチリ',
                'parent' => 6,
            ],
            [
                'name' => 'YUI',
                'parent' => 3,
            ],
            [
                'name' => '林原めぐみ',
                'parent' => 4,
            ],
            [
                'name' => 'uverWorld',
                'parent' => 5,
            ],
            [
                'name' => 'abs',
                'parent' => 5,
            ],
            [
                'name' => '藍井エイル',
                'parent' => 4,
            ],
            [
                'name' => 'miwa',
                'parent' => 3,
            ],
            [
                'name' => 'My hair is bad',
                'parent' => 5,
            ],
        ]);
    }
}
