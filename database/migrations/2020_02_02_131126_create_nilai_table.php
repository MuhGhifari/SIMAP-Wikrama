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
            $table->Increments('id');
            $table->integer('siswa_id');
            $table->integer('rombel_id');
            $table->integer('guru_id');
            $table->integer('uh1')->nullable();
            $table->integer('uh2')->nullable();
            $table->integer('uh1k')->nullable();
            $table->integer('uh2k')->nullable();
            $table->integer('uts_ganjil')->nullable();
            $table->integer('uh3')->nullable();
            $table->integer('uh4')->nullable();
            $table->integer('uh3k')->nullable();
            $table->integer('uh4k')->nullable();
            $table->integer('uas_ganjil')->nullable();
            $table->integer('uh5')->nullable();
            $table->integer('uh6')->nullable();
            $table->integer('uh5k')->nullable();
            $table->integer('uh6k')->nullable();
            $table->integer('uts_genap')->nullable();
            $table->integer('uh7')->nullable();
            $table->integer('uh8')->nullable();
            $table->integer('uh7k')->nullable();
            $table->integer('uh8k')->nullable();
            $table->integer('uas_genap')->nullable();
            $table->timestamps();
            $table->unique(['siswa_id', 'guru_id']);
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
