<?php

namespace App\View\Components\Guest;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AnswerForm extends Component
{
    /**
     * Create a new component instance.
     */
    public $instruments = null;
    public $isLastInstrument = false;
    public $previousLastAnswer = null;
    public function __construct($instruments = null, $isLastInstrument = false, $previousLastAnswer = null)
    {
        $this->instruments = $instruments;
        $this->isLastInstrument = $isLastInstrument == 1 ? true : false;
        $this->previousLastAnswer = $previousLastAnswer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.guest.answer-form');
    }
}
