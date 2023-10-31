<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('purchase_req', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proyek');
            $table->string('kode_prc_req', 255);
            $table->timestamps();

            $table->foreign('id_proyek')->references('id')->on('proyek');
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchase_req');
    }
};

