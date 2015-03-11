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
        Schema::create('008_071_brand', function($table){
            $table->engine = 'InnoDB';
            $table->increments('id_071')->unsigned();
            $table->string('name_071', 50);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('008_071_brand');
	}

}
