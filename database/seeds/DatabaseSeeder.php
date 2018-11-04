<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PostsTableSeeder::class,
            // Factoryで生成する場合もここに加える！
            CommentsTableSeeder::class,
            DeptsTableSeeder::class,
            EmployeesTableSeeder::class,
        ]);
    }
}
