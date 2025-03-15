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
        Schema::create('smp_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('smp_user_id')->constrained('smp_users')->onDelete('cascade');
            $table->foreignId('smp_quiz_id')->constrained('smp_quizzes')->onDelete('cascade');
            $table->integer('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smp_scores');
    }
};
