<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal('latitude', 9, 6);
			$table->decimal('longitude', 9, 6);
			$table->string('address_1', 250);
			$table->string('address_2', 250)->nullable();
			$table->string('code', 20);
			$table->integer('city_id')->unsigned()->index('city_id');
			$table->smallInteger('state_id')->unsigned()->index('state_id');
			$table->boolean('country_id')->index('country_id');
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
		Schema::drop('locations');
	}

}
