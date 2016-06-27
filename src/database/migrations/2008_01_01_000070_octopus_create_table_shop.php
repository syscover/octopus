<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OctopusCreateTableShop extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('008_076_shop'))
        {
            Schema::create('008_076_shop', function ($table) {
                $table->engine = 'InnoDB';
                
                $table->increments('id_076')->unsigned();
                $table->integer('customer_id_076')->unsigned();
                $table->string('name_076');
                $table->string('country_id_076', 2);
                $table->string('territorial_area_1_id_076', 6)->nullable();
                $table->string('territorial_area_2_id_076', 10)->nullable();
                $table->string('territorial_area_3_id_076', 10)->nullable();
                $table->string('cp_076')->nullable();
                $table->string('locality_076')->nullable();
                $table->string('address_076')->nullable();
                $table->string('contact_076')->nullable();
                $table->string('phone_076')->nullable();
                $table->string('fax_076')->nullable();
                $table->string('email_076')->nullable();
                $table->string('web_076')->nullable();

                $table->foreign('customer_id_076', 'fk01_008_076_shop')
                    ->references('id_075')
                    ->on('008_075_customer')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('country_id_076', 'fk02_008_076_shop')
                    ->references('id_002')
                    ->on('001_002_country')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_1_id_076', 'fk03_008_076_shop')
                    ->references('id_003')
                    ->on('001_003_territorial_area_1')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_2_id_076', 'fk04_008_076_shop')
                    ->references('id_004')
                    ->on('001_004_territorial_area_2')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_3_id_076', 'fk05_008_076_shop')
                    ->references('id_005')
                    ->on('001_005_territorial_area_3')
                    ->onDelete('restrict')
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
        if(Schema::hasTable('008_076_shop'))
        {
            Schema::drop('008_076_shop');
        }
	}
}