<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerima', function (Blueprint $table) {
            $table->string('id');
            $table->integer('nik')->unique();
            $table->string('nama');
            $table->string('alamat');
            $table->integer('no_hp')->unique();
            $table->integer('gaji');
            $table->string('pekerjaan');
            $table->integer('tanggungan');
            $table->integer('umur');
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penerima');
    }
}
