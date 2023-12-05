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
        $batchs = User::whereHas('answers', function ($query) {
            $query->whereHas('answerStatus', function ($query) {
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
