<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 8) as $index)
		{
//			Course::create([
//                'description' => $faker->paragraph(2)
//			]);
		}
	}

}