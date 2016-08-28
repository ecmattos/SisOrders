<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
                  $table->increments('id');
                  $table->integer('patrimonial_id')->unsigned()->default(1);
                  $table->foreign('patrimonial_id')->references('id')->on('patrimonials');
                  $table->integer('contract_id')->unsigned()->default(1);
                  $table->foreign('contract_id')->references('id')->on('contracts');
                  $table->string('requested_services', 250)->nullable();
                  $table->string('request_doc', 20)->nullable();
                  $table->string('requester', 20)->nullable();
                  $table->string('phone', 11)->nullable();
                  $table->datetime('date_check_in')->nullable();
                  $table->datetime('date_check_out')->nullable();
                  $table->integer('order_status_id')->unsigned()->default(1);
                  $table->foreign('order_status_id')->references('id')->on('order_statuses');
                  $table->datetime('date_status_1')->nullable();
                  $table->datetime('date_status_2')->nullable();
                  $table->datetime('date_status_3')->nullable();
                  $table->datetime('date_status_4')->nullable();
                  $table->datetime('date_status_5')->nullable();
                  $table->datetime('date_status_6')->nullable();
                  $table->datetime('date_status_7')->nullable();
                  $table->string('cart_code', 20)->nullable();
                  $table->datetime('cart_date')->nullable();
                  $table->double('delivery_time_days', 2,0)->nullable();
                  $table->string('payment_condition', 40)->nullable();
                  $table->string('portage', 40)->nullable();
                  $table->string('comments', 200)->nullable();  
                  $table->timestamps();
                  $table->softDeletes();

                  $table->index(['patrimonial_id']);
                  $table->index(['contract_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
