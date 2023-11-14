<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'instrument_id', 'score'];

    public const LIMIT = 5;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function instrument() {
        return $this->belongsTo(Instrument::class);
    }

    public function answerStatus() {
        return $this->belongsTo(AnswerStatus::class);
    }

    public static function booted() {
        self::created(function($model) {
            $previousAnswer = Answer::whereHas('answerStatus', function ($query) {
                $query->where('status', 'pending');
            })->where('user_id', $model->user_id)->first();

            $answerStatusId = $previousAnswer ? $previousAnswer->answer_status_id : null;

            $answerStatus = AnswerStatus::firstOrCreate(
                ['id' => $answerStatusId],
                ['status' => 'pending']
            );
            $model->answer_status_id = $answerStatus->id;
            $model->save();
        });
    }
}
