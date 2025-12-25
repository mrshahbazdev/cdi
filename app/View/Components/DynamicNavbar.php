<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\NavItem;

class DynamicNavbar extends Component
{
    public function render()
    {
        return view('components.dynamic-navbar', [
            'items' => NavItem::root()
                ->visible()
                ->ordered()
                ->with([
                    'children' => fn ($q) =>
                        $q->visible()->ordered(),
                ])
                ->get(),
        ]);
    }
}
