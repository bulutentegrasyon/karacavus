<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Service extends Model
{
    use HasSlug;

    protected $fillable = [
        'title', 'slug', 'icon', 'cover_image', 'excerpt', 'content',
        'order', 'is_active',
        'meta_title', 'meta_description', 'meta_keywords',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order'     => 'integer',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    public function getMetaTitleAttribute($value): string
    {
        return $value ?: $this->title;
    }

    public function getImageUrlAttribute(): string
    {
        if (!$this->cover_image) {
            return asset('assets/img/service/service-1.webp');
        }
        if (Str::startsWith($this->cover_image, 'assets/')) {
            return asset($this->cover_image);
        }
        return asset('storage/' . $this->cover_image);
    }
}
