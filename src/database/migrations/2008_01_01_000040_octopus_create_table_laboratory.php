<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OctopusCreateTableLaboratory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('008_073_laboratory', function($table){
            $table->engine = 'InnoDB';
            $table->increments('id_073')->unsigned();
            $table->string('company_name_073');
            $table->string('tin_073')->nullable();
            $table->string('country_073', 2);
            $table->string('territorial_area_1_073', 6)->nullable();
            $table->string('territorial_area_2_073', 10)->nullable();
            $table->string('territorial_area_3_073', 10)->nullable();
            $table->string('cp_073')->nullable();
            $table->string('locality_073')->nullable();
            $table->string('address_073')->nullable();
            $table->string('contact_073')->nullable();
            $table->string('phone_073')->nullable();
            $table->string('email_073')->nullable();
            $table->string('web_073')->nullable();

            $table->foreign('country_073', 'fk01_008_073_laboratory')->references('id_002')->on('001_002_country')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_1_073', 'fk02_008_073_laboratory')->references('id_003')->on('001_003_territorial_area_1')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_2_073', 'fk03_008_073_laboratory')->references('id_004')->on('001_004_territorial_area_2')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_3_073', 'fk04_008_073_laboratory')->references('id_005')->on('001_005_territorial_area_3')
                ->onDelete('restrict')->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('008_073_laboratory');
	}

}
