<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\AnswerStatus;
use App\Services\BFIService;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
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

    public function downloadResult($answerStatusId)
    {
        $answer_status = AnswerStatus::find($answerStatusId);
        $user = $answer_status->user();
        $answered_at = $answer_status->updated_at;

        $answersWithQuestion = $this->getAnswerWithQuestion($answer_status->id);

        $results = $this->calculateResults($answersWithQuestion);

        $pdf = app('dompdf.wrapper');

        $pdf->setOption(['defaultFont' => 'Roboto']);

        $pdf->loadView('pdf.result', compact('user', 'answered_at', 'results'))->setPaper('f4', 'landscape')->setWarnings(false);
        return $pdf->download('result.pdf');
    }
}
