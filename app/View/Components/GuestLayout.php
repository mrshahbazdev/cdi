<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    // Diese Variablen müssen hier definiert sein!
    public $title;
    public $metaDescription;
    public $robots; // Diese Variablen müssen hier definiert sein!

    public function __construct($title = null, $metaDescription = null, $robots = null)
    {
        $this->title = $title;
        $this->metaDescription = $metaDescription;
        $this->robots = $robots;
    }

    public function render(): View
    {
        return view('layouts.guest');
    }
}