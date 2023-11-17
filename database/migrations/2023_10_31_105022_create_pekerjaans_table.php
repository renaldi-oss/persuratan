<?php

use App\Models\Instansi;
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
        Schema::create('pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdfor(Instansi::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('no_surat')->unique();
            $table->string('nama');
            $table->string('lokasi');
            $table->text('deskripsi');
            $table->string('jenis');
            $table->string('to_email');
            $table->string('to_attn');
            $table->string('no_kontrak')->nullable();
            $table->integer('nominal')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->enum('status', ['penawaran', 'on-going', 'over-time', 'done'])->default('penawaran');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaans');
    }
};
