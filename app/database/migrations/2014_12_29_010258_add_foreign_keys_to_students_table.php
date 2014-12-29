<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('students', function(Blueprint $table)
		{
			$table->foreign('student_id', 'fk_student_user')->references('user_id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('class_id', 'fk_student_class1')->references('class_id')->on('classes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('students', function(Blueprint $table)
		{
			$table->dropForeign('fk_student_user');
			$table->dropForeign('fk_student_class1');
		});
	}

}
