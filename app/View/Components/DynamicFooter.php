<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\FooterSection;

class DynamicFooter extends Component
{
    public function render()
    {
        return view('components.dynamic-footer', [
            'sections' => FooterSection::with(['items' => fn ($q) =>
                $q->where('is_visible', true)->orderBy('sort_order')
            ])
            ->where('is_visible', true)
            ->orderBy('sort_order')
            ->get(),

            // optional bottom links (can also be DB driven)
            'bottomLinks' => [
                ['label' => 'Status', 'url' => '#'],
                ['label' => 'Security', 'url' => '#'],
                ['label' => 'Sitemap', 'url' => '#'],
            ],
        ]);
    }
}
