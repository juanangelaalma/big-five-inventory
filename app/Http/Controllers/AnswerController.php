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

    private function getAnswerWithQuestion($answerStatusId)
    {
        return Answer::with(['instrument' => function ($query) {
            $query->with(['dimension' => function ($query) {
                $query->select('id', 'name', 'low_percentile_description', 'high_percentile_description');
            }])->select('id', 'dimension_id', 'reverse');
        }])->where('answer_status_id', $answerStatusId)->get();
    }

    private function calculateResults($answersWithQuestion)
    {
        $invertedAnswers = BFIService::correctInvertedAnswer($answersWithQuestion);
        $groupedAnswer = BFIService::groupAnswerByDimension($invertedAnswers);
        $results = BFIService::calculateByDimension($groupedAnswer);
        $results = BFIService::orderByDimension($results);
        return $results;
    }

    public function resultDetails($answerStatusId)
    {
        $user = Auth::user();
        $answer_status = AnswerStatus::find($answerStatusId);
        $answered_at = $answer_status->updated_at;

        $answersWithQuestion = $this->getAnswerWithQuestion($answer_status->id);

        $results = $this->calculateResults($answersWithQuestion);

        return view('guest.answers.details', compact('user', 'answered_at', 'results'));
    }

    public function resultDetailsForAdminAndCounselor($answerStatusId)
    {
        $answer_status = AnswerStatus::find($answerStatusId);
        $user = $answer_status->answers->count() > 0 ? $answer_status->answers[0]->user : null;
        $answered_at = $answer_status->updated_at;

        $answersWithQuestion = $this->getAnswerWithQuestion($answer_status->id);

        $results = $this->calculateResults($answersWithQuestion);

        $level = getPathLevel();

        return view("$level.answers.details", compact('answered_at', 'results', 'user'));
    }

    public function getUsersWithAnswers(Request $request)
    {
        $start_date = $request->query('start_date');
        $end_date = $request->query('end_date');
        $major = $request->query('major');
        $gender = $request->query('gender');

        $answer_statuses = AnswerStatus::with(['answers' => function ($query) {
            $query->with(['user' => function ($query) {
                $query->with('profile');
            }]);
        }]);

        if ($start_date) {
            $answer_statuses = $answer_statuses->where('created_at', '>', $start_date . ' 00:00:01');
        }

        if ($end_date) {
            $answer_statuses = $answer_statuses->where('created_at', '<', $end_date . ' 23:59:59');
        }

        if ($major) {
            $answer_statuses = $answer_statuses->whereHas('answers', function ($query) use ($major) {
                $query->whereHas('user', function ($query) use ($major) {
                    $query->whereHas('profile', function ($query) use ($major) {
                        $query->where('major', 'LIKE', "%$major%");
                    });
                });
            });
        }

        if ($gender) {
            $answer_statuses = $answer_statuses->whereHas('answers', function ($query) use ($gender) {
                $query->whereHas('user', function ($query) use ($gender) {
                    $query->whereHas('profile', function ($query) use ($gender) {
                        $query->where('gender', $gender);
                    });
                });
            });
        }

        $answer_statuses = $answer_statuses->get();

        $level = getPathLevel();

        return view("$level.answers.index", compact('answer_statuses', 'start_date', 'end_date', 'major', 'gender'));
    }

    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $major = $request->major;
        $gender = $request->gender;

        $params = [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'major' => $major,
            'gender' => $gender,
        ];

        $level = getPathLevel();

        return redirect()->route("$level.answers", $params);
    }
}
