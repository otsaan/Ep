<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Ep\Factory\UserFactory;

class GraduatesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
            UserFactory::createGraduate([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'password' => Hash::make(1234),
                'username' => $faker->username,
                'birthdate' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'phone' => $faker->phoneNumber,
                'photo' => $faker->imageUrl(400,400),
                'bio' => $faker->paragraph(2),
                'active' => $faker->boolean(70),
                'graduation_year' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'job' => $faker->sentence(4),
            ]);
		}
	}

}