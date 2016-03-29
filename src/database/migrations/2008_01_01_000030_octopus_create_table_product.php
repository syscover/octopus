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
        Schema::create('008_072_product', function($table){
            $table->engine = 'InnoDB';
            $table->increments('id_072')->unsigned();
            $table->integer('brand_072')->unsigned();
            $table->string('name_072');

            $table->foreign('brand_072', 'fk01_008_072_product')->references('id_071')
                ->on('008_071_brand')->onDelete('cascade')->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('008_072_product');
	}
}