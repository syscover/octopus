<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OctopusCreateTableSolicitud extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('008_077_solicitud', function($table)
        {
            $table->engine = 'InnoDB';

            //ids
            $table->increments('id_077')->unsigned();
            $table->integer('pedido_077')->unsigned();
            $table->integer('entregado_077')->unsigned();

            //delegado
            $table->integer('id_del_077')->unsigned();
            $table->string('name_del_077',50)->nullable();
            $table->string('surname_del_077',50)->nullable();
            $table->string('email_del_077',50)->nullable();

            //cliente
            $table->integer('id_cli_077')->unsigned();
            $table->string('codigo_cli_077',50)->nullable();
            $table->string('razon_social_cli_077',100)->nullable();
            $table->string('country_cli_077',2);
            $table->string('territorial_area_1_cli_077',6)->nullable();
            $table->string('territorial_area_2_cli_077',10)->nullable();
            $table->string('territorial_area_3_cli_077',10)->nullable();
            $table->string('cp_cli_077',10)->nullable();
            $table->string('localidad_cli_077',100)->nullable();
            $table->string('direccion_cli_077',150)->nullable();
            $table->string('contacto_cli_077',100)->nullable();
            $table->string('telefono_cli_077',50)->nullable();
            $table->string('email_cli_077',100)->nullable();

            //punto de venta
            $table->integer('id_pv_077')->unsigned();
            $table->string('razon_social_pv_077',100)->nullable();
            $table->string('country_pv_077',2);
            $table->string('territorial_area_1_pv_077',6)->nullable();
            $table->string('territorial_area_2_pv_077',10)->nullable();
            $table->string('territorial_area_3_pv_077',10)->nullable();
            $table->string('cp_pv_077',10)->nullable();
            $table->string('localidad_pv_077',100)->nullable();
            $table->string('direccion_pv_077',150)->nullable();
            $table->string('contacto_pv_077',100)->nullable();
            $table->string('telefono_pv_077',50)->nullable();
            $table->string('email_pv_077',100)->nullable();

            //direccion de envío
            $table->integer('id_de_077')->unsigned();
            $table->string('razon_social_de_077',100)->nullable();
            $table->string('country_de_077',2);
            $table->string('territorial_area_1_de_077',6)->nullable();
            $table->string('territorial_area_2_de_077',10)->nullable();
            $table->string('territorial_area_3_de_077',10)->nullable();
            $table->string('cp_de_077',10)->nullable();
            $table->string('localidad_de_077',100)->nullable();
            $table->string('direccion_de_077',150)->nullable();
            $table->string('contacto_de_077',100)->nullable();
            $table->string('telefono_de_077',50)->nullable();
            $table->string('email_de_077',100)->nullable();

            //empresa
            $table->integer('id_buss_077')->unsigned();
            $table->string('razon_social_buss_077', 100);

            //familia
            $table->integer('id_fam_077')->unsigned();
            $table->string('nombre_fam_077', 50);

            //marca
            $table->integer('id_trd_077')->unsigned();
            $table->string('nombre_trd_077', 50);

            //producto
            $table->integer('id_pr_077')->unsigned();
            $table->string('nombre_pr_077', 50);

            //solicitud
            $table->integer('fecha_077')->unsigned();
            $table->decimal('vista_height_077', 6, 2);
            $table->decimal('vista_width_077', 6, 2);
            $table->decimal('total_height_077', 6, 2);
            $table->decimal('total_width_077', 6, 2);
            $table->smallInteger('unidades_077')->unsigned();
            $table->integer('caducidad_077')->nullable()->unsigned()->default(0);
            $table->string('adjunto_077',255)->nullable();

            $table->text('observaciones_077')->nullable();

            $table->timestamps();

            //relaciones
            $table->foreign('id_del_077')->references('id_010')
                ->on('001_010_user')->onDelete('restrict')->onUpdate('cascade');

            //cliente
            $table->foreign('id_cli_077')->references('id_075')->on('008_075_cliente')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('country_cli_077')->references('id_002')->on('001_002_country')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_1_cli_077')->references('id_003')->on('001_003_territorial_area_1')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_2_cli_077')->references('id_004')->on('001_004_territorial_area_2')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_3_cli_077')->references('id_005')->on('001_005_territorial_area_3')
                ->onDelete('restrict')->onUpdate('cascade');

            //punto de venta
            $table->foreign('id_pv_077')->references('id_076')->on('008_076_punto_venta')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('country_pv_077')->references('id_002')->on('001_002_country')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_1_pv_077')->references('id_003')->on('001_003_territorial_area_1')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_2_pv_077')->references('id_004')->on('001_004_territorial_area_2')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_3_pv_077')->references('id_005')->on('001_005_territorial_area_3')
                ->onDelete('restrict')->onUpdate('cascade');

            //dirección de envío
            $table->foreign('country_de_077')->references('id_002')->on('001_002_country')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_1_de_077')->references('id_003')->on('001_003_territorial_area_1')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_2_de_077')->references('id_004')->on('001_004_territorial_area_2')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_3_de_077')->references('id_005')->on('001_005_territorial_area_3')
                ->onDelete('restrict')->onUpdate('cascade');

            //empresa
            $table->foreign('id_buss_077')->references('id_074')
                ->on('008_074_empresa')->onDelete('restrict')->onUpdate('cascade');

            //familia
            $table->foreign('id_fam_077')->references('id_070')
                ->on('008_070_familia')->onDelete('restrict')->onUpdate('cascade');

            //marca
            $table->foreign('id_trd_077')->references('id_071')
                ->on('008_071_marca')->onDelete('restrict')->onUpdate('cascade');

            //producto
            $table->foreign('id_pr_077')->references('id_072')
                ->on('008_072_producto')->onDelete('restrict')->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('008_077_solicitud');
	}

}
