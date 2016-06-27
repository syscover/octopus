<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OctopusCreateTableProduct extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasTable('008_072_product'))
		{
			Schema::create('008_072_product', function ($table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id_072')->unsigned();
				$table->integer('brand_id_072')->unsigned();
				$table->string('name_072');
				$table->boolean('active_072');

				$table->foreign('brand_id_072', 'fk01_008_072_product')
					->references('id_071')
					->on('008_071_brand')
					->onDelete('cascade')
					->onUpdate('cascade');
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
		if(Schema::hasTable('008_072_product'))
		{
			Schema::drop('008_072_product');
		}
	}
}