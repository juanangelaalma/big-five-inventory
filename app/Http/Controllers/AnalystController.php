<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalystController extends Controller
{
    public function index()
    {
        $level = getPathLevel(); 
        
        return view("$level.analyst.index");
    }

    public function filter(Request $request) {
        $level = getPathLevel(); 

        return redirect()->route("$level.analyst");
    }
}
