<?php

namespace App\View\Components;

use App\Models\Answer;
use App\Services\BFIService;
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

        $answersWithQuestions = Answer::with(['instrument' => function ($query) {
            $query->with(['dimension' => function ($query) {
                $query->select('id', 'name');
            }])->select('id', 'dimension_id', 'reverse');
        }])->whereHas('answerStatus', function ($query) use ($start_date, $end_date) {
            if($start_date) {
                $query->where('created_at', '>', $start_date);
            };
            if($end_date) {
                $query->where('created_at', '<', $end_date);
            };
            $query->where('status', 'done');
        })->get();

        $results = [];
        if ($answersWithQuestions->count() > 1) {
            $invertedAnswers = BFIService::correctInvertedAnswer($answersWithQuestions);
            $groupedAnswer = BFIService::groupAnswerByDimension($invertedAnswers);
            $results = BFIService::calculateByDimension($groupedAnswer);
            $results = BFIService::orderByDimension($results);
        }

        return view('components.average-result', compact('results'));
    }
}
