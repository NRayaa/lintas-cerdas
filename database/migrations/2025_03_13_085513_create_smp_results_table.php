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
        Schema::create('smp_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('smp_user_id')->constrained('smp_users')->onDelete('cascade');
            $table->foreignId('smp_quiz_id')->constrained('smp_quizzes')->onDelete('cascade');
            $table->foreignId('smp_question_id')->constrained('smp_questions')->onDelete('cascade');
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
        Schema::dropIfExists('smp_results');
    }
};
