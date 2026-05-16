<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE appointments MODIFY price_package VARCHAR(255) NULL AFTER special_instructions");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE appointments MODIFY price_package ENUM('basic', 'standard', 'premium', 'deluxe') NULL AFTER special_instructions");
    }
};