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
        Schema::create('pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdfor(Instansi::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->string('lokasi');
            $table->string('deskripsi');
            $table->string('jenis');
            // table ini sementara tidak perlu karena sudah ada di instansi
            // $table->string('to_email');
            // $table->string('to_attn');
            // $table->string('kontak');
            $table->integer('nominal')->nullable();
            $table->string('no_surat')->nullable();
            $table->string('file')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected']);
            $table->timestamps();
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
