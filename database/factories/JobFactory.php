<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Job;
use App\Model\User;
use App\Model\Company;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
	$title = $faker->sentence;
    $type = config('job.job_type');
    return [
        'user_id' => User::all()->random()->id,
    	'company_id' => Company::all()->random()->id,
    	'title' => $title,
    	'slug' => str_slug($title),
    	'description' => $faker->paragraph(rand(2,10)),
        'roles' => $faker->text,
    	'category_id' => rand(1,5),
    	'position' => $faker->jobTitle,
    	'type' => $faker->randomElement($type),
    	'status' => rand(0,1),
    	'last_date' => $faker->DateTime,
    ];
});
