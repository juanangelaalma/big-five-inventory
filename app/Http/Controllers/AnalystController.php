<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalystController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();
        $level = getPathLevel();

        $start_date = isset($params['start-date']) ? $params['start-date'] : '';
        $end_date = isset($params['end-date']) ? $params['end-date'] : '';
        $chartParams = $params;
        unset($chartParams['start-date']);
        unset($chartParams['end-date']);

        $charts = array_keys($chartParams);
        
        return view("$level.analyst.index", compact('charts', 'start_date', 'end_date'));
    }

    public function filter(Request $request) {
        $level = getPathLevel();

        $params = [
            'start-date' => $request->get('start_date'),
            'end-date' => $request->get('end_date'),
            'gender-chart' => $request->get('gender-chart'),
            'average-result' => $request->get('average-result'),
            'average-bar' => $request->get('average-bar'),
            'major-chart' => $request->get('major-chart'),
            'batch-chart' => $request->get('batch-chart'),
            'age-chart' => $request->get('age-chart'),
            'birth-location-chart' => $request->get('birth-location-chart'),
        ];

        $filteredParams = array_filter($params, fn ($value) => !is_null($value));

        return redirect()->route("$level.analyst", $filteredParams);
    }
}
