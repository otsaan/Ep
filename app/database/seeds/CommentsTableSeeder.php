<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 25) as $index)
		{
            $comment = new Comment;
            $comment->content = $faker->paragraph(1);

            $user = User::find($faker->numberBetween(1,User::all()->count()));
            $post = Post::find($faker->numberBetween(1,20));

            $comment->user()->associate($user);
            $comment->post()->associate($post);

            $comment->save();
		}
	}

}