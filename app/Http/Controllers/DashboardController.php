<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function counselor() {
        return view('counselor.index');
    }
}
