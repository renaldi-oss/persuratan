<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('work_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proyek');
            $table->string('kode_wo', 255);
            $table->timestamps();

            $table->foreign('id_proyek')->references('id')->on('proyek');
        });
    }

    public function down()
    {
        Schema::dropIfExists('work_order');
    }
};
