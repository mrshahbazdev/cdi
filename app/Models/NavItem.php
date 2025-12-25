<?php

// app/Models/NavItem.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class NavItem extends Model
{
    protected $fillable = [
        'title',
        'url',
        'parent_id',
        'sort_order',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')
            ->orderBy('sort_order');
    }

    /* Scopes */
    public function scopeRoot(Builder $q)
    {
        return $q->whereNull('parent_id');
    }

    public function scopeVisible(Builder $q)
    {
        return $q->where('is_visible', true);
    }

    public function scopeOrdered(Builder $q)
    {
        return $q->orderBy('sort_order');
    }
}
