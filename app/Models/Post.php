<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasSlug;

    protected $fillable = [
        'blog_category_id', 'user_id', 'title', 'slug', 'excerpt',
        'content', 'cover_image', 'is_featured', 'is_active', 'published_at',
        'meta_title', 'meta_description', 'meta_keywords', 'og_image',
    ];

    protected $casts = [
        'is_featured'  => 'boolean',
        'is_active'    => 'boolean',
        'published_at' => 'datetime',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->whereNotNull('published_at');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function getMetaTitleAttribute($value): string
    {
        return $value ?: $this->title;
    }

    public function getImageUrlAttribute(): string
    {
        if (!$this->cover_image) {
            return asset('assets/img/blog/blog-1.webp');
        }
        if (Str::startsWith($this->cover_image, 'assets/')) {
            return asset($this->cover_image);
        }
        return asset('storage/' . $this->cover_image);
    }
}
