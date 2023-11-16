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
        Schema::create('business_partners', function (Blueprint $table) {
            $table->id();

            $table->foreignId('province_id')->constrained('provinces');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('photo')->nullable();
            $table->string('full_address');
            $table->string('file_cv');
            $table->enum('status', ['pending', 'accepted', 'rejected', 'approved', 'former'])->default('pending');
            $table->date('approved')->nullable();
            $table->date('former')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_partners');
    }
};
