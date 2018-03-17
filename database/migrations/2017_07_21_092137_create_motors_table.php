<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_merk')->unsigned();
            $table->integer('id_kategori')->unsigned();
            $table->string('nama_motor');
            $table->integer('tahun_keluar');
            $table->string('no_stnk');
            $table->string('mesin');
            $table->string('harga_beli');
            $table->string('harga_jual');
            $table->string('warna');
            $table->string('gambar')->nullable();
            $table->timestamps();

             $table->foreign('id_merk')->references('id')->on('merks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motors');
    }
}
