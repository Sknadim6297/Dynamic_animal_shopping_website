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
        Schema::create('counters', function (Blueprint $table) {
            $table->id();
            $table->string('counter_heading_1')->nullable();
            $table->string('counter_number_1')->nullable();
            $table->string('counter_heading_2')->nullable();
            $table->string('counter_number_2')->nullable();
            $table->string('counter_heading_3')->nullable();
            $table->string('counter_number_3')->nullable();
            $table->string('counter_heading_4')->nullable();
            $table->string('counter_number_4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counters');
    }
};
