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
        Schema::create('operational_req', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proyek');
            $table->string('tanggal', 255);
            $table->string('kegiatan', 255);
            $table->unsignedBigInteger('id_instansi');
            $table->string('lokasi', 255);
            $table->float('jumlah');
            $table->timestamps();

            $table->foreign('id_proyek')->references('id')->on('proyek');
            $table->foreign('id_instansi')->references('id')->on('instansi');
        });
    }

    public function down()
    {
        Schema::dropIfExists('operational_req');
    }
};
