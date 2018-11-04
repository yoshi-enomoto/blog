<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
                'dept_id' => 1,
                'name' => '田中',
            ],
            [
                'dept_id' => 2,
                'name' => '玉木',
            ],
            [
                'dept_id' => 3,
                'name' => '鈴木',
            ],
            [
                'dept_id' => 3,
                'name' => '山本',
            ],
            [
                'dept_id' => 2,
                'name' => '斉藤',
            ],
            [
                'dept_id' => 1,
                'name' => '佐藤',
            ],
            [
                'dept_id' => 1,
                'name' => '小澤',
            ],
            [
                'dept_id' => 2,
                'name' => '関野',
            ],
            [
                'dept_id' => 0,
                'name' => '中村',
            ],
        ]);
    }
}
