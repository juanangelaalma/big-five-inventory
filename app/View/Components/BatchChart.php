<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class BatchChart extends Component
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

        $batchs = User::whereHas('answers', function ($query) use ($start_date, $end_date) {
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
            ->select(DB::raw('count(users.id) as total, profiles.batch as batch'))
            ->groupBy('profiles.batch')->get(['batch', 'total']);

        $batchLabels = [];
        $batchsTotal = [];

        foreach ($batchs as $batch) {
            $batchLabels[] = $batch->batch;
            $batchsTotal[] = $batch->total;
        }

        $batchLabels = implode(",", $batchLabels);
        $batchsTotal = implode(",", $batchsTotal);
        return view('components.batch-chart', compact('batchLabels', 'batchsTotal'));
    }
}
