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
        Schema::create('smp_sub_subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('external_id')->unique();
            $table->foreignId('smp_subject_id')->constrained('smp_subjects')->onDelete('cascade');
            $table->string('name');
            $table->text('content');
            $table->integer('number')->default(0);
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smp_sub_subjects');
    }
};
