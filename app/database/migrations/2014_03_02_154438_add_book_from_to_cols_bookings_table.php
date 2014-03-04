<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBookFromToColsBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bookings', function($table)
        {
            $table->datetime('book_from');
            $table->datetime('book_to');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bookings', function($table)
        {
            $table->dropColumn('book_from');
            $table->dropColumn('book_to');
        });
	}

}
