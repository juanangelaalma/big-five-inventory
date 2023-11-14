<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerStatus extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    public function answers() {
        return $this->hasMany(Answer::class);
    }
}
