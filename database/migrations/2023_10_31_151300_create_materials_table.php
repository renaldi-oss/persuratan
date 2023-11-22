<?php

use App\Models\PurchaseOrder;
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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('brand');
            $table->integer('qty');
            $table->integer('estimated_price');
            $table->integer('real_price')->nullable();
            $table->enum('toko', ['offline', 'online']);
            $table->enum('tipe', ['primary', 'additional']);
            // sub total dihitung di frontend
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
