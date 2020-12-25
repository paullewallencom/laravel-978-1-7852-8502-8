<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rates', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('room_id')->unsigned()->index('room_id_rates');
			$table->decimal('rate', 10, 0)->unsigned()->index('rate');
			$table->boolean('currency_id')->index('currency_id');
			$table->date('date_start');
			$table->date('date_end');
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
		Schema::drop('rates');
	}

}
