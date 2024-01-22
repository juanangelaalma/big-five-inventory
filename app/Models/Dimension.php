<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'order', 'low_percentile_description', 'high_percentile_description'];

    public function answers() {
        return $this->hasManyThrough(Answer::class, Instrument::class);
    }
}
