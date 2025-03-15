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
        Schema::create('sd_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sd_user_id')->constrained('sd_users')->onDelete('cascade');
            $table->foreignId('sd_quiz_id')->constrained('sd_quizzes')->onDelete('cascade');
            $table->foreignId('sd_question_id')->constrained('sd_questions')->onDelete('cascade');
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
        Schema::dropIfExists('sd_results');
    }
};
