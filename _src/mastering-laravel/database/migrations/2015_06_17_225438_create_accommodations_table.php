<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccommodationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accommodations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 250);
			$table->text('description', 65535);
			$table->smallInteger('location_id')->unsigned()->index('loc');
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
		Schema::drop('accommodations');
	}

}
