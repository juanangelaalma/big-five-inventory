<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Answer extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $fillable = ['user_id', 'instrument_id', 'score', 'created_at'];

    public const LIMIT = 3;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function instrument()
    {
        return $this->belongsTo(Instrument::class);
    }

    public function dimension()
    {
        return $this->belongsToThrough(Dimension::class, Instrument::class);
    }

    public function answerStatus()
    {
        return $this->belongsTo(AnswerStatus::class);
    }

    public static function booted()
    {
        self::created(function ($model) {
            $previousAnswer = Answer::whereHas('answerStatus', function ($query) {
                $query->where('status', 'pending');
            })->where('user_id', $model->user_id)->first();

            $answerStatusId = $previousAnswer ? $previousAnswer->answer_status_id : null;

            $answerStatus = AnswerStatus::firstOrCreate(
                ['id' => $answerStatusId],
                ['status' => 'pending', 'created_at' => $model->created_at]
            );
            $model->answer_status_id = $answerStatus->id;
            $model->save();
        });
    }
}
