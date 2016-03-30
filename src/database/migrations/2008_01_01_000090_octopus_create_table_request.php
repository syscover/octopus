<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OctopusCreateTableRequest extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('008_078_request', function($table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id_078')->unsigned();
            $table->integer('order_078')->unsigned()->nullable();
            $table->integer('committed_078')->unsigned()->nullable();

            $table->integer('supervisor_078')->unsigned();
            $table->integer('customer_078')->unsigned();
            $table->integer('shop_078')->unsigned();
            $table->integer('company_078')->unsigned();
            $table->integer('family_078')->unsigned();
            $table->integer('brand_078')->unsigned();
            $table->integer('product_078')->unsigned();

            //address
            $table->integer('id_address_078')->unsigned()->nullable();
            $table->string('company_name_078')->nullable();
            $table->string('name_078')->nullable();
            $table->string('surname_078')->nullable();
            $table->string('country_078', 2);
            $table->string('territorial_area_1_078', 6)->nullable();
            $table->string('territorial_area_2_078', 10)->nullable();
            $table->string('territorial_area_3_078', 10)->nullable();
            $table->string('cp_078')->nullable();
            $table->string('locality_078')->nullable();
            $table->string('address_078')->nullable();
            $table->string('phone_078')->nullable();
            $table->string('email_078')->nullable();
            $table->text('observations_078')->nullable();

            // request
            $table->integer('date_078')->unsigned();
            $table->string('date_text_078');

            $table->decimal('view_width_078', 10, 3);
            $table->decimal('view_height_078', 10, 3);
            $table->decimal('total_width_078', 10, 3)->nullable();
            $table->decimal('total_height_078', 10, 3)->nullable();

            $table->smallInteger('units_078')->unsigned();

            // expiration date
            $table->integer('expiration_078')->nullable()->unsigned()->default(0);
            $table->string('expiration_text_078')->nullable();

            $table->string('attachment_078')->nullable();
            $table->text('comments_078')->nullable();

            $table->foreign('supervisor_078', 'fk01_008_078_request')->references('id_010')
                ->on('001_010_user')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('customer_078', 'fk02_008_078_request')->references('id_075')->on('008_075_customer')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('shop_078', 'fk03_008_078_request')->references('id_076')->on('008_076_shop')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('company_078', 'fk04_008_078_request')->references('id_074')
                ->on('008_074_company')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('family_078', 'fk05_008_078_request')->references('id_070')
                ->on('008_070_family')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('brand_078', 'fk06_008_078_request')->references('id_071')
                ->on('008_071_brand')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('product_078', 'fk07_008_078_request')->references('id_072')
                ->on('008_072_product')->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('id_address_078', 'fk08_008_078_request')->references('id_077')
                ->on('008_077_address')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('country_078', 'fk01_009_078_request')->references('id_002')->on('001_002_country')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_1_078', 'fk10_008_078_request')->references('id_003')->on('001_003_territorial_area_1')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_2_078', 'fk11_008_078_request')->references('id_004')->on('001_004_territorial_area_2')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_3_078', 'fk12_008_078_request')->references('id_005')->on('001_005_territorial_area_3')
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
        Schema::drop('008_078_request');
	}
}