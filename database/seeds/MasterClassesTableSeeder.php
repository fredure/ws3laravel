<?php

use Illuminate\Database\Seeder;
use App\MasterClass;
use App\User;
use App\View;

class MasterClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

        for ($i=0; $i < 3; $i++) { 
        	MasterClass::create([
        		'datetime' => $faker->dateTime(),
        		'name' => $faker->name,
        		'humans' => 0,
        		'price' => $faker->numberBetween(1000, 3000),
        		'description' => $faker->text,
        		'user_id' => User::where('role_id', 1)->get()->random()->id,
        		'view_id' => View::all()->random()->id
        	]);
        }
    }
}
