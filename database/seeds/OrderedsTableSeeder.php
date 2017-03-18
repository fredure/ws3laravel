<?php

use Illuminate\Database\Seeder;
use App\Ordered;
use App\User;
use App\MasterClass;

class OrderedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ordered::create([
        	'user_id' => User::where('role_id', 2)->get()->random()->id,
        	'master_class_id' => MasterClass::all()->random()->id
        ]);
    }
}
