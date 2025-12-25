<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterItem extends Model
{
    protected $fillable = [
        'footer_section_id',
        'label',
        'url',
        'icon',
        'sort_order',
        'is_visible'
    ];
}
