<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalystController extends Controller
{
    public function index()
    {
        return view('counselor.analyst.index');
    }
}
