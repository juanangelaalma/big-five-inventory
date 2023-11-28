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

        $batchLabels = $batchs->count() > 0 ? implode(",", [$batchs[0]->batch, $batchs->count() > 1 ? $batchs[1]->batch : ""]) : "male,female";
        $batchsTotal = $batchs->count() > 0 ? implode(",", [$batchs[0]->total, $batchs->count() > 1 ? $batchs[1]->total : "0"]) : "0,0";
        
        return view('components.batch-chart', compact('batchLabels', 'batchsTotal'));
    }
}
