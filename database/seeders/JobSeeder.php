<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jobs')->insert([
            'user_id' => '1',
            'title' =>fake()->jobTitle(),
            'info' => fake()->paragraph(),
            'photo' => 'https://picsum.photos/seed/picsum/200/300',
        ]);
    }
}
