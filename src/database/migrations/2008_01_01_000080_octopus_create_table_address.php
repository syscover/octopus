<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OctopusCreateTableAddress extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('008_077_address'))
        {
            Schema::create('008_077_address', function ($table) {
                $table->engine = 'InnoDB';
                $table->increments('id_077')->unsigned();
                $table->integer('shop_077')->unsigned();
                $table->string('alias_077')->nullable();
                $table->string('company_name_077')->nullable();
                $table->string('name_077')->nullable();
                $table->string('surname_077')->nullable();
                $table->string('country_077', 2);
                $table->string('territorial_area_1_077', 6)->nullable();
                $table->string('territorial_area_2_077', 10)->nullable();
                $table->string('territorial_area_3_077', 10)->nullable();
                $table->string('cp_077')->nullable();
                $table->string('locality_077')->nullable();
                $table->string('address_077');
                $table->string('phone_077')->nullable();
                $table->string('email_077')->nullable();
                $table->boolean('favorite_077');
                $table->string('latitude_077')->nullable();
                $table->string('longitude_077')->nullable();

                $table->foreign('shop_077', 'fk01_008_077_address')->references('id_076')
                    ->on('008_076_shop')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('country_077', 'fk02_008_077_address')->references('id_002')->on('001_002_country')
                    ->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('territorial_area_1_077', 'fk03_008_077_address')->references('id_003')->on('001_003_territorial_area_1')
                    ->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('territorial_area_2_077', 'fk04_008_077_address')->references('id_004')->on('001_004_territorial_area_2')
                    ->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('territorial_area_3_077', 'fk05_008_077_address')->references('id_005')->on('001_005_territorial_area_3')
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
        if(Schema::hasTable('008_077_address'))
        {
            Schema::drop('008_077_address');
        }
	}
}