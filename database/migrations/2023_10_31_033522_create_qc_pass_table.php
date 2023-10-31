<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('qc_pass', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proyek');
            $table->string('nama', 255);
            $table->float('jumlah');
            $table->string('tipe', 255);
            $table->string('ket', 255);
            $table->binary('gambar')->nullable();
            $table->timestamps();

            $table->foreign('id_proyek')->references('id')->on('proyek');
        });
    }

    public function down()
    {
        Schema::dropIfExists('qc_pass');
    }
};
