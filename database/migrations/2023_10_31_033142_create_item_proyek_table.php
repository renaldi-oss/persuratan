<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('item_proyek', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_prc_req');
            $table->string('nama', 255);
            $table->string('merk', 255);
            $table->float('qty');
            $table->float('est_price');
            $table->float('price');
            $table->timestamps();

            $table->foreign('id_prc_req')->references('id')->on('purchase_req');
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_proyek');
    }
};
