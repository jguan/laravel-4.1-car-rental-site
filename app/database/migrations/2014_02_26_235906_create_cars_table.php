<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('cars', function($table){
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('car_types');
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 6, 2);
            $table->boolean('availability')->default(1);
            $table->boolean('transmission')->default(1);
            $table->boolean('aircon')->default(1);
            $table->integer('seats');
            $table->integer('doors');
            $table->string('image');
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
		Schema::drop('cars');
	}

}
