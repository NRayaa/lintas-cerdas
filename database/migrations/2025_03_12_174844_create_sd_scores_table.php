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
        Schema::create('sd_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sd_user_id')->constrained('sd_users')->onDelete('cascade');
            $table->foreignId('sd_quiz_id')->constrained('sd_quizzes')->onDelete('cascade');
            $table->integer('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sd_scores');
    }
};
