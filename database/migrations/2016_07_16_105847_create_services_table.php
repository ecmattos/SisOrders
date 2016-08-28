<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->string('description', 200)->nullable();
            $table->string('unit', 3)->nullable();
            $table->double('cost_value', 15, 2)->default(0);
            $table->double('sale_value', 15, 2)->default(0);
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
		Schema::drop('services');
	}

}
