<?php

use App\Models\Instansi;
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
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdfor(Instansi::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_proyek');
            $table->string('pekerjaan');
            $table->string('lokasi');
            $table->string('no_po')->nullable();
            $table->timestamp('due_date');
            $table->enum('status', ['pending', 'on_going', 'over_time', 'done']);
            // penyimpanan file hanya path saja
            $table->string('file_po')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyeks');
    }
};
