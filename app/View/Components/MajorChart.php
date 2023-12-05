<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class MajorChart extends Component
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
        $majors = User::whereHas('answers', function ($query) {
            $query->whereHas('answerStatus', function ($query) {
                $query->where('status', 'done');
            });
        })->join('profiles', 'profiles.user_id', 'users.id')
            ->select(DB::raw('count(users.id) as total, profiles.major as major'))
            ->groupBy('profiles.major')->get(['major', 'total']);

        $majorLabels = [];
        $majorsTotal = [];

        foreach ($majors as $major) {
            $majorLabels[] = $major->major;
            $majorsTotal[] = $major->total;
        }

        $majorLabels = implode(",", $majorLabels);
        $majorsTotal = implode(",", $majorsTotal);
        
        return view('components.major-chart', compact('majorLabels', 'majorsTotal'));
    }
}
