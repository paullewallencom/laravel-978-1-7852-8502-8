<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReservationRoomTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservation_room', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->primary();
			$table->integer('reservation_id')->index('reservation_id');
			$table->integer('room_id')->unsigned()->index('room_id_reservation');
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
		Schema::drop('reservation_room');
	}

}
