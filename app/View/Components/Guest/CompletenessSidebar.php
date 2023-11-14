<?php

namespace App\View\Components\Guest;

use App\Models\Answer;
use App\Models\Instrument;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CompletenessSidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public $completeness = [];
    public function __construct()
    {
        $this->getCompletenessUser();
    }

    private function getCompletenessUser()
    {
        $limit = Answer::LIMIT;

        $user = Auth::user();

        $instruments_id_numberings = Instrument::orderBy('numbering')->get(['id', 'numbering']);

        $instruments_ids_answered_by_user = Answer::whereHas('answerStatus', function ($query) {
            $query->where('status', 'pending');
        })->orWhere('answer_status_id', null)->where('user_id', $user->id)->pluck('instrument_id')->toArray();

        $button_statuses = [];

        $searched_ids = [];
        $previousInstrument = $instruments_id_numberings[0];
        foreach ($instruments_id_numberings as $key => $instruments_id_numbering) {
            $searched_ids[] = $instruments_id_numbering->id;
            if (($key + 1) % $limit === 0) {
                $intersection = array_intersect($searched_ids, $instruments_ids_answered_by_user);
                $button_statuses[] = ['lastAnswer' => $previousInstrument->numbering, 'filled' => count($searched_ids) == count($intersection)];
                $searched_ids = [];
                $previousInstrument = $instruments_id_numbering;
            }
        }

        $button_statuses[0]['lastAnswer'] = 0;

        // check kalo ganjil maka ditambahin lagi buttonya
        $remainder = $instruments_id_numberings->count() % $limit;
        if ($remainder > 0) {
            $reversed_order_instruments = array_reverse($instruments_id_numberings->toArray());
            $filled = false;
            for ($i = 0; $i < $remainder; $i++) {
                if (in_array($reversed_order_instruments[$i]['id'], $instruments_ids_answered_by_user)) {
                    $filled = true;
                }
            }
            $button_statuses[] = ['lastAnswer' => $previousInstrument->numbering, 'filled' => $filled];
        }

        $this->completeness = $button_statuses;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.guest.completeness-sidebar');
    }
}
