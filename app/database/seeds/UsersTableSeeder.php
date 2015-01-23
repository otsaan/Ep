<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			User::create([
				'first_name' => $faker->firstName,
				'last_name' => $faker->lastName,
				'email' => $faker->email,
				'password' => Hash::make($faker->word),
				'username' => $faker->username,
				'birthdate' => $faker->dateTimeThisCentury->format('Y-m-d'),
				'phone' => $faker->phoneNumber,
				'photo' => $faker->imageUrl(400,400),
				'bio' => $faker->paragraph(3),
				'active' => $faker->boolean(70),
				'is_id' => $index,
				'is_type' => 'Student'
			]);
		}

		foreach(range(1, 10) as $index)
		{
			User::create([
				'first_name' => $faker->firstName,
				'last_name' => $faker->lastName,
				'email' => $faker->email,
				'password' => Hash::make($faker->word),
				'username' => $faker->username,
				'birthdate' => $faker->dateTimeThisCentury->format('Y-m-d'),
				'phone' => $faker->phoneNumber,
				'photo' => $faker->imageUrl(400,400),
				'bio' => $faker->paragraph(3),
				'active' => $faker->boolean(70),
				'is_id' => $index,
				'is_type' => 'Professor'
			]);
		}

		foreach(range(1, 10) as $index)
		{
			User::create([
				'first_name' => $faker->firstName,
				'last_name' => $faker->lastName,
				'email' => $faker->email,
				'password' => Hash::make($faker->word),
				'username' => $faker->username,
				'birthdate' => $faker->dateTimeThisCentury->format('Y-m-d'),
				'phone' => $faker->phoneNumber,
				'photo' => $faker->imageUrl(400,400),
				'bio' => $faker->paragraph(3),
				'active' => $faker->boolean(70),
				'is_id' => $index,
				'is_type' => 'Graduate'
			]);
		}
	}

}