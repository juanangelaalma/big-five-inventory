<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public $hidenavbar = false;

    public function __construct($hidenavbar = false)
    {
        $this->hidenavbar = $hidenavbar;
    }
    
    public function render(): View
    {
        return view('layouts.app');
    }
}
