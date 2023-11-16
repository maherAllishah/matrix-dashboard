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
        Schema::create('settings_of_business_partners', function (Blueprint $table) {
            $table->id();
            $table->text('brief');
            $table->text('first_photo_in_title');
            $table->text('second_photo_in_title');

            $table->text('first_icon_features');
            $table->text('first_title_features');

            $table->text('second_icon_features');
            $table->text('second_title_features');

            $table->text('third_icon_features');
            $table->text('third_title_features');

            $table->text('fourth_icon_features');
            $table->text('fourth_title_features');

            $table->text('first_video')->nullable();
            $table->text('first_image_video')->nullable();
            $table->text('first_title_video')->nullable();

            $table->text('second_video')->nullable();
            $table->text('second_image_video')->nullable();
            $table->text('second_title_video')->nullable();

            $table->text('third_video')->nullable();
            $table->text('third_image_video')->nullable();
            $table->text('third_title_video')->nullable();

            $table->text('privacy_policy');

            $table->integer('successful_deals');
            $table->integer('Paid_ratios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings_of_business_partners');
    }
};
