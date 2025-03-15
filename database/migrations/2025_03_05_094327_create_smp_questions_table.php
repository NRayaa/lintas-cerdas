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
        Schema::create('smp_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('external_id')->unique();
            $table->foreignId('smp_quiz_id')->constrained('smp_quizzes')->onDelete('cascade');
            $table->text('name');
            $table->text('a');
            $table->text('b');
            $table->text('c');
            $table->text('d');
            $table->string('answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smp_questions');
    }
};
