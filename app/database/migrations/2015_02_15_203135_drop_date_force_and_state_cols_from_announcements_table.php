<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropDateForceAndStateColsFromAnnouncementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('announcements', function($table){
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropColumn('force');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('announcements', function($table){
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->boolean('force');
        });
	}

}
