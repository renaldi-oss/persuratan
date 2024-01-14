<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_order_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('material_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->integer('qty');
            $table->enum('pembelian',['online','offline']);
            $table->enum('status',['belum','sudah'])->default('belum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklists');
    }
};
