<?php

use App\Models\Pekerjaan;
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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pekerjaan::class)->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('surat_no');
            $table->string('pekerjaan');
            $table->string('requester');
            $table->string('division');
            $table->enum('status', ['pending', 'manager', 'accepted'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
