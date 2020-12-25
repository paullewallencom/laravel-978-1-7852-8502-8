<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAmenityRoomTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('amenity_room', function(Blueprint $table)
		{
			$table->increments('id');
			$table->smallInteger('amenity_id')->unsigned()->index('amenity_id');
			$table->integer('room_id')->unsigned()->index('room_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('amenity_room');
	}

}
