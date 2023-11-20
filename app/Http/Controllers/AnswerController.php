<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\AnswerStatus;
use App\Models\Dimension;
use App\Models\User;
use App\Services\BFIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function result()
    {
        $user = Auth::user();

        $answers = AnswerStatus::whereHas('answers', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('status', 'done')->orderBy('updated_at', 'DESC')->get();

        return view('guest.answers.result', compact('answers'));
    }

    public function resultDetails($answerStatusId)
    {
        $user = Auth::user();
        $answer_status = AnswerStatus::find($answerStatusId);
        $answered_at = $answer_status->updated_at;
        
        $dimensions = Dimension::orderBy('order')->pluck('name');
        
        $answersWithQuestion = Answer::with(['instrument' => function ($query) {
            $query->with(['dimension' => function ($query) {
                $query->select('id', 'name');
            }])->select('id', 'dimension_id', 'reverse');
        }])->where('answer_status_id', $answer_status->id)->get();

        $invertedAnswers = BFIService::correctInvertedAnswer($answersWithQuestion);
        $groupedAnswer = BFIService::groupAnswerByDimension($invertedAnswers);
        $results = BFIService::calculateByDimension($groupedAnswer);
        $results = BFIService::orderByDimension($results);

        return view('guest.answers.details', compact('user', 'answered_at', 'results'));
    }

    public function getUsersWithAnswers()
    {
        $users = User::with('profile')->get();
        return view('counselor.answers.index', compact('users'));
    }
}
