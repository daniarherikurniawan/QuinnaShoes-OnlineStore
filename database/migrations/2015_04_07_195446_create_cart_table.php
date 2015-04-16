<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cart', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer ('id_user');
			$table->integer('jumlah')->default(1);
			$table->integer('id_product');
			$table->integer('ukuran');
			$table->integer('id_pesanan')->default(0);
			$table->string('status')->default('unremove');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cart');
	}

}
