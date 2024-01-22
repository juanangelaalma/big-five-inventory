<?php

namespace App\View\Components;

use App\Models\Answer;
use App\Models\Dimension;
use App\Services\BFIService;
use App\Services\CalculateBFIService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AverageResult extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $start_date = request()->get('start-date');
        $end_date = request()->get('end-date');
        $results = CalculateBFIService::getAverageAllAnswers($start_date, $end_date);
        return view('components.average-result', compact('results'));
    }
}
