<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvailableAtColCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cars', function($table)
        {
            $table->dropColumn('availability');
            $table->timestamp('available_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cars', function($table)
        {
            $table->dropColumn('available_at');
            $table->boolean('availability')->default(1);
        });
	}

}
