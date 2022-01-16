<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjadwalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjadwalans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barang')->unsigned();
            $table->unsignedBigInteger('id_status')->unsigned();
            $table->date('jadwal_penjadwalan');
            $table->timestamps();

            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('cascade');
            $table->foreign('id_status')->references('id')->on('status_penjadwalans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjadwalans');
    }
}
