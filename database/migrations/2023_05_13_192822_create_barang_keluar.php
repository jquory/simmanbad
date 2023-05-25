<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->unsignedBigInteger('id_barang');
            $table->foreign('id_barang')
            ->references('id')
            ->on('barang')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('nama_barang');
            $table->string('kode_barang');
            $table->string('satuan');
            $table->integer('jumlah_keluar');
            $table->string('waktu_keluar');
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
        Schema::dropIfExists('barang_keluar');
    }
};
