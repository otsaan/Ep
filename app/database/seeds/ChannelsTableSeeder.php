<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ChannelsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Channel::create([
                'name' => $faker->word,
                'photo' => $faker->imageUrl(600,400),
                'public' => $faker->boolean(50),
			]);
		}
	}

}