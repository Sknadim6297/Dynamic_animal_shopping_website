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
        Schema::create('home_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('section_heading')->nullable();
            $table->text('description')->nullable();
            $table->string('year_of_experience')->nullable();
            $table->string('right_heading_1')->nullable();
            $table->text('right_description_1')->nullable();
            $table->string('right_heading_2')->nullable();
            $table->text('right_description_2')->nullable();
            $table->string('right_heading_3')->nullable();
            $table->text('right_description_3')->nullable();
            $table->string('right_heading_4')->nullable();
            $table->text('right_description_4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_abouts');
    }
};
