<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_alat')->unsigned();
            $table->integer('id_pengguna')->unsigned();
            $table->timestamp('dipinjam')->default('0000-00-00 00:00:00');
            $table->timestamp('dikembalikan')->default('0000-00-00 00:00:00');
            $table->text('keterangan');
            //$table->timestamps();

            // Foreign key
            $table->foreign('id_alat')->references('id')->on('alat')->onDelete('cascade');
            $table->foreign('id_pengguna')->references('id')->on('peminjam')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaksi');
    }
}
