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
        Schema::create('smp_img_subs', function (Blueprint $table) {
            $table->id();
            $table->integer('external_id')->unique();
            $table->foreignId('smp_sub_subject_id')->constrained('smp_sub_subjects')->onDelete('cascade');
            $table->text('img');
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smp_img_subs');
    }
};
