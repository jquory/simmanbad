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
        Schema::create('stock', function (Blueprint $table) {
            $table->uuid('id');
            $table->unsignedBigInteger('id_barang');
            $table->foreign('id_barang')
            ->references('id')
            ->on('barang')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('stok_awal')->default(0);
            $table->integer('stok_akhir')->default(0);
            $table->timestamps();

            $table->primary('id');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
};
