<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusColBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bookings', function(Blueprint $table)
		{
			$table->enum('status', array('Pending', 'Cancelled', 'Confirmed'))->default('Pending');
			$table->dropColumn('is_confirmed');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bookings', function(Blueprint $table)
		{
			$table->dropColumn('status');
			$table->boolean('is_confirmed')->default(0);
		});
	}

}