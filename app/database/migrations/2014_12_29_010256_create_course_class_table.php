<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseClassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_class', function(Blueprint $table)
		{
			$table->integer('course_id')->index('fk_course_has_class_course1_idx');
			$table->integer('class_id')->index('fk_course_has_class_class1_idx');
			$table->primary(['course_id','class_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('course_class');
	}

}
