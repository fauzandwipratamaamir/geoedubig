<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->nullable();
            $table->string('subjek')->nullable();
            $table->text('pesan');

            // rating 1-5 (optional, bikin keren)
            $table->unsignedTinyInteger('rating')->nullable();

            // kategori: saran/bug/pertanyaan
            $table->string('tipe')->default('Saran');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
