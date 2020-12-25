<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservations', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('reservation_number', 100);
			$table->date('date_start');
			$table->date('date_end');
			$table->smallInteger('user_id')->unsigned()->index('user_id');
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
		Schema::drop('reservations');
	}

}
