<?php

use App\Models\Pekerjaan;
use App\Models\Surat;
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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdfor(Pekerjaan::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdfor(Surat::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->text('target')->nullable();
            $table->string('resiko')->nullable();
            $table->timestamp('due_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_orders');
    }
};
