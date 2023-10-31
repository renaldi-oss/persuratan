<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('instansi', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->string('alamat', 255);
            $table->string('kontak', 255);
            $table->string('email', 255);
            $table->string('lokasi', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('instansi');
    }
};
