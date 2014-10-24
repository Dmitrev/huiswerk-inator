<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnouncementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('anouncements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->text('message');
			$table->integer('type');
			$table->timestamp('start_date');
			$table->timestamp('end_date');
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
		Schema::drop('anouncements');
	}

}
