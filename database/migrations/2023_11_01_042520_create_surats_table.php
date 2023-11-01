<?php

use App\Models\KodeSurat;
use App\Models\Proyek;
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
            $table->foreignIdfor(Proyek::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdfor(KodeSurat::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('file')->nullable();
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
