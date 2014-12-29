<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGraduatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('graduates', function(Blueprint $table)
		{
			$table->foreign('graduate_id', 'fk_graduated_user1')->references('user_id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('class_id', 'fk_graduate_class1')->references('class_id')->on('classes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('graduates', function(Blueprint $table)
		{
			$table->dropForeign('fk_graduated_user1');
			$table->dropForeign('fk_graduate_class1');
		});
	}

}
