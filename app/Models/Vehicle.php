<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'name', 'slug', 'brand', 'year', 'price', 'km', 'category', 'vehicle_type',
        'sahibinden_url', 'cover_image', 'company', 'is_active', 'order',
    ];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getCategoryLabelAttribute(): string
    {
        return match($this->category) {
            'arazi_suv' => 'Arazi & SUV',
            'otomobil'  => 'Otomobil',
            'minivan'   => 'Minivan & Panelvan',
            'ticari'    => 'Ticari Araçlar',
            default     => $this->category,
        };
    }
}
