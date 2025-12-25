<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class FooterItem extends Model
{
    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'footer_section_id',
        'label',
        'url',
        'icon',
        'sort_order',
        'is_visible',
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'is_visible' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Relationships
     */
    public function section()
    {
        return $this->belongsTo(FooterSection::class, 'footer_section_id');
    }

    /**
     * Scopes
     */

    // Only visible items
    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('is_visible', true);
    }

    // Ordered items (for frontend)
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order');
    }

    /**
     * Helpers
     */

    // Check if item has an icon (used for socials)
    public function hasIcon(): bool
    {
        return ! empty($this->icon);
    }

    // Check if item has a URL
    public function hasUrl(): bool
    {
        return ! empty($this->url);
    }
}
