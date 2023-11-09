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
        Schema::create('operationals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdfor(Pekerjaan::class)->constrained()->onUpdate('cascade')->onDelete('cascade');            
            $table->string('kegiatan');
            $table->string('lokasi'); 
            $table->integer('jumlah');
            $table->enum('status' , ['pending','manager','finance']);
            $table->timestamp('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operationals');
    }
};
