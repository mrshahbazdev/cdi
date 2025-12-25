<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    // Diese Variablen müssen hier definiert sein!
    public $title;
    public $metaDescription;

    public function __construct($title = null, $metaDescription = null)
    {
        $this->title = $title;
        $this->metaDescription = $metaDescription;
    }

    public function render(): View
    {
        return view('layouts.guest');
    }
}