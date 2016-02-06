<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemeliharaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeliharaan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_alat')->unsigned();
            $table->timestamp('mulai')->default('0000-00-00 00:00:00');
            $table->timestamp('selesai')->default('0000-00-00 00:00:00');
            $table->integer('status');
            //$table->timestamps();

            // Foreign key
            $table->foreign('id_alat')->references('id')->on('alat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pemeliharaan');
    }
}
