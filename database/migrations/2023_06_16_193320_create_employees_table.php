<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_id')->constrained('careers');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('file_one_path')->nullable();
            $table->string('file_two_path')->nullable();

            $table->string('hr_evaluate')->nullable();
            $table->string('hr_comment')->nullable();

            $table->string('manager_evaluate')->nullable();
            $table->string('manager_comment')->nullable();

            $table->boolean('situation')->default('0');
            $table->string('head_of_section_evaluate')->nullable();

            $table->timestamps();

            $table->unique(['email', 'career_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
