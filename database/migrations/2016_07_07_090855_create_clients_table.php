<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
                  $table->increments('id');
                  $table->integer('client_type_id')->unsigned()->default(1);
                  $table->foreign('client_type_id')->references('id')->on('client_types');
                  $table->integer('city_id')->unsigned()->default(1);
                  $table->foreign('city_id')->references('id')->on('cities');
                  $table->string('code', 14)->nullable();
                  $table->string('description', 100)->nullable();
                  $table->string('description_short', 50)->nullable();
                  $table->string('address', 100)->nullable();
                  $table->string('zip_code', 10)->nullable();
                  $table->string('neighborhood', 30)->nullable();
                  $table->string('contact', 30)->nullable();
                  $table->string('phone', 11)->nullable();
                  $table->string('mobile', 11)->nullable();
                  $table->string('email', 50)->nullable();
                  $table->string('comments', 200)->nullable();  
                  $table->timestamps();
                  $table->softDeletes();

                  $table->index(['description', 'description_short']);
                  $table->index(['client_type_id']);
                  $table->index(['code']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients');
	}

}
