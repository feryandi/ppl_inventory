<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_barang')->unsigned();
            $table->integer('id_pengguna')->unsigned();
            $table->timestamp('mulai');
            $table->timestamp('selesai');
            $table->text('keterangan');
            //$table->timestamps();

            // Foreign key
            $table->foreign('id_barang')->references('id')->on('barang');
            $table->foreign('id_pengguna')->references('id')->on('peminjam');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('booking');
    }
}
