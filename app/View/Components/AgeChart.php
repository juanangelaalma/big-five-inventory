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
        $start_date = request()->get('start-date');
        $end_date = request()->get('end-date');

        $ages = User::whereHas('answers', function ($query) use ($start_date, $end_date) {
            $query->whereHas('answerStatus', function ($query) use ($start_date, $end_date) {
                if($start_date) {
                    $query->where('created_at', '>', $start_date);
                };
                if($end_date) {
                    $query->where('created_at', '<', $end_date);
                };
                $query->where('status', 'done');
            });
        })->join('profiles', 'profiles.user_id', 'users.id')
        ->select(
            DB::raw('count(users.id) as total'),
            DB::raw('YEAR(CURDATE()) - YEAR(profiles.birth_date) - (RIGHT(CURDATE(), 5) < RIGHT(profiles.birth_date, 5)) as age')
        )
        ->groupBy('age')
        ->get(['age', 'total']);

        $ageLabels = [];
        $agesTotal = [];

        foreach($ages as $age) {
            $ageLabels[] = $age->age;
            $agesTotal[] = $age->total;
        }

        $ageLabels = implode(",", $ageLabels);
        $agesTotal = implode(",", $agesTotal);

        return view('components.age-chart', compact('ageLabels', 'agesTotal'));
    }
}
