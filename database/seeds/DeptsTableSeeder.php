<?php

use Illuminate\Database\Seeder;

class DeptsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('depts')->insert([
            [
                'dept_id' => 1,
                'dept_name' => '営業部',
            ],
            [
                'dept_id' => 2,
                'dept_name' => '経理部',
            ],
            [
                'dept_id' => 3,
                'dept_name' => '技術部',
            ],
            [
                'dept_id' => 4,
                'dept_name' => '法務部',
            ],
        ]);
    }
}
