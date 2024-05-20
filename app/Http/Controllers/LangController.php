<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class LangController extends Controller
{
    public function change(Request $request)
    {
        $lang = $request->lang;

        return back()->withCookie(cookie('locale', $lang));
    }
}
