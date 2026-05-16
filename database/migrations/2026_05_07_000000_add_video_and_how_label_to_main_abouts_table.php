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
        Schema::table('main_abouts', function (Blueprint $table) {
            if (!Schema::hasColumn('main_abouts', 'video_url')) {
                $table->string('video_url')->nullable()->after('years_of_experience');
            }
            if (!Schema::hasColumn('main_abouts', 'how_we_work_label')) {
                $table->string('how_we_work_label')->nullable()->after('video_url');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('main_abouts', function (Blueprint $table) {
            if (Schema::hasColumn('main_abouts', 'how_we_work_label')) {
                $table->dropColumn('how_we_work_label');
            }
            if (Schema::hasColumn('main_abouts', 'video_url')) {
                $table->dropColumn('video_url');
            }
        });
    }
};
