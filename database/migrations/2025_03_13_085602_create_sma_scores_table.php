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
        Schema::create('sma_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sma_user_id')->constrained('sma_users')->onDelete('cascade');
            $table->foreignId('sma_quiz_id')->constrained('sma_quizzes')->onDelete('cascade');
            $table->integer('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sma_scores');
    }
};
