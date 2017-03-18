<?php

use Illuminate\Database\Seeder;
use App\User;	

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	User::create([
    		'fio' => $faker->name,
    		'email' => $faker->email,
    		'role_id' => $faker->numberBetween(1, 2),
    		'photo' => $faker->imageUrl(),
    		'password' => $faker->password
    	]);
    }
}
