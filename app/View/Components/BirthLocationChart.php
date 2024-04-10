<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class BirthLocationChart extends Component
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

        $birthLocations = User::whereHas('answers', function ($query) use ($start_date, $end_date) {
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
            ->select(DB::raw('count(users.id) as total, profiles.birth_location as birth_location'))
            ->groupBy('profiles.birth_location')->get(['birth_location', 'total']);

        $birthLocationLabels = [];
        $birthLocationsTotal = [];

        foreach ($birthLocations as $birthLocation) {
            $birthLocationLabels[] = $birthLocation->birth_location;
            $birthLocationsTotal[] = $birthLocation->total;
        }

        $birthLocationLabels = implode(",", $birthLocationLabels);
        $birthLocationsTotal = implode(",", $birthLocationsTotal);

        return view('components.birth-location-chart', compact('birthLocationLabels', 'birthLocationsTotal'));
    }
}
