<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    protected $model = User::class;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => bcrypt('pass'),
            'role_id' => 2,
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'photo' => 'https://picsum.photos/seed/picsum/200/300',
            'company' => fake()->company(),
        ]);
    }
}
