<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('user_id', true);
			$table->string('first_name', 45);
			$table->string('last_name', 45);
			$table->string('email', 45);
			$table->string('password', 60);
			$table->string('phone', 45)->nullable();
			$table->string('photo')->nullable();
			$table->text('bio', 65535)->nullable();
			$table->boolean('activated')->unique('status_UNIQUE');
			$table->dateTime('created_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
