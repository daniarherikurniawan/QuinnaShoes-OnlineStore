<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesananTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	Schema::create('pesanan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer ('id_user');
			$table->integer ('id_detail_pemesanan')->default(0);
			$table->string('nama_gambar');
			$table->string ('deadline');
			$table->string ('deskripsi_pemesanan');
			$table->string ('alamat');
			$table->string ('jenis_pembayaran');
			$table->integer('jumlah')->default(1);
			$table->string('deskripsi_ukuran');
			$table->string('no_telepon');
			$table->string('status')->default('Pending');
			$table->string('deleted')->default('false');
			$table->integer('total_bayar')->default(0);
			$table->string('tipe')->default('pesanan');
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
		Schema::drop('pesanan');
	}

}
