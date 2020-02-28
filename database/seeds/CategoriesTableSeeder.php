<?php

use App\Model\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$name = config('job.category');
    	foreach ($name as $item) {
    		factory(Category::class)->create([
    			'name' => $item,
    		]);
    	}
    }
}
