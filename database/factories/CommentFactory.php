<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween($min = 18, $max = 30),
        'body' => $faker->realText($maxNbChars = 20, $indexSize = 1),
        'created_at' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),

        // その他の書き方例
        // 'book_name' => $faker->realText($maxNbChars = 20, $indexSize = 1),
        // 'author' => $faker->name,
        // 'price' => $faker->numberBetween($min = 600, $max = 4000),
        // 'stocks' => $faker->numberBetween($min = 1, $max = 100),
        // 'release_dt' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
18
