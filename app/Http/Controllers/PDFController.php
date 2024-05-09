<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\AnswerStatus;
use App\Services\CalculateBFIService;

class PDFController extends Controller
{
    public function downloadResult($answerStatusId)
    {
        $answer_status = AnswerStatus::find($answerStatusId);
        $user = $answer_status->user();
        $answered_at = $answer_status->created_at;

        $results = CalculateBFIService::getResultFromAnswerStatus($answerStatusId);
        $results = CalculateBFIService::mergeWithDimensionDetail($results);

        $pdf = app('dompdf.wrapper');

        $pdf->setOption(['defaultFont' => 'Roboto']);

        $pdf->loadView('pdf.result', compact('user', 'answered_at', 'results'))->setPaper('f4', 'landscape')->setWarnings(false);
        return $pdf->download('result.pdf');
    }
}
