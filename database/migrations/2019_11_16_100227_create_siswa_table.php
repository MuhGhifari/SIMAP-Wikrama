<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siswa', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('nisn')->unique();
			$table->string('nis')->unique();
			$table->string('nama');
			$table->string('jk');
			$table->string('agama');
			$table->integer('rayon_id')->nullable();
			$table->integer('rombel_id')->nullable();
			$table->string('telp')->nullable();
			$table->text('alamat')->nullable();
			$table->date('tanggal_lahir')->nullable();
			$table->string('tempat_lahir')->nullable();
			$table->string('asal_sekolah')->nullable();
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
		Schema::dropIfExists('siswa');
	}
}
