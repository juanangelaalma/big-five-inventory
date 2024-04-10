<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerStatus extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $fillable = ['status'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function user()
    {
        return $this->answers->count() > 0 ? $this->answers[0]->user : null;
    }
}
