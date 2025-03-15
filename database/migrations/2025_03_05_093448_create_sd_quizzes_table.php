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
        Schema::create('sd_quizzes', function (Blueprint $table) {
            $table->id();
                $table->integer('external_id')->unique();
                $table->integer('number')->default(0);
                $table->string('name');
                $table->text('content')->nullable();
                $table->boolean('is_active')->default(true);
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sd_quizzes');
    }
};
