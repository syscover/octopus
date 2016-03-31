<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OctopusCreateTableBrand extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasTable('008_071_brand'))
		{
			Schema::create('008_071_brand', function ($table) {
				$table->engine = 'InnoDB';
				$table->increments('id_071')->unsigned();
				$table->string('name_071');
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
		if(Schema::hasTable('008_071_brand'))
		{
			Schema::drop('008_071_brand');
		}
	}
}