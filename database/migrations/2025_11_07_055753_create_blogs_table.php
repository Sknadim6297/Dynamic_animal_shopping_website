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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('blog_heading');
            $table->text('blog_details');
            $table->string('image')->nullable();
            $table->enum('blog_category', ['Accessories', 'Cats', 'Dogs', 'Lifestyle', 'Nutrition', 'Pet', 'Toys'])->default('Pet');
            $table->string('posted_by');
            $table->string('posted_by_image')->nullable();
            $table->date('posting_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
