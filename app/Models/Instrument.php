<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'numbering', 'reverse', 'dimension_id'];

    public function dimension() {
        return $this->belongsTo(Dimension::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }
}
