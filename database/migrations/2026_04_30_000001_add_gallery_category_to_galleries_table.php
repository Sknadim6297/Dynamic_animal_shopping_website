<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            if (!Schema::hasColumn('galleries', 'gallery_category')) {
                $table->string('gallery_category', 20)->nullable()->after('pet_name');
            }
        });

        if (Schema::hasColumn('galleries', 'gallery_category')) {
            DB::statement('UPDATE galleries SET gallery_category = pet_type WHERE gallery_category IS NULL');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            if (Schema::hasColumn('galleries', 'gallery_category')) {
                $table->dropColumn('gallery_category');
            }
        });
    }
};