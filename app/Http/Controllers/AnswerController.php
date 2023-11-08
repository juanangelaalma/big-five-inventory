<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function result() {
        $user = Auth::user();

        return view('guest.answers.result');
    }

    public function getUsersWithAnswers() {
        $users = User::with('profile')->get();
        return view('counselor.answers.index', compact('users'));
    }
}
