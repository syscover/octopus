<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OctopusCreateTableStock extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasTable('008_080_stock'))
		{
			Schema::create('008_080_stock', function ($table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id_080')->unsigned();
				$table->integer('request_080')->unsigned()->nullable();
				$table->integer('order_080')->unsigned()->nullable();

				$table->integer('supervisor_080')->unsigned();
				$table->integer('customer_080')->unsigned()->nullable();
				$table->integer('shop_080')->unsigned()->nullable(); // if delete shop, set null
				$table->integer('company_080')->unsigned();
				$table->integer('family_080')->unsigned();
				$table->integer('brand_080')->unsigned();
				$table->integer('product_080')->unsigned();
				$table->integer('laboratory_080')->unsigned();

				// address
				$table->integer('id_address_080')->unsigned()->nullable();
				$table->string('company_name_080')->nullable();
				$table->string('name_080')->nullable();
				$table->string('surname_080')->nullable();
				$table->string('country_080', 2);
				$table->string('territorial_area_1_080', 6)->nullable();
				$table->string('territorial_area_2_080', 10)->nullable();
				$table->string('territorial_area_3_080', 10)->nullable();
				$table->string('cp_080')->nullable();
				$table->string('locality_080')->nullable();
				$table->string('address_080')->nullable();
				$table->string('phone_080')->nullable();
				$table->string('email_080')->nullable();
				$table->text('observations_080')->nullable();

				// order
				$table->integer('date_080')->unsigned();
				$table->string('date_text_080');

				$table->decimal('view_width_080', 10, 3);
				$table->decimal('view_height_080', 10, 3);
				$table->decimal('total_width_080', 10, 3)->nullable();
				$table->decimal('total_height_080', 10, 3)->nullable();

				$table->smallInteger('units_080')->unsigned();

				// expiration date
				$table->integer('expiration_080')->nullable()->unsigned()->default(0);
				$table->string('expiration_text_080')->nullable();

				$table->string('attachment_080')->nullable();
				$table->text('comments_080')->nullable();

				$table->foreign('supervisor_080', 'fk01_008_080_order')->references('id_010')
					->on('001_010_user')->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('customer_080', 'fk02_008_080_order')->references('id_075')->on('008_075_customer')
					->onDelete('set null')->onUpdate('cascade');
				$table->foreign('shop_080', 'fk03_008_080_order')->references('id_076')->on('008_076_shop')
					->onDelete('set null')->onUpdate('cascade');
				$table->foreign('company_080', 'fk04_008_080_order')->references('id_074')
					->on('008_074_company')->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('family_080', 'fk05_008_080_order')->references('id_070')
					->on('008_070_family')->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('brand_080', 'fk06_008_080_order')->references('id_071')
					->on('008_071_brand')->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('product_080', 'fk07_008_080_order')->references('id_072')
					->on('008_072_product')->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('id_address_080', 'fk08_008_080_order')->references('id_077')
					->on('008_077_address')->onDelete('set null')->onUpdate('cascade');
				$table->foreign('laboratory_080', 'fk09_008_080_order')->references('id_073')
					->on('008_073_laboratory')->onDelete('restrict')->onUpdate('cascade');

				$table->foreign('country_080', 'fk10_008_080_order')->references('id_002')->on('001_002_country')
					->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('territorial_area_1_080', 'fk11_008_080_order')->references('id_003')->on('001_003_territorial_area_1')
					->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('territorial_area_2_080', 'fk12_008_080_order')->references('id_004')->on('001_004_territorial_area_2')
					->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('territorial_area_3_080', 'fk13_008_080_order')->references('id_005')->on('001_005_territorial_area_3')
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
		if(Schema::hasTable('008_080_stock'))
		{
			Schema::drop('008_080_stock');
		}
	}
}