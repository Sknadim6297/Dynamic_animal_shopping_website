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
        Schema::create('groomers', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('profession')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->string('mobile_no')->nullable();
            $table->text('experience_details')->nullable();
            $table->string('skill_1')->nullable();
            $table->integer('skill_1_percentage')->nullable();
            $table->string('skill_2')->nullable();
            $table->integer('skill_2_percentage')->nullable();
            $table->string('skill_3')->nullable();
            $table->integer('skill_3_percentage')->nullable();
            $table->integer('no_of_cases_handled')->nullable();
            $table->integer('satisfied_clients')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groomers');
    }
};
