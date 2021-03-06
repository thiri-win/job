<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
	$name = config('job.category');
    return [
        'name' => $faker->randomElement($name),
    ];
});
