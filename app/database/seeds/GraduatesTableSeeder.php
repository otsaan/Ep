<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GraduatesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Graduate::create([
				'graduation_year' => $faker->dateTimeThisCentury->format('Y-m-d'),
				'job' => $faker->sentence(5),
			]);
		}
	}

}