<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
	$gender = config('job.gender');
	$avatar = Storage::allFiles('/avatar');
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'gender' => $faker->randomElement($gender),
        'avatar' => $faker->randomElement($avatar),
        'dob' => $faker->dateTimeThisDecade,
        'experience' =>$faker->paragraph,
        'bio' => $faker->paragraph,
        'cover_letter' => $faker->paragraph,
        'user_type' => config('job.user_type.2'),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('123456'),
        'remember_token' => Str::random(10),
    ];
});
