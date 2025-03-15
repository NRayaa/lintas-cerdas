<?php

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
        Schema::create('sma_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sma_user_id')->constrained('sma_users')->onDelete('cascade');
            $table->foreignId('sma_quiz_id')->constrained('sma_quizzes')->onDelete('cascade');
            $table->foreignId('sma_question_id')->constrained('sma_questions')->onDelete('cascade');
            $table->string('answer'); // Jawaban user (a, b, c, d)
            $table->boolean('is_correct')->default(false); // Apakah jawaban benar?
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sma_results');
    }
};
