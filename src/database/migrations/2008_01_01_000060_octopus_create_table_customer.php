<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OctopusCreateTableCustomer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('008_075_customer'))
        {
            Schema::create('008_075_customer', function ($table) {
                $table->engine = 'InnoDB';
                $table->increments('id_075')->unsigned();
                $table->string('code_075')->nullable();
                $table->string('company_name_075');
                $table->string('tin_075')->nullable();
                $table->string('country_075', 2);
                $table->string('territorial_area_1_075', 6)->nullable();
                $table->string('territorial_area_2_075', 10)->nullable();
                $table->string('territorial_area_3_075', 10)->nullable();
                $table->string('cp_075')->nullable();
                $table->string('locality_075')->nullable();
                $table->string('address_075')->nullable();
                $table->string('contact_075')->nullable();
                $table->string('phone_075')->nullable();
                $table->string('email_075')->nullable();
                $table->string('web_075')->nullable();

                $table->unique('code_075', 'ui_008_075_customer');

                $table->foreign('country_075', 'fk01_008_075_customer')->references('id_002')->on('001_002_country')
                    ->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('territorial_area_1_075', 'fk02_008_075_customer')->references('id_003')->on('001_003_territorial_area_1')
                    ->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('territorial_area_2_075', 'fk03_008_075_customer')->references('id_004')->on('001_004_territorial_area_2')
                    ->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('territorial_area_3_075', 'fk04_008_075_customer')->references('id_005')->on('001_005_territorial_area_3')
                    ->onDelete('restrict')->onUpdate('cascade');
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
        if(Schema::hasTable('008_075_customer'))
        {
            Schema::drop('008_075_customer');
        }
	}
}
