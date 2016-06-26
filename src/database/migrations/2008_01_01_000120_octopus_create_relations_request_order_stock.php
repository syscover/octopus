<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class OctopusCreateRelationsRequestOrderStock extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(Schema::hasTable('008_078_request'))
		{
			Schema::table('008_078_request', function (Blueprint $table) {
				$table->foreign('order_078', 'fk13_008_078_request')->references('id_079')->on('008_079_order')
					->onDelete('set null')->onUpdate('cascade');
				$table->foreign('stock_078', 'fk14_008_078_request')->references('id_080')->on('008_080_stock')
					->onDelete('set null')->onUpdate('cascade');
			});
		}

		if(Schema::hasTable('008_079_order'))
		{
			Schema::table('008_079_order', function (Blueprint $table) {
				$table->foreign('request_079', 'fk14_008_079_order')->references('id_078')->on('008_078_request')
					->onDelete('set null')->onUpdate('cascade');
				$table->foreign('stock_079', 'fk15_008_079_order')->references('id_080')->on('008_080_stock')
					->onDelete('set null')->onUpdate('cascade');
			});
		}

		if(Schema::hasTable('008_080_stock'))
		{
			Schema::table('008_080_stock', function (Blueprint $table) {
				$table->foreign('request_080', 'fk14_008_080_stock')->references('id_078')->on('008_078_request')
					->onDelete('set null')->onUpdate('cascade');
				$table->foreign('order_080', 'fk15_008_080_stock')->references('id_079')->on('008_079_order')
					->onDelete('set null')->onUpdate('cascade');
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
		if(Schema::hasTable('008_078_request'))
		{
			$key = DB::select(DB::raw('SHOW KEYS FROM 008_078_request WHERE Key_name=\'fk13_008_078_request\''));
			if($key != null)
			{
				Schema::table('008_078_request', function (Blueprint $table) {
					$table->dropForeign('fk13_008_078_request');
					$table->dropIndex('fk13_008_078_request');
				});
			}

			$key = DB::select(DB::raw('SHOW KEYS FROM 008_078_request WHERE Key_name=\'fk14_008_078_request\''));
			if($key != null)
			{
				Schema::table('008_078_request', function (Blueprint $table) {
					$table->dropForeign('fk14_008_078_request');
					$table->dropIndex('fk14_008_078_request');
				});
			}
		}

		if(Schema::hasTable('008_079_order'))
		{
			$key = DB::select(DB::raw('SHOW KEYS FROM 008_079_order WHERE Key_name=\'fk14_008_079_order\''));
			if($key != null)
			{
				Schema::table('008_079_order', function (Blueprint $table) {
					$table->dropForeign('fk14_008_079_order');
					$table->dropIndex('fk14_008_079_order');
				});
			}

			$key = DB::select(DB::raw('SHOW KEYS FROM 008_078_request WHERE Key_name=\'fk15_008_079_order\''));
			if($key != null)
			{

				Schema::table('008_079_order', function (Blueprint $table) {
					$table->dropForeign('fk15_008_079_order');
					$table->dropIndex('fk15_008_079_order');
				});
			}
		}

		if(Schema::hasTable('008_080_stock'))
		{
			$key = DB::select(DB::raw('SHOW KEYS FROM 008_079_order WHERE Key_name=\'fk14_008_080_stock\''));
			if($key != null)
			{
				Schema::table('008_080_stock', function (Blueprint $table) {
					$table->dropForeign('fk14_008_080_stock');
					$table->dropIndex('fk14_008_080_stock');
				});
			}

			$key = DB::select(DB::raw('SHOW KEYS FROM 008_078_request WHERE Key_name=\'fk15_008_080_stock\''));
			if($key != null)
			{
				Schema::table('008_080_stock', function (Blueprint $table) {
					$table->dropForeign('fk15_008_080_stock');
					$table->dropIndex('fk15_008_080_stock');
				});
			}
		}
	}
}