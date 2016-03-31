<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OctopusCreateTableOrder extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('008_079_order'))
        {
            Schema::create('008_079_order', function ($table) {
                $table->engine = 'InnoDB';
                $table->increments('id_079')->unsigned();
                $table->integer('request_079')->unsigned()->nullable();
                $table->integer('committed_079')->unsigned()->nullable();

                $table->integer('supervisor_079')->unsigned();
                $table->integer('customer_079')->unsigned();
                $table->integer('shop_079')->unsigned();
                $table->integer('company_079')->unsigned();
                $table->integer('family_079')->unsigned();
                $table->integer('brand_079')->unsigned();
                $table->integer('product_079')->unsigned();
                $table->integer('laboratory_079')->unsigned();

                // address
                $table->integer('id_address_079')->unsigned()->nullable();
                $table->string('company_name_079')->nullable();
                $table->string('name_079')->nullable();
                $table->string('surname_079')->nullable();
                $table->string('country_079', 2);
                $table->string('territorial_area_1_079', 6)->nullable();
                $table->string('territorial_area_2_079', 10)->nullable();
                $table->string('territorial_area_3_079', 10)->nullable();
                $table->string('cp_079')->nullable();
                $table->string('locality_079')->nullable();
                $table->string('address_079')->nullable();
                $table->string('phone_079')->nullable();
                $table->string('email_079')->nullable();
                $table->text('observations_079')->nullable();

                // order
                $table->integer('date_079')->unsigned();
                $table->string('date_text_079');

                $table->decimal('view_width_079', 10, 3);
                $table->decimal('view_height_079', 10, 3);
                $table->decimal('total_width_079', 10, 3)->nullable();
                $table->decimal('total_height_079', 10, 3)->nullable();

                $table->smallInteger('units_079')->unsigned();

                // expiration date
                $table->integer('expiration_079')->nullable()->unsigned()->default(0);
                $table->string('expiration_text_079')->nullable();

                $table->string('attachment_079')->nullable();
                $table->text('comments_079')->nullable();

                $table->foreign('supervisor_079', 'fk01_008_079_order')->references('id_010')
                    ->on('001_010_user')->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('customer_079', 'fk02_008_079_order')->references('id_075')->on('008_075_customer')
                    ->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('shop_079', 'fk03_008_079_order')->references('id_076')->on('008_076_shop')
                    ->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('company_079', 'fk04_008_079_order')->references('id_074')
                    ->on('008_074_company')->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('family_079', 'fk05_008_079_order')->references('id_070')
                    ->on('008_070_family')->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('brand_079', 'fk06_008_079_order')->references('id_071')
                    ->on('008_071_brand')->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('product_079', 'fk07_008_079_order')->references('id_072')
                    ->on('008_072_product')->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('laboratory_079', 'fk08_008_079_order')->references('id_073')
                    ->on('008_073_laboratory')->onDelete('restrict')->onUpdate('cascade');

                $table->foreign('id_address_079', 'fk08_008_079_order')->references('id_077')
                    ->on('008_077_address')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('country_079', 'fk09_008_079_order')->references('id_002')->on('001_002_country')
                    ->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('territorial_area_1_079', 'fk10_008_079_order')->references('id_003')->on('001_003_territorial_area_1')
                    ->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('territorial_area_2_079', 'fk11_008_079_order')->references('id_004')->on('001_004_territorial_area_2')
                    ->onDelete('restrict')->onUpdate('cascade');
                $table->foreign('territorial_area_3_079', 'fk12_008_079_order')->references('id_005')->on('001_005_territorial_area_3')
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
        if(Schema::hasTable('008_079_order'))
        {
            Schema::drop('008_079_order');
        }
	}
}