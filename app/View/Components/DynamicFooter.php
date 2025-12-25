<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\FooterSection;
class DynamicFooter extends Component
{
    public function render()
    {
        return view('components.dynamic-footer', [
            'sections' => FooterSection::with('items')
                ->where('is_visible', true)
                ->orderBy('sort_order')
                ->get(),
        ]);
    }
}