<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiBelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_belis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('motorjual_id')->unsigned();
            $table->integer('penjual_id')->unsigned();
            $table->date('tgl');
            $table->integer('total_harga');
            $table->timestamps();


            
            $table->foreign('motorjual_id')->references('id')->on('motors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('penjual_id')->references('id')->on('konsumens')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_belis');
    }
}
