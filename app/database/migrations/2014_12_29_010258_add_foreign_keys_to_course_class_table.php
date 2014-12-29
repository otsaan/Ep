<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCourseClassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('course_class', function(Blueprint $table)
		{
			$table->foreign('course_id', 'fk_course_has_class_course1')->references('course_id')->on('courses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('class_id', 'fk_course_has_class_class1')->references('class_id')->on('classes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('course_class', function(Blueprint $table)
		{
			$table->dropForeign('fk_course_has_class_course1');
			$table->dropForeign('fk_course_has_class_class1');
		});
	}

}
