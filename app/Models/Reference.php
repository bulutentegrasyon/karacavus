<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Reference extends Model
{
    protected $fillable = [
        'name', 'slug', 'work_type', 'quantity', 'status',
        'company', 'location', 'description', 'cover_image',
        'gallery', 'order', 'is_active',
    ];

    protected $casts = [
        'gallery'   => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'tamamlanan');
    }

    public function scopeOngoing($query)
    {
        return $query->where('status', 'devam_eden');
    }

    public function getStatusLabelAttribute(): string
    {
        return $this->status === 'tamamlanan' ? 'Tamamlanan' : 'Devam Eden';
    }

    public function getStatusColorAttribute(): string
    {
        return $this->status === 'tamamlanan' ? '#4caf50' : '#c8a951';
    }

    public function getCoverUrlAttribute(): string
    {
        if (!$this->cover_image) {
            return asset('assets/img/projects/real-project-01.webp');
        }
        if (str_starts_with($this->cover_image, 'assets/')) {
            return asset($this->cover_image);
        }
        return asset('storage/' . $this->cover_image);
    }
}
