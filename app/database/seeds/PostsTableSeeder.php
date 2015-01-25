<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 20) as $index)
		{
			$post = new Post;
            $post->content = $faker->paragraph(2);

            $user = User::find($faker->numberBetween(1,User::all()->count()));
            $channel = Channel::find($faker->numberBetween(1,10));

            $post->user()->associate($user);
            $post->channel()->associate($channel);

            $post->save();
		}
	}

}