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
        Schema::create('item_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignIdfor(PurchaseOrder::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_item');
            $table->string('merk');
            $table->integer('qty');
            $table->integer('estimated_price');
            $table->integer('actual_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_purchases');
    }
};
