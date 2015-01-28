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
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('first_name', 25)->nullable();
			$table->string('last_name', 25)->nullable();
			$table->string('email', 45)->nullable();
			$table->string('password', 60)->nullable();
			$table->string('username', 45)->nullable();
			$table->date('birthdate')->nullable();
			$table->string('phone', 25)->nullable();
			$table->string('photo')->nullable();
			$table->text('bio', 65535)->nullable();
			$table->boolean('active');
			$table->integer('is_id')->nullable();
			$table->string('is_type', 25)->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
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
