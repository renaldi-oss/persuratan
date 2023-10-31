<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_wo');
            $table->string('nama', 255);
            $table->string('tipe', 255);
            $table->float('jumlah');
            $table->timestamps();

            $table->foreign('id_wo')->references('id')->on('work_order');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mat');
    }
};

