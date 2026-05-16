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
        Schema::create('main_abouts', function (Blueprint $table) {
            $table->id();
            
            // Main heading section
            $table->string('main_heading')->nullable();
            $table->string('main_heading_highlight')->nullable(); // "Best Pet Care Service" part
            $table->longText('main_description')->nullable();
            
            // Years of experience
            $table->string('years_of_experience')->nullable();
            
            // Vision section
            $table->string('vision_image')->nullable();
            $table->string('vision_heading')->nullable();
            $table->longText('vision_description')->nullable();
            
            // Mission section
            $table->string('mission_image')->nullable();
            $table->string('mission_heading')->nullable();
            $table->longText('mission_description')->nullable();
            
            // Why choose us section
            $table->string('why_choose_image')->nullable();
            $table->string('why_choose_heading')->nullable();
            $table->string('why_choose_phone_label')->nullable();
            $table->string('why_choose_community_text')->nullable();
            
            // Why choose us list items (JSON or separate fields)
            $table->json('why_choose_items')->nullable();
            
            // Bottom callout section
            $table->longText('callout_description')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_abouts');
    }
};
