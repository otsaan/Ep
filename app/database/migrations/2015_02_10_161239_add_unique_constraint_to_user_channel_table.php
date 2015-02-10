<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddUniqueConstraintToUserChannelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_channel', function(Blueprint $table)
		{
			$table->unique(array('channel_id','user_id'));

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_channel', function(Blueprint $table)
		{
			$table->dropUnique(array('channel_id','user_id'));
		});
	}

}
