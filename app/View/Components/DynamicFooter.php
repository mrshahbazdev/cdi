<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\FooterSection;

class DynamicFooter extends Component
{
    public function render()
    {
        return view('components.dynamic-footer', [
            'sections' => FooterSection::query()
                ->visible()
                ->ordered() // 🔥 THIS ENSURES SECTION ORDER ALWAYS WORKS
                ->with([
                    'items' => fn ($q) =>
                        $q->visible()->ordered(), // 🔥 ITEM ORDER SAFE
                ])
                ->get(),
        ]);
    }
}
