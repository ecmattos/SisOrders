<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contracts', function(Blueprint $table) {
            $table->increments('id');            
            $table->string('code', 15);
            $table->string('description', 100);
            $table->integer('client_id')->unsigned()->default(1);
            $table->foreign('client_id')->references('id')->on('clients');
            $table->integer('manager_id')->unsigned()->default(1);
            $table->foreign('manager_id')->references('id')->on('users');
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->double('factor_service', 15, 2)->default(1);
            $table->double('factor_material', 15, 2)->default(1);
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
		Schema::drop('contracts');
	}

}
