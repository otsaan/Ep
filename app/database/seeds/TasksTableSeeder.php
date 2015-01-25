<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TasksTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			$task = new Task;
            $task->description = $faker->paragraph();
            $task->due_date = $faker->dateTimeThisYear();

            $professor = Professor::find($faker->numberBetween(1,Professor::all()->count()));
            $channel = Channel::find($faker->numberBetween(1,Channel::all()->count()));

            $task->professor()->associate($professor);
            $task->channel()->associate($channel);

            $task->save();
		}
	}

}