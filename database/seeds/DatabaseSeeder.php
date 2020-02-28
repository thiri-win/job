<?php

use App\Model\Job;
use App\Model\User;
use App\Model\Company;
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
            UsersTableSeeder::class,
            CompaniesTableSeeder::class,
            JobsTableSeeder::class,
            CategoriesTableSeeder::class,
        ]);
    }
}
