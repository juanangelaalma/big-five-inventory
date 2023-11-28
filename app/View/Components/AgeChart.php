<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class AgeChart extends Component
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
        $ages = User::whereHas('answers', function ($query) {
            $query->whereHas('answerStatus', function ($query) {
                $query->where('status', 'done');
            });
        })->join('profiles', 'profiles.user_id', 'users.id')
        ->select(
            DB::raw('count(users.id) as total'),
            DB::raw('YEAR(CURDATE()) - YEAR(profiles.birth_date) - (RIGHT(CURDATE(), 5) < RIGHT(profiles.birth_date, 5)) as age')
        )
        ->groupBy('age')
        ->get(['age', 'total']);

        $ageLabels = $ages->count() > 0 ? implode(",", [$ages[0]->age, $ages->count() > 1 ? $ages[1]->age : ""]) : "0,0";
        $agesTotal = $ages->count() > 0 ? implode(",", [$ages[0]->total, $ages->count() > 1 ? $ages[1]->total : "0"]) : "0,0";

        return view('components.age-chart', compact('ageLabels', 'agesTotal'));
    }
}
