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
        Schema::create('persuratan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proyek');
            $table->unsignedBigInteger('id_kode');
            $table->string('tipe_surat', 255);
            $table->binary('scan')->nullable();
            $table->timestamps();

            $table->foreign('id_proyek')->references('id')->on('proyek');
            $table->foreign('id_kode')->references('id')->on('kode_surats');
        });
    }

    public function down()
    {
        Schema::dropIfExists('persuratan');
    }
};
