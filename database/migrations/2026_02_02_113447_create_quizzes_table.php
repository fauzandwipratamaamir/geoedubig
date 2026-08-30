<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('kategori')->default('Geospasial & BIG');
            $table->text('pertanyaan');

            // opsi pilihan ganda
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('d');

            // jawaban benar: a/b/c/d
            $table->char('jawaban', 1);

            // penjelasan (optional, biar bagus)
            $table->text('pembahasan')->nullable();

            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['kategori', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
