<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrimonialsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patrimonials', function(Blueprint $table) {
            $table->increments('id');

            $table->string('code', 20)->nullable();
            $table->string('code_client', 20)->nullable();

            $table->integer('client_id')->unsigned()->default(1);
            $table->foreign('client_id')->references('id')->on('clients');

            $table->integer('patrimonial_type_id')->unsigned()->default(1);
            $table->foreign('patrimonial_type_id')->references('id')->on('patrimonial_types');

            $table->integer('patrimonial_sub_type_id')->unsigned()->default(1);
            $table->foreign('patrimonial_sub_type_id')->references('id')->on('patrimonial_sub_types');

            $table->integer('patrimonial_brand_id')->unsigned()->default(1);
            $table->foreign('patrimonial_brand_id')->references('id')->on('patrimonial_brands');

            $table->integer('patrimonial_model_id')->unsigned()->default(1);
            $table->foreign('patrimonial_model_id')->references('id')->on('patrimonial_models');

            $table->string('description', 200)->nullable();
            $table->string('serial', 25)->nullable();
            $table->string('comments', 200)->nullable();
  
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
		Schema::drop('patrimonials');
	}

}
