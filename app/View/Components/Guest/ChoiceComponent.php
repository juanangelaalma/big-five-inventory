<?php

namespace App\View\Components\Guest;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ChoiceComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $id = "";
    public $name = "";
    public $selected = "false";
    public function __construct($id = "", $name = "", $selected = 'false')
    {
        $this->id = $id;
        $this->name = $name;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.guest.choice-component');
    }
}
