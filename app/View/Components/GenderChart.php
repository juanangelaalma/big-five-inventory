<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class GenderChart extends Component
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

        $genders = User::whereHas('answers', function ($query) use ($start_date, $end_date) {
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
            ->select(DB::raw('count(users.id) as total, profiles.gender as gender'))
            ->groupBy('profiles.gender')->get(['gender', 'total']);

        $genderLabels = $genders->count() > 0 ? implode(",", [$genders[0]->gender, $genders->count() > 1 ? $genders[1]->gender : ""]) : "male,female";
        $gendersTotal = $genders->count() > 0 ? implode(",", [$genders[0]->total, $genders->count() > 1 ? $genders[1]->total : "0"]) : "0,0";

        return view('components.gender-chart', compact('genderLabels', 'gendersTotal'));
    }
}
