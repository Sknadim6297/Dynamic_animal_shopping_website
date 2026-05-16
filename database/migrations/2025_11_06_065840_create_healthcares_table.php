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
        Schema::create('healthcares', function (Blueprint $table) {
            $table->id();
            $table->string('section_heading_main')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('heading_1')->nullable();
            $table->string('heading_2')->nullable();
            $table->text('description_1')->nullable();
            $table->text('description_2')->nullable();
            $table->string('doctor_image')->nullable();
            $table->string('doctor_name')->nullable();
            $table->string('skill_1')->nullable();
            $table->integer('skill_1_percentage')->nullable();
            $table->string('skill_2')->nullable();
            $table->integer('skill_2_percentage')->nullable();
            $table->string('skill_3')->nullable();
            $table->integer('skill_3_percentage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('healthcares');
    }
};
