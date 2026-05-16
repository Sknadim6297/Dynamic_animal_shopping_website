<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gallery extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'images',
        'pet_name',
        'pet_type',
        'gallery_category',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'images' => 'array',
    ];

    public function getCategoryKeyAttribute(): string
    {
        return $this->gallery_category ?: $this->pet_type ?: 'dog';
    }

    public function getCategoryLabelAttribute(): string
    {
        return Str::headline($this->category_key);
    }

    public function getFilterClassAttribute(): string
    {
        return Str::slug($this->category_key);
    }

    public function getPrimaryImageAttribute(): ?string
    {
        return !empty($this->images) ? $this->images[0] : null;
    }

    public function getImageCountAttribute(): int
    {
        return is_array($this->images) ? count($this->images) : 0;
    }
}
