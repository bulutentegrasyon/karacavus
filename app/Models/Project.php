<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model
{
    use HasSlug;

    protected $fillable = [
        'title', 'slug', 'category', 'client', 'location', 'year',
        'excerpt', 'content', 'cover_image', 'gallery',
        'is_featured', 'is_active', 'order',
        'meta_title', 'meta_description', 'meta_keywords',
    ];

    protected $casts = [
        'gallery'     => 'array',
        'is_featured' => 'boolean',
        'is_active'   => 'boolean',
        'order'       => 'integer',
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

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function getMetaTitleAttribute($value): string
    {
        return $value ?: $this->title;
    }
}
