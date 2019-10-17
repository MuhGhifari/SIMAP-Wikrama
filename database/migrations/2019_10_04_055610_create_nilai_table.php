<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nilai', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('id_siswa');
			$table->integer('id_mapel');
			$table->integer('uh1');
			$table->integer('uh2');
			$table->integer('uh3');
			$table->integer('uh4');
			$table->integer('uh5');
			$table->integer('uh6');
			$table->integer('uh7');
			$table->integer('uh8');
			$table->integer('uts1');
			$table->integer('uas');
			$table->integer('uts2');
			$table->integer('ukk');
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
		Schema::dropIfExists('nilai');
	}
}
