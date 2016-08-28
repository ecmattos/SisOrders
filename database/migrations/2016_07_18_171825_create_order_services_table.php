<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderServicesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_services', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->default(1);
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('service_id')->unsigned()->default(1);
            $table->foreign('service_id')->references('id')->on('services');
            $table->double('service_qty', 15, 2)->default(0);
            $table->double('sale_value', 15, 2)->default(0);
            $table->double('factor', 15, 2)->default(0);
            $table->double('discount', 15, 2)->default(0);
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
		Schema::drop('order_services');
	}

}
