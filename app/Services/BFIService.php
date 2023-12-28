<?php

namespace App\Services;

use App\Models\Dimension;
use Illuminate\Support\Arr;

class BFIService
{
  public static function correctInvertedAnswer($answersWithQuestion)
  {
    foreach ($answersWithQuestion as $answer) {
      if ($answer->instrument->reverse) {
        $answer->result = 6 - $answer->score;
      } else {
        $answer->result = $answer->score;
      }
    }
    return $answersWithQuestion;
  }

  public static function groupAnswerByDimension($answers)
  {
    $dimensionArray = [];
    foreach ($answers as $answer) {
      if (isset($dimensionArray[$answer->dimension->name])) {
        array_push($dimensionArray[$answer->dimension->name], $answer);
      } else {
        $dimensionArray[$answer->dimension->name] = [$answer];
      }
    }
    return $dimensionArray;
  }

  public static function calculateByDimension($answerGroupedByDimension) {
    $results = [];
    foreach($answerGroupedByDimension as $key => $dimensionAnswers) {
      $scores = Arr::pluck($dimensionAnswers, 'score');
      $total = array_sum($scores);
      $total /= count($dimensionAnswers);
      $results[$key] = intval(round($total));
    }
    return $results;
  }

  public static function orderByDimension($calculatedResults) {
    $dimensions = Dimension::orderBy('order', 'ASC')->get(['name', 'low_percentile_description', 'high_percentile_description']);
    $results = [];
    foreach($dimensions as $dimension) {
      if(isset($calculatedResults[$dimension->name])) {
        $results[$dimension->name] = [
          'low_percentile_description' => $dimension->low_percentile_description,
          'high_percentile_description' => $dimension->high_percentile_description,
          'total' => $calculatedResults[$dimension->name]
        ];
      }
    }
    return $results;
  }
}