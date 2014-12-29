<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTeachesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('teaches', function(Blueprint $table)
		{
			$table->foreign('professor_id', 'fk_professor_has_course_professor1')->references('professor_id')->on('professors')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('course_id', 'fk_professor_has_course_course1')->references('course_id')->on('courses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('teaches', function(Blueprint $table)
		{
			$table->dropForeign('fk_professor_has_course_professor1');
			$table->dropForeign('fk_professor_has_course_course1');
		});
	}

}
