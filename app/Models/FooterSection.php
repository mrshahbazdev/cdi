<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class FooterSection extends Model
{
    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'title',
        'type',        // brand | links | socials | bottom
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
    public function items()
    {
        return $this->hasMany(FooterItem::class)
            ->orderBy('sort_order');
    }

    /**
     * Scopes
     */

    // Only visible sections
    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('is_visible', true);
    }

    // Ordered sections (frontend / footer)
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order');
    }

    // Filter by type (brand, links, socials, bottom)
    public function scopeOfType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }

    /**
     * Helpers
     */

    public function isBrand(): bool
    {
        return $this->type === 'brand';
    }

    public function isLinks(): bool
    {
        return $this->type === 'links';
    }

    public function isSocials(): bool
    {
        return $this->type === 'socials';
    }

    public function isBottom(): bool
    {
        return $this->type === 'bottom';
    }
}
