<?php

namespace App\Services;

use App\Models\Dimension;

class CalculateBFIService
{
  public static function mergeWithDimensionDetail($results)
  {
    $dimensions = Dimension::orderBy('order')->get();

    foreach ($dimensions as $dimension) {
      $dimension->score = $results[$dimension->name];
    }

    return $dimensions;
  }
  public static function getResultFromAnswerStatus($answer_status_id): array
  {
    $dimensions = Dimension::with(['answers' => function ($query) use ($answer_status_id) {
      $query->where('answer_status_id', $answer_status_id);
      $query->with('instrument');
    }])->get();

    $arrayOfNormalScores = [];

    foreach ($dimensions as $dimension) {
      foreach ($dimension->answers as $answer) {
        $arrayOfNormalScores[$dimension->name][] = self::normalizeScore($answer->instrument->reverse, $answer->score);
      }
    }

    $averageOfNormalScores = [];
    foreach ($arrayOfNormalScores as $key => $scores) {
      $sum = array_sum($scores);
      $average = $sum / count($scores);
      $averageOfNormalScores[$key] = intval(round($average));
    }

    return $averageOfNormalScores;
  }

  private static function reverseScore($score)
  {
    $scores = [
      1 => 5,
      2 => 4,
      3 => 3,
      4 => 2,
      5 => 1,
    ];
    return $scores[$score];
  }

  private static function normalizeScore($reverse, $score)
  {
    return $reverse ? self::reverseScore($score) : $score;
  }
}
