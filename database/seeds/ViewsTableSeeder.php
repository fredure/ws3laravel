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
        	'name' => 'Архитектурное решение',
        	'description' => $faker->text
        ]);

        View::create([
            'name' => 'Кулинария',
            'description' => $faker->text
        ]);

        View::create([
            'name' => 'Резьба по дереву',
            'description' => $faker->text
        ]);
    }
}
