<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('proyek', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proyek', 255);
            $table->unsignedBigInteger('id_instansi');
            $table->string('pekerjaan', 255);
            $table->string('lokasi', 255);
            $table->string('due_date', 255);
            $table->string('no_po', 255);
            $table->binary('file_po')->nullable();
            $table->timestamps();

            $table->foreign('id_instansi')->references('id')->on('instansi');
        });
    }

    public function down()
    {
        Schema::dropIfExists('proyek');
    }
};

