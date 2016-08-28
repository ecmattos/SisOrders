<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('materials', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 20);
            $table->string('description', 200)->nullable();
            $table->integer('material_unit_id')->unsigned()->default(1);
            $table->foreign('material_unit_id')->references('id')->on('material_units');
            $table->double('cost_value', 15, 2)->default(0);
            $table->double('sale_value', 15, 2)->default(0);
            $table->double('stock_qty', 15, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('materials');
	}

}
