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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->string('name');
            $table->string('username');
            $table->string('password');
            $table->string('no_telp');
            $table->string('image_url')->nullable();
            $table->string('ttl')->nullable();
            $table->string('gender')->nullable();
            $table->string('unit')->nullable();
            $table->string('tmt')->nullable();
            $table->string('penempatan')->nullable();
            $table->string('role');
            $table->bigInteger('event_id');
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
};
