<?php

use App\Model\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(User::class)->create([
    		'name' => 'Thiri Win',
            'gender' => config('job.gender.1'),
    		'user_type' => config('job.user_type.0'),
    		'email' => 'admin@testing.com',
    		'email_verified_at' => now(),
    		'password' => bcrypt('123456'),
    		'remember_token' => Str::random(10),
    	]);

    	factory(User::class)->create([
    		'name' => 'Mei Mei',
            'gender' => config('job.gender.1'),
    		'user_type' => config('job.user_type.2'),
    		'email' => 'user@testing.com',
    		'email_verified_at' => now(),
    		'password' => bcrypt('123456'),
    		'remember_token' => Str::random(10),
    	]);

    	factory(User::class, 5)->create();
    }
}
