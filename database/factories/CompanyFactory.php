<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\User;
use App\Model\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
	$cname = $faker->company;
	$image = Storage::allFiles('/pics');
	$logo = Storage::allFiles('/logo');
	return [
		'user_id' => User::all()->random()->id,
		'cname' => $cname,
		'slug' => str_slug($cname),
		'address' => $faker->address,
		'phone' => $faker->phoneNumber,
		'website' => $faker->domainName,
		'logo' => $faker->randomElement($logo),
		'cover_photo' => $faker->randomElement($image),
		'slogan' => $faker->sentence,
		'description' =>$faker->paragraph(rand(2,10)),
	];
});
