<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Libraries\DBLibrary;

class OctopusUpdateV2 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// change brand_072
		DBLibrary::renameColumnWithForeignKey('008_072_product', 'brand_072', 'brand_id_072', 'INT', 10, true, false, 'fk01_008_072_product', '008_071_brand', 'id_071', 'cascade', 'cascade');

		// change country_073
		DBLibrary::renameColumnWithForeignKey('008_073_laboratory', 'country_073', 'country_id_073', 'VARCHAR', 2, false, false, 'fk01_008_073_laboratory', '001_002_country', 'id_002');
		// change territorial_area_1_073
		DBLibrary::renameColumnWithForeignKey('008_073_laboratory', 'territorial_area_1_073', 'territorial_area_1_id_073', 'VARCHAR', 6, false, true, 'fk02_008_073_laboratory', '001_003_territorial_area_1', 'id_003');
		// change territorial_area_2_073
		DBLibrary::renameColumnWithForeignKey('008_073_laboratory', 'territorial_area_2_073', 'territorial_area_2_id_073', 'VARCHAR', 10, false, true, 'fk03_008_073_laboratory', '001_004_territorial_area_2', 'id_004');
		// change territorial_area_3_073
		DBLibrary::renameColumnWithForeignKey('008_073_laboratory', 'territorial_area_3_073', 'territorial_area_3_id_073', 'VARCHAR', 10, false, true, 'fk04_008_073_laboratory', '001_005_territorial_area_3', 'id_005');

		// change country_074
		DBLibrary::renameColumnWithForeignKey('008_074_company', 'country_074', 'country_id_074', 'VARCHAR', 2, false, false, 'fk01_008_074_company', '001_002_country', 'id_002');
		// change territorial_area_1_074
		DBLibrary::renameColumnWithForeignKey('008_074_company', 'territorial_area_1_074', 'territorial_area_1_id_074', 'VARCHAR', 6, false, true, 'fk02_008_074_company', '001_003_territorial_area_1', 'id_003');
		// change territorial_area_2_074
		DBLibrary::renameColumnWithForeignKey('008_074_company', 'territorial_area_2_074', 'territorial_area_2_id_074', 'VARCHAR', 10, false, true, 'fk03_008_074_company', '001_004_territorial_area_2', 'id_004');
		// change territorial_area_3_074
		DBLibrary::renameColumnWithForeignKey('008_074_company', 'territorial_area_3_074', 'territorial_area_3_id_074', 'VARCHAR', 10, false, true, 'fk04_008_074_company', '001_005_territorial_area_3', 'id_005');

		// change country_075
		DBLibrary::renameColumnWithForeignKey('008_075_customer', 'country_075', 'country_id_075', 'VARCHAR', 2, false, false, 'fk01_008_075_customer', '001_002_country', 'id_002');
		// change territorial_area_1_075
		DBLibrary::renameColumnWithForeignKey('008_075_customer', 'territorial_area_1_075', 'territorial_area_1_id_075', 'VARCHAR', 6, false, true, 'fk02_008_075_customer', '001_003_territorial_area_1', 'id_003');
		// change territorial_area_2_075
		DBLibrary::renameColumnWithForeignKey('008_075_customer', 'territorial_area_2_075', 'territorial_area_2_id_075', 'VARCHAR', 10, false, true, 'fk03_008_075_customer', '001_004_territorial_area_2', 'id_004');
		// change territorial_area_3_075
		DBLibrary::renameColumnWithForeignKey('008_075_customer', 'territorial_area_3_075', 'territorial_area_3_id_075', 'VARCHAR', 10, false, true, 'fk04_008_075_customer', '001_005_territorial_area_3', 'id_005');

		// change customer_076
		DBLibrary::renameColumnWithForeignKey('008_076_shop', 'customer_076', 'customer_id_076', 'INT', 10, true, false, 'fk01_008_076_shop', '008_075_customer', 'id_075', 'cascade', 'cascade');
		// change country_076
		DBLibrary::renameColumnWithForeignKey('008_076_shop', 'country_076', 'country_id_076', 'VARCHAR', 2, false, false, 'fk02_008_076_shop', '001_002_country', 'id_002');
		// change territorial_area_1_076
		DBLibrary::renameColumnWithForeignKey('008_076_shop', 'territorial_area_1_076', 'territorial_area_1_id_076', 'VARCHAR', 6, false, true, 'fk03_008_076_shop', '001_003_territorial_area_1', 'id_003');
		// change territorial_area_2_076
		DBLibrary::renameColumnWithForeignKey('008_076_shop', 'territorial_area_2_076', 'territorial_area_2_id_076', 'VARCHAR', 10, false, true, 'fk04_008_076_shop', '001_004_territorial_area_2', 'id_004');
		// change territorial_area_3_076
		DBLibrary::renameColumnWithForeignKey('008_076_shop', 'territorial_area_3_076', 'territorial_area_3_id_076', 'VARCHAR', 10, false, true, 'fk05_008_076_shop', '001_005_territorial_area_3', 'id_005');

		// change shop_077
		DBLibrary::renameColumnWithForeignKey('008_077_address', 'shop_077', 'shop_id_077', 'INT', 10, true, false, 'fk01_008_077_address', '008_076_shop', 'id_076', 'cascade', 'cascade');
		// change country_077
		DBLibrary::renameColumnWithForeignKey('008_077_address', 'country_077', 'country_id_077', 'VARCHAR', 2, false, false, 'fk01_008_077_address', '001_002_country', 'id_002');
		// change territorial_area_1_077
		DBLibrary::renameColumnWithForeignKey('008_077_address', 'territorial_area_1_077', 'territorial_area_1_id_077', 'VARCHAR', 6, false, true, 'fk02_008_077_address', '001_003_territorial_area_1', 'id_003');
		// change territorial_area_2_077
		DBLibrary::renameColumnWithForeignKey('008_077_address', 'territorial_area_2_077', 'territorial_area_2_id_077', 'VARCHAR', 10, false, true, 'fk03_008_077_address', '001_004_territorial_area_2', 'id_004');
		// change territorial_area_3_077
		DBLibrary::renameColumnWithForeignKey('008_077_address', 'territorial_area_3_077', 'territorial_area_3_id_077', 'VARCHAR', 10, false, true, 'fk04_008_077_address', '001_005_territorial_area_3', 'id_005');
		// change custom_field_group_077
		DBLibrary::renameColumnWithForeignKey('008_077_address', 'custom_field_group_077', 'field_group_id_077', 'INT', 10, true, true, 'fk05_008_077_address', '001_025_field_group', 'id_025');

		// change supervisor_078
		DBLibrary::renameColumnWithForeignKey('008_078_request', 'supervisor_078', 'supervisor_id_078', 'INT', 10, true, false, 'fk01_008_078_request', '001_010_user', 'id_010');
		// change customer_078
		DBLibrary::renameColumnWithForeignKey('008_078_request', 'customer_078', 'customer_id_078', 'INT', 10, true, true, 'fk02_008_078_request', '008_075_customer', 'id_075', 'set null', 'cascade');
		// change shop_078
		DBLibrary::renameColumnWithForeignKey('008_078_request', 'shop_078', 'shop_id_078', 'INT', 10, true, true, 'fk03_008_078_request', '008_076_shop', 'id_076', 'set null', 'cascade');
		// change company_078
		DBLibrary::renameColumnWithForeignKey('008_078_request', 'company_078', 'company_id_078', 'INT', 10, true, false, 'fk04_008_078_request', '008_074_company', 'id_074');
		// change family_078
		DBLibrary::renameColumnWithForeignKey('008_078_request', 'family_078', 'family_id_078', 'INT', 10, true, false, 'fk05_008_078_request', '008_070_family', 'id_070');
		// change brand_078
		DBLibrary::renameColumnWithForeignKey('008_078_request', 'brand_078', 'brand_id_078', 'INT', 10, true, false, 'fk06_008_078_request', '008_071_brand', 'id_071');
		// change product_078
		DBLibrary::renameColumnWithForeignKey('008_078_request', 'product_078', 'product_id_078', 'INT', 10, true, false, 'fk07_008_078_request', '008_072_product', 'id_072');
		// change id_address_078
		DBLibrary::renameColumnWithForeignKey('008_078_request', 'id_address_078', 'address_id_078', 'INT', 10, true, true, 'fk08_008_078_request', '008_077_address', 'id_077');

		// change supervisor_079
		DBLibrary::renameColumnWithForeignKey('008_079_order', 'supervisor_079', 'supervisor_id_079', 'INT', 10, true, false, 'fk01_008_079_order', '001_010_user', 'id_010');
		// change customer_079
		DBLibrary::renameColumnWithForeignKey('008_079_order', 'customer_079', 'customer_id_079', 'INT', 10, true, true, 'fk02_008_079_order', '008_075_customer', 'id_075', 'set null', 'cascade');
		// change shop_079
		DBLibrary::renameColumnWithForeignKey('008_079_order', 'shop_079', 'shop_id_079', 'INT', 10, true, true, 'fk03_008_079_order', '008_076_shop', 'id_076', 'set null', 'cascade');
		// change company_079
		DBLibrary::renameColumnWithForeignKey('008_079_order', 'company_079', 'company_id_079', 'INT', 10, true, false, 'fk04_008_079_order', '008_074_company', 'id_074');
		// change family_079
		DBLibrary::renameColumnWithForeignKey('008_079_order', 'family_079', 'family_id_079', 'INT', 10, true, false, 'fk05_008_079_order', '008_070_family', 'id_070');
		// change brand_079
		DBLibrary::renameColumnWithForeignKey('008_079_order', 'brand_079', 'brand_id_079', 'INT', 10, true, false, 'fk06_008_079_order', '008_071_brand', 'id_071');
		// change product_079
		DBLibrary::renameColumnWithForeignKey('008_079_order', 'product_079', 'product_id_079', 'INT', 10, true, false, 'fk07_008_079_order', '008_072_product', 'id_072');
		// change id_address_079
		DBLibrary::renameColumnWithForeignKey('008_079_order', 'id_address_079', 'address_id_079', 'INT', 10, true, true, 'fk08_008_079_order', '008_077_address', 'id_077', 'set null', 'cascade');
		// change laboratory_079
		DBLibrary::renameColumnWithForeignKey('008_079_order', 'laboratory_079', 'laboratory_id_079', 'INT', 10, true, false, 'fk09_008_079_order', '008_073_laboratory', 'id_073');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){}
}