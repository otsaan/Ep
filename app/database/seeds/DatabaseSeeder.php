<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('StudentsTableSeeder');
		$this->call('ProfessorsTableSeeder');
		$this->call('GraduatesTableSeeder');

        $this->call('ChannelsTableSeeder');
        $this->call('PostsTableSeeder');
        $this->call('CommentsTableSeeder');
        $this->call('TasksTableSeeder');

        //$this->call('CoursesTableSeeder');
	}

}
