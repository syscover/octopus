<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OctopusCreateTableCompany extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('008_074_company', function($table){
            $table->engine = 'InnoDB';
            $table->increments('id_074')->unsigned();
            $table->string('company_name_074', 100);
            $table->string('tin_074', 50)->nullable();
            $table->string('country_074', 2);
            $table->string('territorial_area_1_074', 6)->nullable();
            $table->string('territorial_area_2_074', 10)->nullable();
            $table->string('territorial_area_3_074', 10)->nullable();
            $table->string('cp_074', 10)->nullable();
            $table->string('locality_074', 100)->nullable();
            $table->string('address_074', 150)->nullable();
            $table->string('contact_074', 100)->nullable();
            $table->string('phone_074', 50)->nullable();
            $table->string('email_074', 100)->nullable();
            $table->string('web_074', 100)->nullable();
            
            $table->foreign('country_074', 'fk01_008_074_company')->references('id_002')->on('001_002_country')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_1_074', 'fk02_008_074_company')->references('id_003')->on('001_003_territorial_area_1')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_2_074', 'fk03_008_074_company')->references('id_004')->on('001_004_territorial_area_2')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_3_074', 'fk04_008_074_company')->references('id_005')->on('001_005_territorial_area_3')
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
        Schema::drop('008_074_company');
	}

}
