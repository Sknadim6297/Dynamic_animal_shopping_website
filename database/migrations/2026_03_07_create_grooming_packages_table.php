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
        Schema::create('grooming_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price', 8, 2);
            $table->text('description');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Insert default packages
        \DB::table('grooming_packages')->insert([
            [
                'name' => 'Basic Grooming',
                'slug' => 'basic',
                'price' => 30.00,
                'description' => 'Includes bath, brush, nail trim, and ear cleaning. Perfect for regular maintenance.',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Standard Grooming',
                'slug' => 'standard',
                'price' => 50.00,
                'description' => 'Includes bath, brush, nail trim, ear cleaning, and a stylish haircut. Most popular choice.',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Premium Grooming',
                'slug' => 'premium',
                'price' => 75.00,
                'description' => 'Includes all standard services plus moisturizing treatment, paw pad care, and specialty haircut design.',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Deluxe Spa Package',
                'slug' => 'deluxe',
                'price' => 100.00,
                'description' => 'Ultimate pampering! Includes hydrotherapy bath, aromatherapy, massage, professional styling, nail care, and a bonus treat.',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grooming_packages');
    }
};
