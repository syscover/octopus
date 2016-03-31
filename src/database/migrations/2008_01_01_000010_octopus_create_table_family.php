<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OctopusCreateTableFamily extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasTable('008_070_family'))
		{
			Schema::create('008_070_family', function ($table) {
				$table->engine = 'InnoDB';
				$table->increments('id_070')->unsigned();
				$table->string('name_070');
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if(Schema::hasTable('008_070_family'))
		{
			Schema::drop('008_070_family');
		}
	}

}
