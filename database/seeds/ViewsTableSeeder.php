<?php

use Illuminate\Database\Seeder;
use App\View;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        View::create([
        	'name' => $faker->name,
        	'description' => $faker->text
        ]);
    }
}
