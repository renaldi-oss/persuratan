<?php

use App\Models\KodeSurat;
use App\Models\Pekerjaan;
use App\Models\WorkOrder;
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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(WorkOrder::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(KodeSurat::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
