<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersChannelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users_channels', function(Blueprint $table)
		{
			$table->foreign('channel_id', 'FK_users_channels_channel_id')->references('id')->on('channels')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_users_channels_user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users_channels', function(Blueprint $table)
		{
			$table->dropForeign('FK_users_channels_channel_id');
			$table->dropForeign('FK_users_channels_user_id');
		});
	}

}
