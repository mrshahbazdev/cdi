<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relation;
use App\Models\FooterItem;
class FooterSection extends Model
{
    protected $fillable = ['title', 'sort_order', 'is_visible'];

    public function items()
    {
        return $this->hasMany(FooterItem::class)->orderBy('sort_order');
    }
}
