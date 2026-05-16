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
        Schema::table('galleries', function (Blueprint $table) {
            // Check if pet_names and pet_types exist, drop them if they do
            if (Schema::hasColumn('galleries', 'pet_names')) {
                $table->dropColumn('pet_names');
            }
            if (Schema::hasColumn('galleries', 'pet_types')) {
                $table->dropColumn('pet_types');
            }
            
            // Add pet_name and pet_type if they don't exist
            if (!Schema::hasColumn('galleries', 'pet_name')) {
                $table->string('pet_name')->after('images');
            }
            if (!Schema::hasColumn('galleries', 'pet_type')) {
                $table->enum('pet_type', ['dog', 'cat'])->default('dog')->after('pet_name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            if (Schema::hasColumn('galleries', 'pet_name')) {
                $table->dropColumn('pet_name');
            }
            if (Schema::hasColumn('galleries', 'pet_type')) {
                $table->dropColumn('pet_type');
            }
        });
    }
};
