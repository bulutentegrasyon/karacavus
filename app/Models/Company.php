<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'slug', 'name', 'short', 'number', 'icon', 'logo', 'tagline', 'sector',
        'established', 'about', 'activities', 'address', 'map_query',
        'phone', 'vision', 'order', 'is_active',
    ];

    protected $casts = [
        'activities' => 'array',
        'is_active'  => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
