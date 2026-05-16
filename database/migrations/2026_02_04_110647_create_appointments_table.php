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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('groomer_id')->constrained('groomers')->onDelete('cascade');
            $table->string('pet_name');
            $table->string('pet_type');
            $table->string('owner_name');
            $table->string('email');
            $table->string('phone');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->text('special_instructions')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
