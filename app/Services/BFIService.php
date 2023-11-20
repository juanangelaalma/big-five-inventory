<?php

namespace App\Services;

use App\Models\Dimension;

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
      $total = 0;
      foreach($dimensionAnswers as $answer) {
        $total += $answer->score;
      }
      $total /= count($dimensionAnswers);
      $results[$key] = intval(round($total));
    }
    return $results;
  }

  public static function orderByDimension($calculatedResults) {
    $dimensions = Dimension::orderBy('order', 'ASC')->pluck('name');
    $results = [];
    foreach($dimensions as $dimension) {
      $results[$dimension] = $calculatedResults[$dimension];
    }
    return $results;
  }
}