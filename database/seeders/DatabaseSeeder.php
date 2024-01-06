<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Job;
use App\Models\Role;
use App\Models\User;
use Hamcrest\Arrays\IsArray;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->createMany([
            ['title' => 'admin'],
            ['title' => 'employer'],
            ['title' => 'employee'] 
        ]);

        User::factory()->create([
            'email' => 'admin@gmail.com',
            'role_id' => 1
        ]);
        User::factory()->create([
            'email' => 'John@gmail.com',
            'role_id' => 2
        ]);
        User::factory()->create([
            'email' => 'Dean@gmail.com',
            'role_id' => 3
        ]);
        $users = User::factory()->count(30)->create();
        $users->each(function($user) {
            $user->update(['role_id' => Role::all()->whereNotIn('id', 1)->pluck('id')->random()]);
        });

        Job::factory()->count(70)->create()->each(function($job) {
            $job->update(['user_id' => User::all()->where('role_id', 3)->pluck('id')->random()]);
        });
        
    }
}
